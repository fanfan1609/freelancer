<?php require_once('Connections/con_pathway.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_con_pathway, $con_pathway);
$query_classresult = "SELECT * FROM class_room";
$classresult = mysql_query($query_classresult, $con_pathway) or die(mysql_error());
$row_classresult = mysql_fetch_assoc($classresult);
$totalRows_classresult = mysql_num_rows($classresult);$colname_classresult = "-1";
if (isset($_GET['repo'])) {
  $colname_classresult = $_GET['repo'];
}
mysql_select_db($database_con_pathway, $con_pathway);
$query_classresult = sprintf("SELECT * FROM class_room WHERE student_id = %s", GetSQLValueString($colname_classresult, "int"));
$classresult = mysql_query($query_classresult, $con_pathway) or die(mysql_error());
$row_classresult = mysql_fetch_assoc($classresult);
$totalRows_classresult = mysql_num_rows($classresult);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Untitled Document</title>
</head>

<body>
<table width="50%" height="421" border="1" cellpadding="2" cellspacing="2">
  <tr>
    <th scope="col"><?php echo $row_classresult['student_id']; ?></th>
    <th scope="col"><?php echo $row_classresult['student_name']; ?></th>
    <th scope="col"><?php echo $row_classresult['class_name']; ?></th>
    <th scope="col"><?php echo $row_classresult['term_name']; ?></th>
    <th scope="col">&nbsp;</th>
  </tr>
  <tr>
    <td>Accounts</td>
    <td><?php echo $row_classresult['Accounts']; ?></td>
    <td>Agriculture</td>
    <td><?php echo $row_classresult['Agriculture']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Arts</td>
    <td><?php echo $row_classresult['arts']; ?></td>
    <td>Biology</td>
    <td><?php echo $row_classresult['Biology']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Chemistry</td>
    <td><?php echo $row_classresult['Chemistry']; ?></td>
    <td>Coloring</td>
    <td><?php echo $row_classresult['Coloring']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Commerce</td>
    <td><?php echo $row_classresult['commerce']; ?></td>
    <td>Computer</td>
    <td><?php echo $row_classresult['Computer']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Drawing</td>
    <td><?php echo $row_classresult['Drawing']; ?></td>
    <td>Economics</td>
    <td><?php echo $row_classresult['Economics']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>English</td>
    <td><?php echo $row_classresult['English']; ?></td>
    <td>French</td>
    <td><?php echo $row_classresult['French']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>Geography</td>
    <td><?php echo $row_classresult['Geography']; ?></td>
    <td>Government</td>
    <td><?php echo $row_classresult['Government']; ?></td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td height="135" colspan="5"><p>SAMPLE CHART DISPLAY HERE</p>
      <p><img src="graph.PNG" alt="GRAPH" width="469" height="276"></p>
    <p>&nbsp;</p></td>
  </tr>
</table>
</body>
</html>
<?php
mysql_free_result($classresult);
?>
