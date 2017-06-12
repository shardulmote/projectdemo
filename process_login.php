<?php session_start();
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['usernm']))
		{
			$msg[]="No such User";
		}
		
		if(empty($_POST['pwd']))
		{
			$msg[]="Password Incorrect........";
		}
		
		
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
			
			
		
			$link=mysqli_connect("mysql.gebook1.svc","shardul","mote")or die("Can't Connect...");
			
			mysqli_select_db($link ,"shop" ) or die("Can't Connect to Database...");
			
			$unm=$_POST['usernm'];
			
			$q="select * from user where u_unm='$unm'";
			$q1="select * from admin where a_unm='$unm'";
			
			$res=mysqli_query($q,$link) or die("wrong query");
			
			$row=mysqli_fetch_assoc($res);
			$res1=mysqli_query($q1,$link) or die("wrong query");
			
			$row1=mysqli_fetch_assoc($res1);
			
			if(!empty($row))
			{
				if($_POST['pwd']==$row['u_pwd'])
				{
					$_SESSION=array();
					$_SESSION['unm']=$row['u_unm'];
					$_SESSION['uid']=$row['u_pwd'];
					$_SESSION['status']=true;
					header("location:index.php");
				}
					
					
				else
				{
					echo 'Incorrect Password....';
				}
			 }
			else if(!empty($row1))
			    {
				  if($_POST['pwd']==$row1['a_pwd'])
				  {
					$_SESSION=array();
					$_SESSION['unm']=$row1['a_unm'];
					$_SESSION['uid']=$row1['a_pwd'];
					$_SESSION['status']=true;
					header("location:admin/index.php");
					
				  }
				
				  else
				  {
					echo 'Incorrect Password....';
				  }
			   }
			   else
			   {
				echo 'Invalid User';
			  }
			
		}
	
	}
	else
	{
		header("location:index.php");
	}
			
?>
