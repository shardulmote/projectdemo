<?php

	if(isset($_POST['upload']) && $_FILES['ebook']['size'] > 0)
	{
		$b_pdf = $_FILES['ebook']['name'];	
			$tmpName  = $_FILES['ebook']['tmp_name'];
		$fileSize = $_FILES['ebook']['size'];
		$fileType = $_FILES['ebook']['type'];

		$fp      = fopen($tmpName, 'r');
		$content = fread($fp, filesize($tmpName));
		$content = addslashes($content);
		fclose($fp);

if(!get_magic_quotes_gpc())
{
    $b_pdf = addslashes($b_pdf);
}
/*$link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
			mysql_select_db("shop",$link) or die("Can't Connect to Database...");
			
			$query="insert into book(content) values('$content')";
			
			mysql_query($query,$link) or die($query."Can't Connect to Query...");
          mysql_close();*/
		
		$msg=array();
		if(empty($_POST['name']) || empty($_POST['description']) || empty($_POST['publisher'])|| empty($_POST['edition']) || empty($_POST['isbn']) || empty($_POST['pages']) || empty($_POST['price']))
		{
			$msg[]="Please full fill all requirement";
		}
		if(!(is_numeric($_POST['price'])))
		{
			$msg[]="Price must be in Numeric  Format...";
		}
		if(!(is_numeric($_POST['pages'])))
		{
			$msg[]="Page must be in Numeric  Format...";
		}
		
		if(empty($_FILES['img']['name']))
		$msg[] = "Please provide a file";
	
		if($_FILES['img']['error']>0)
		$msg[] = "Error uploading file";
		
				
		if(!(strtoupper(substr($_FILES['img']['name'],-4))==".JPG" || strtoupper(substr($_FILES['img']['name'],-5))==".JPEG"|| strtoupper(substr($_FILES['img']['name'],-4))==".GIF"))
			$msg[] = "wrong file  type";
			
		if(file_exists("../upload_image/".$_FILES['img']['name']))
			$msg[] = "File already uploaded. Please do not updated with same name";
		
		if(empty($_FILES['ebook']['name']))
		$msg[] = "Please provide a document file";
	
		if($_FILES['ebook']['error']>0)
		$msg[] = "Error uploading document file";
		
		
		if(!(strtoupper(substr($_FILES['ebook']['name'],-4))==".PDF" || strtoupper(substr($_FILES['ebook']['name'],-4))==".PPT" ||strtoupper(substr($_FILES['ebook']['name'],-5))==".PPTX" ||  strtoupper(substr($_FILES['ebook']['name'],-4))==".DOC"|| strtoupper(substr($_FILES['ebook']['name'],-4))==".TXT"|| strtoupper(substr($_FILES['ebook']['name'],-5))==".DOCX"))
			$msg[] = "wrong document file  type";
			
		if(file_exists("../upload_ebook/".$_FILES['ebook']['name']))
			$msg[] = "Document File already uploaded. Please do not updated with same name";
		
		if(!empty($msg))
		{
			echo '<b>Error:-</b><br>';
			
			foreach($msg as $k)
			{
				echo '<li>'.$k;
			}
		}
		else
		{
			move_uploaded_file($_FILES['img']['tmp_name'],"../upload_image/".$_FILES['img']['name']);
			$b_img = "upload_image/".$_FILES['img']['name'];	
			
			//move_uploaded_file($_FILES['ebook']['tmp_name'],"../upload_ebook/".$_FILES['ebook']['name']);
			
			
		
			$b_nm=$_POST['name'];
			$b_cat=$_POST['cat'];
			$b_desc=$_POST['description'];
			$b_edition=$_POST['edition'];
			$b_publisher=$_POST['publisher'];			
			$b_isbn=$_POST['isbn'];
			$b_pages=$_POST['pages'];
			$b_price=$_POST['price'];
			//$fileName = $_FILES['ebook']['name'];
			
		
			$link=mysqli_connect("mysql.gebook1.svc","shardul","mote")or die("Can't Connect...");
			
			mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
			
			$query="insert into book(b_nm,b_subcat,b_desc,b_edition,b_publisher,b_isbn,b_page,b_price,b_img,b_pdf,content,filesize,filetype)
values('$b_nm','$b_cat','$b_desc','$b_edition','$b_publisher','$b_isbn','$b_pages','$b_price','$b_img','$b_pdf','$content','$fileSize','$fileType')";
			
			mysqli_query($query,$link) or die($query."Can't Connect to Query...");
			header("location:addbook.php");
		
		}
	}
	else
	{
		header("location:index.php");
	}
?>
	
	
