<?php
 session_start(); 
$id    = $_GET['id'];
//echo $id;
$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
											mysql_select_db("shop",$link) or die("Can't Connect to Database...");
$query = "SELECT b_pdf,content,filesize,filetype FROM book WHERE b_id = '$id'";

$result = mysql_query($query) or die('Error, query failed');
list($name,$content,$size,$type) = mysql_fetch_array($result);

header("Content-length: $size");
header("Content-type: $type");
header("Content-Disposition: inline; filename=$name");
echo $content;

?>