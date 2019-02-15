
 <img class="logologin" src="image/logocon.jpg" alt="img">
<form class="login2" action="#" method="post" enctype="multipart/form-data">
	 <input type="email" name="email" id="email" placeholder="Adress email..."/></br></br>
	 <input type="password" name="mdp" id="mdp" placeholder="Mot de passe..."/></br></br>
	 <input type="submit" name="valider"/></br></br>
	 <a href="inscription.php">Pas encore inscrit?</a><br><br>
	 <a href="generer.php">Mot de passe oublié?</a><br><br>
</form>

<?php
     require("includes/header.php");
?>


<?php
   if(isset($_POST['valider']))
	{
	 $email=$_POST['email'];
	 $mdp=trim($_POST['mdp']);


	 $requete=$bdd->query("SELECT * FROM users WHERE email='$email' AND mdp='$mdp'");
	 if($reponse=$requete->fetch())
	 {
		 $_SESSION['connect']=true;
	     $_SESSION['id_u']=$reponse['id_u'];
	     $_SESSION['level']=$reponse['level'];
		 header("location:index.php");
	 }
	 else
	 {
		 echo"<p class='red'>Adress mail ou mot de passe incorrect</p>";
	 }
	}
?>

<?php
      require("includes/footer.php");
?>   
