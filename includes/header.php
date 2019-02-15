<?php
   session_start();
	 
	 try
	 {
		 $bdd=new PDO("mysql:host=localhost;dbname=immo","root","");
	 }
	 catch(Exception $e)
	 {
		 die("BDD non trouvee");
	 }
	 
?>
<html>

<head>
  <title>agence_immo_marylin</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8">
</head>

<body>
 
    <img class="logohead" src="image/logoimmo.jpg" alt="img">
				
<nav>
    <ul class="cat">
	
	    <li><a href="categorie.php">Categorie</a>
	        <ul>
			   
	           <li><a href="categorie.php?id_cat=1">Appartements</a>   
			   
	           <li><a href="categorie.php?id_cat=2">Maisons</a>
			   
	           <li><a href="categorie.php?id_cat=3">Lofts</a>
			</ul>
		</li>
		
		<?php
	
		
	if(isset($_SESSION['connect']))
	{
		$requete = $bdd->query("SELECT * FROM users WHERE id_u = ".$_SESSION['id_u']);
		$reponse = $requete->fetch();
	
        ?>
	    <li><a href="logout.php">Déconnexion</a></li>
		<li><a href="index.php">Accueil</a></li>
		<li><a href="profil.php">Profil</a></li>
		<?php 
		   if(isset($_SESSION['level']) AND $_SESSION['level'] == 0)
		   {
		?>
		<li><a href="annonce.php">+Annonce</a>
		    <ul>
	           <li><a href="message.php">Messagerie</a>
			</ul>
		</li>
		<?php
	
		   }else
			   if(isset($_SESSION['level']) AND $_SESSION['level'] == 2)
		   {
		?>
		<li><a href="admin.php">Admin</a>
	        <ul>
	           <li><a href="annonce.php">+Annonce</a>
			    <li><a href="message.php">Messagerie</a>
			</ul>
		</li>
		<?php
		   }
	    ?>
		<div class="date">
        <strong><?php echo' Bienvenue ' .$reponse ['login']; ?></strong>
		</div>
		
		<style> body {background-image: url("image/backg2.gif");
		              background-size:cover;
					  background-color:white; } </style>
		
		<?php
    }
	else
	{
		?>
		
	    <li><a href="login.php">Connexion</a></li>
		<li><a href="index.php">Accueil</a></li>
		<li><a href="inscription.php">Inscription</a></li>
		<?php
	}
	    ?>

		<div class="icone">
		<a  href="https://www.google.fr/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwit98-L8InYAhWMy6QKHTHdAFIQFggnMAA&url=https%3A%2F%2Ffr-fr.facebook.com%2F&usg=AOvVaw0dC501MTlgWvu7WaCWFYxC"><img class="face"  src="image/facebook.jpg" alt="img"></a>
		<a href="https://www.google.fr/url?sa=t&rct=j&q=&esrc=s&source=web&cd=1&cad=rja&uact=8&ved=0ahUKEwiK85D18InYAhXC8qQKHTqXDp0QFggnMAA&url=https%3A%2F%2Fwww.google.com%2Fgmail%2F&usg=AOvVaw3mZ_qbD_gQyp_sqkjrwStn"><img class="face" src="image/gmail.jpg" alt="img"></a>
		<a href="https://www.google.fr/url?sa=t&rct=j&q=&esrc=s&source=web&cd=2&cad=rja&uact=8&ved=0ahUKEwjJiL7z8YnYAhUS-aQKHWGmCFUQjBAIMjAB&url=https%3A%2F%2Ftwitter.com%2Flogin%3Flang%3Dfr&usg=AOvVaw2vJvABhSDF13IOGWLS0hKb"><img class="face" src="image/twitter.jpg" alt="img"></a>
		<a href="https://www.google.fr/url?sa=t&rct=j&q=&esrc=s&source=web&cd=2&cad=rja&uact=8&ved=0ahUKEwjO8ICL84nYAhVPzqQKHZWLCHcQjBAILTAB&url=https%3A%2F%2Fwww.instagram.com%2Faccounts%2Flogin%2F%3Fhl%3Dfr&usg=AOvVaw3X3MEjlS3_S1H1WnJvW2GV"><img class="face" src="image/insta.jpg" alt="img"></a>
		</div>
	</ul>
</nav>
		<div class="date">
        <strong><?php echo strftime('%H:%M \\\ %d/%m/%Y'); ?><strong>
		</div>	

        <div class="recherche">
          <form  action="#" method="get">
             <input type="text" name="recherche" placeholder="ADRESSE...">
			 <input type="text" name="commune" placeholder="COMMUNE...">
			 <input type="text" name="cp" placeholder="CODE POSTALE...">
			 <input type="text" name="rue" placeholder="RUE...">
             <input type="text" name="pmin" placeholder="PRIX MIN...">
             <input type="text" name="pmax" placeholder="PRIX MAX...">
			 <input type="text" name="smin" placeholder="SUPERFICIE MIN...">
			 <input type="text" name="smax" placeholder="SUPERFICIE MAX...">
			 <input type="text" name="np" placeholder="NOMBRES DE PIECES...">
             <button type="submit" name="recherche"> lancer la recherche </button>
   
          </form>
        </div>

        <div class="diapohead" >
	    </div>
        
		<?php
	         
	         if(isset($_SESSION['connect']))
	         {
	           $requete = $bdd->query("SELECT * FROM users WHERE id_u = ".$_SESSION['id_u']);
		       $reponse = $requete->fetch();
			 }
		
		     if(isset($_GET['recherche']))
			 {
				 $recherche = $_GET['recherche'];
				 $sql = "SELECT * FROM biens , adresse 
				         WHERE biens.id_adr = adresse.id_adr";
				 
				 if(isset($_GET['pmin']))
				 {
					 $sql .= "AND prix > ".$_GET['pmin']." ";
				 }
				 
				 if(isset($_GET['pmax']))
				 {
					 $sql .= "AND prix < ".$_GET['pmax']." ";
				 }
				 
				 if (isset($_GET['commune']))
				 {
					 $sql .= "AND commune LIKE '%".$recherche."%' ";
				 }
				 
				 if (isset($_GET['rue']))
				 {
					 $sql .= "AND rue LIKE '%".$recherche."%' ";
				 }
				 
				 if (isset($_GET['cp']))
				 {
					 $sql .= "AND cp LIKE '%".$recherche."%' ";
				 }
				 
				 if (isset($_GET['smin']))
				 {
					 $sql .= "AND surface > ".$_GET['smin']." ";
				 }
				 
				 if (isset($_GET['smax']))
				 {
					 $sql .= "AND surface < ".$_GET['smax']." ";
				 }
				 
				 $requete = $bdd->query($sql);
				 if($reponse == $requete->fetch())
				 {
					 ?><p class='afficher'> <?php echo"<h3>" .$reponse['description']. " </h3> <h3>" .$reponse['nb_pieces']. " pièces</h3> 
				<h3>" .$reponse['surface']. " m2</h3> <h3>" .$reponse['prix']. " £ </h3> posté le: ".$reponse['date']. "</h3>";?></p><?php	
				 }
			 }
		?>
      