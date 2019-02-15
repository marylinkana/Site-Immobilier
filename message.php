			 <meta charset="utf-8" />
			<?php if(isset($_GET['id_b'])) {?>
<div class="msg" >
    <p><h1> Envoyer un message <h1></p>
  <form action="#" method="post">
     <textarea name="file" id="file" name="file" cols="188" rows="5"></textarea><br>
     <input type="submit" name="submit" value="envoyer"/>
  </form>	
</div>

			<?php }
      require("includes/header.php");
	  
	  if(isset($_POST['submit']))
	  {
		  $msg = $_POST['file'];
		  $date = strftime('<strong>%Hh%M</strong>  <strong>%D %B %Y</strong>');
		  
		  
		  $requete = $bdd->query("INSERT INTO message(post, date , id_dest , id_exp) 
		                          VALUES ('$msg' , '$date' , '$dest' ".$_SESSION['id_u'].")");   					  
	  }
	  
	  if(isset($_GET['id_msg']))
	     {
		  $requete = $bdd->query("DELETE FROM message WHERE id_msg=".$_GET['id_msg']);
		 }
	  
	  
	  $requete = $bdd->query("SELECT * FROM message , biens ");
	  $reponse = $requete->fetch();
	  if($reponse['id_dest'] == $_SESSION['id_u'])    
	         {					 
			   ?><p class='afficher'> <?php echo "Envoyé le: ".$reponse['date']."</br>" .$reponse['post']."</br>";?></p>
			   <?php echo "<a href='message.php?id_msg=".$reponse['id_msg']."'><b> SUPPRIMER</b></a>";?><?php
			 }
				
	 
	  
?>	


<?php
      
     require("includes/footer.php");
?>