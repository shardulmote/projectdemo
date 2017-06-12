<ul>
			<li class="current_page_item"><a href="index.php">Home</a></li>
			
			
			
			
			<li class="last"><a href="contact.php">Contact</a></li>
			<li class="last"><a href="aboutus.php">About Us</a></li>

<?php 
					if(isset($_SESSION['status']))
					{
						
						
						echo '<li><a href="viewbook.php">E-Books</a></li>';
echo '<li><a href="logout.php">Logout</a></li>';
					}
					else
					{
						echo '<li><a href="register.php">Register</a></li>';
					}
			?>
			
</ul>