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
									
										<form action="book.php" method="POST">
										<br>Select Branch:<br>
										<select style="width: 200px;" name="cat">
								<?php
									
										$link=mysqli_connect("mysql.gebook1.svc","shardul","mote")or die("Can't Connect...");
		                                mysqli_select_db($link,"shop") or die("Can't Connect to Database...");
			                            $query="select * from category ";
									    $res=mysqli_query($link,$query);
                                        while($row=mysqli_fetch_assoc($res))
											{
												echo "<option disabled>".$row['cat_nm'];
												$q2 = "select * from subcat where parent_id = ".$row['cat_id'];
												$res2 = mysqli_query($link,$q2) or die("Can't Execute Query..");
												while($row2 = mysqli_fetch_assoc($res2))
												{echo '<option value="'.$row2['subcat_id'].'" > ---> '.$row2['subcat_nm'];
				                                }
											}
											mysqli_close($link);
								?>
						</select>
						<input  type='submit' name='btn' value='   OK   '  > </form>
									
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
