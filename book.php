<?php session_start();?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
		<?php
			include("includes/head.inc.php");
		?>
</head>
</head>

<body>
			<!-- start header -->
					<div id="header">
						<div id="menu">
							<?php
								include("includes/menu.inc.php");
							?>
						</div>
					</div>
					
					<div id="logo-wrap">
						<div id="logo">
								<?php
									include("includes/logo.inc.php");
								?>
						</div>
					</div>
			<!-- end header -->
			
			<!-- start page -->

					<div id="page">
						<!-- start content -->
							<div id="content">
								<div class="post">
									<h1 class="title">E-Books</h1>
									
									<div class="entry" >
									
										<table width="483" height="96" border="1">
    <tr>
      <td width="141" text-align="center">Books</td>
    <tr>
       <?php
	    $i = $_POST['cat'];
		$_SESSION['id'] = $i;
	   
	   $link=mysql_connect("localhost","root","")or die("Can't Connect...");
			
											mysql_select_db("shop",$link) or die("Can't Connect to Database...");
			
											$query="select b_id,b_nm from book where b_subcat = '$i'";
			
											$res=mysql_query($query,$link);
	  
  while($row = mysql_fetch_array($res))
  {
  echo "<tr>";
  echo "<td>&nbsp;"."<a href='open1.php?id=".$row['b_id']."'>" . $row['b_nm'] ."</a>". "</td>";
     	
  }
  
?>
    </tr>
    
  </table>
									
									</div>
									
								</div>
								
							</div>
						<!-- end content -->
						
						<!-- start sidebar -->
						<div id="sidebar">
								<?php
									include("includes/search.inc.php");
								?>
						</div>
						<!-- end sidebar -->
						
						<div style="clear: both;">&nbsp;</div>
					</div>
			<!-- end page -->
						
			<!-- start footer -->
				<div id="footer">
							<?php
								include("includes/footer.inc.php");
							?>
				</div>
			<!-- end footer -->
</body>
</html>
