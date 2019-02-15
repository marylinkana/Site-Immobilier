<meta charset="utf-8" />
<?php

      require("includes/header.php");
	  
	  if(isset($_GET['id_b']))
	     {
		  $requete = $bdd->query("DELETE FROM biens WHERE id_b=".$_GET['id_b']);
		 }
		 
	        $requete = $bdd->query("SELECT * FROM biens,adresse");
			

		    while($reponse=$requete->fetch())
	         {					 
			   ?><p class='afficher'> <?php echo "Posté le: ".$reponse['date']."</br>" .$reponse['description']. " </br>" .$reponse['nb_pieces']. 
			   " pièces</br>" .$reponse['surface']. " m2</br>" .$reponse['prix']. " £ </br>
			   
			    Contact : " .$reponse['numero']. " </br>Rue : " .$reponse['rue']. "</br> 
				Commune : " .$reponse['commune']. "</br> Code postal : " .$reponse['cp']. "</br>";?></p><?php
				
	          $_SESSION['id_u'] = $_SESSION['id_u'];
			  if($reponse['id_u'] == $_SESSION['id_u'])
		         {
			        echo"<a href='categorie.php?id_b=".$reponse['id_b']."'><b>SUPPRIMER</b></a> ";
		         }
				 else
					 if(isset($_SESSION['id_u']) AND !($reponse['id_u'] == $_SESSION['id_u']))
					 {
						echo"<a href='message.php?id_b=".$reponse['id_b']."'>Envoyé un mail</a> ";
					 }
			 ?>
<?php
             }
     require("includes/footer.php");
?>