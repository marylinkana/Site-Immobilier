
                  <img class="ins1" src="image/logoins.jpg" alt="img">

                      <div class="ins2">
	                         <form action="#" method="post" enctype="multipart/form-data">
		                        <p>
								   <select name="level">
								       <option value="0"> Vendeur </option>
									   <option value="1"> Acheteur </option>
								   </select></br></br>
		                           <input type="text" name="login" placeholder=" Login..."required/></br></br>
	                               <input type="email" name="email" placeholder=" Adresse email..."required/></br></br>
	                               <input type="password" name="mdp" placeholder=" mot de passe..."required/></br></br>
	                               <input type="submit" name="valider"/></br></br>
			                    </p>
                             </form>
	                   </div>
<?php
     require("includes/header.php");
?>
	   
<?php
    
	

    if(isset($_POST['valider']))
	{
		$login = $_POST['login'];
		$mdp = trim($_POST['mdp']);
		$email = $_POST['email'];
        $lvl = $_POST['level'];
		
		$requete = $bdd->query("INSERT INTO users(login , mdp , email , level) 
		                        values ('$login' , '$mdp' , '$email' , '$lvl')");
		
		header("location:login.php");
	}
?>

<?php 
              require("includes/footer.php");
?>