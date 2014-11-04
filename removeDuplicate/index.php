<?php

// Configure
$host = "localhost";
$user = "root";
$pwd = "";
$table = "product_lang";
$database = "test";



// Connect to database
$db = mysql_connect($host, $user, $pwd);
if (!$db) {
    die('Could not connect: ' . mysql_error());
}
// Set database
mysql_select_db($database);

// Get duplicate name
$sql_duplicate  = "SELECT count(id_product) as count,link_rewrite FROM {$table} WHERE link_rewrite != '' GROUP BY link_rewrite HAVING count(id_product) > 1";
$query          = mysql_query($sql_duplicate);
$num_rows       = mysql_num_rows($query);

// prefix or suffix;
$replace = range('a','z');

while ($row = mysql_fetch_assoc($query, MYSQL_ASSOC)) {
    if(!empty($row['link_rewrite'])){
        $list_words = array();
        $list_words = getListWordsRelatedContent($row['link_rewrite'], $row['count'], $replace);
        // Query to get all data with link rewrite
        $list_sql   = "SELECT id_product FROM {$table} WHERE link_rewrite = '{$row["link_rewrite"]}'";
        $list_query = mysql_query($list_sql);

        // Update duplicated record
        $i = 0;
        $sql_update = "UPDATE {$table} SET link_rewrite = '%s' WHERE id_product = %s ";
        
        while( $l_row = mysql_fetch_assoc($list_query, MYSQL_ASSOC)) {
            mysql_query(sprintf($sql_update, $list_words[$i], $l_row['id_product']));
            $i++;
        }
    }
}

mysql_close($db);


/**
 * Get all list words related content 
 * @param string $content
 * @param array $replace
 * @return array
 */
function getListWordsRelatedContent($content,$count,$replace = array()){
    $list_words = array();

    $list_words = getListWords($content);

    while ( count($list_words) < $count) {
        $parts  = split('-', $content);
        $num    = factorial(count($parts)); // Total words from content given
        $remain = $count - count($list_words); // Get remain words need to get
        $mod    = ceil($remain/$num) < count($replace) ? ceil($remain/$num) : count($replace)  ;
        // Get random text in content
        
        shuffle($parts); // Shuffle 
        $tmp = $parts;
        $random_part = array_shift($parts);
        $tmp1 = $parts;
        $rand_arr = array_rand($replace,$mod);
        $rand_arr = is_array($rand_arr) ? $rand_arr : array($rand_arr);
        foreach( $rand_arr as $index ){
            // Set prefix or suffix
            $is_prefix = mt_rand(1,100) % 2 == 0 ;
            if( $is_prefix ){
                array_push($parts, $replace[$index].$random_part);
            } else {
                array_push($parts, $random_part.$replace[$index]);    
            }
            
            $content = implode("-", $parts);
            
            $list_words = array_merge($list_words, getListWords($content));
            $parts = $tmp1;
        }
        if( count($parts) > 1){
            $content = implode("-".$replace[ array_rand($replace)], $tmp);
        } else {
            $content = $is_prefix ? $replace[ array_rand($replace)]. $content : $content.$replace[ array_rand($replace)];
        }
        
    }

    return $list_words;
}

/**
 * Get list words 
 * @param string $word
 * @return array
 */
function getListWords($word){
    $set = split('-', $word); // like array('she', 'sells', 'seashells')
    $size = count($set) - 1;
    if($size == 0) return $set;
    $perm = range(0, $size);
    $j = 0;
    $perms = array();
    do { 
         foreach ($perm as $i) { $perms[$j][] = $set[$i]; }
    } while ($perm = pc_next_permutation($perm, $size) and ++$j);

    return array_map('merge',$perms);
}


function pc_next_permutation($p, $size) {
    // slide down the array looking for where we're smaller than the next guy
    for ($i = $size - 1; $p[$i] >= $p[$i+1]; --$i) { }

    // if this doesn't occur, we've finished our permutations
    // the array is reversed: (1, 2, 3, 4) => (4, 3, 2, 1)
    if ($i <= -1) { return false; }

    // slide down the array looking for a bigger number than what we found before
    for ($j = $size; $p[$j] <= $p[$i]; --$j) { }

    // swap them
    $tmp = $p[$i]; $p[$i] = $p[$j]; $p[$j] = $tmp;

    // now reverse the elements in between by swapping the ends
    for (++$i, $j = $size; $i < $j; ++$i, --$j) {
         $tmp = $p[$i]; $p[$i] = $p[$j]; $p[$j] = $tmp;
    }
$tmp = null;
    return $p;
}

function merge($arr){
    return implode("-", $arr);
}

function factorial($number) { 
 
    if ($number < 2) { 
        return 1; 
    } else { 
        return ($number * factorial($number-1)); 
    } 
}
