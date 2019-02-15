
<img class="Profil1" src="image/profile.jpg" alt="img">
                      <div class="profil2">
	                         <form action="#" method="post" enctype="multipart/form-data">
		                        <p>
		                           <input type="text" name="login" placeholder="Login..."required "/></br></br>
	                               <input type="email" name="email" placeholder="Adresse email..."required /></br></br>
	                               <input type="password" name="mdp" placeholder="mot de passe..."required/></br></br>
	                               <input type="submit" name="submit"/></br></br>
			                    </p>
                             </form>
	                   </div>
					  
<?php require"includes/header.php";?>
				  
<?php
    if(isset($_POST['submit']))
	{
		$login=$_POST['login'];
		$mdp=sha1($_POST['mdp']);
		$email=$_POST['email'];
		$requete=$bdd->query("UPDATE users SET login='$login' , mdp='$mdp' , email='$email' WHERE id_u=".$_SESSION['id_u']);
		
		echo "<p class='red'><b>Profile modifié</b></p>";
			
	}
	
?>
	   
<?php 
				
                require("includes/footer.php");
?>