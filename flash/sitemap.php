<?
header('Content-Type: text/xml;charset=utf-8');

	// Connect to database server
	mysql_connect("localhost", "flockbase", "pSe4a@98") or die (mysql_error ());

	// Select database
	mysql_select_db("flockbase") or die(mysql_error());

	// SQL query
	$strSQL = "SELECT * FROM pm_videos WHERE category = '37'";

	// Execute the query (the recordset $rs contains the result)
	$rs = mysql_query($strSQL);
	//Print the first few lines
	
	 print('<!--?xml version="1.0" encoding="UTF-8"?-->
	<!--?xml-stylesheet type="text/xsl" href="https://zoology.flockshare.com/videos/stylesheet.xsl"?-->
	<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:news="http://www.google.com/schemas/sitemap-news/0.9" 			       xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xsi:schemalocation="http://www.sitemaps.org/schemas/sitemap/0.9 	 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">');
		 print('<url>
	<loc>https://zoology.flockshare.com/videos/</loc>
	<changefreq>always</changefreq>
	<priority>1.0</priority>
	</url>
	');
	// Loop the recordset $rs
	// Each row will be made into an array ($row) using mysql_fetch_array
	while($row = mysql_fetch_array($rs)) {
	
	 print('<url>
	<loc>https://zoology.flockshare.com/videos/watch.php?vid=' . $row['uniq_id'] . '</loc>
	<priority>0.5</priority>
	</url>');

	  }
	
 	print('</urlset>');
	exit;  

	// Close the database connection
	mysql_close();
	?>