<meta charset="utf-8" />
	   <h2> Ajouter un nouveau bien</h2>
<div class="formannonce" >
 
    <form action="#" method="post" enctype="multipart/form-data">
	     
         <p>
			<strong>Photos du bien</strong></br></br>
	        <input type="file" name="file" enctype= "multipart/form-data" /></br></br>
			<strong>Localisation du bien</strong></br></br>
	        <input type="text" name="num" placeholder="contact..."required /></br></br>
	        <input type="text" name="ru" placeholder="rue..."required /></br></br>
	        <input type="text" name="com" placeholder="commune..."required /></br></br>
            <input type="text" name="codp" placeholder="code postal..."required /></br></br>
            <strong>Caractéristiques du bien</strong></br></br>
            <input type="text" name="descript" placeholder="description..."required /></br></br>
	        <input type="text" name="nombp" placeholder="nombres de pièces..."required /></br></br>
	        <input type="text" name="superf" placeholder="superficie..."required /></br></br>
	        <input type="text" name="pri" placeholder="prix..."required /></br></br>
            <input type="submit" name="submit" value="valider"/></br></br>
		</p> 
    </form>
</div>

<?php
      require("includes/header.php");
	  
	   if(isset($_POST['submit']))
	  {		
  
          
		  $image = $_FILES['file'];
          $autorisation = array('png', 'gif', 'jpeg', 'jpg', 'JPG', 'GIF', 'JPEG', 'PNG');
          $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
          if(in_array($extension, $autorisation)){ $bdd = new PDO("mysql:host=localhost; dbname=immo", "root", "");}
			   
            try{

            $lastId = $bdd->lastInsertId();
            $chemin = 'img/'.$lastId.$extension;
            
            $requete = $bdd->query("INSERT INTO image ('chemin' , 'id_b') VALUES('$chemin','$lastId')");
			$reponse = $requete->fetch();
               }
            catch (Exception $e){}
		  
          
	      $num = $_POST['num'];
		  $rue = $_POST['ru'];
		  $com = $_POST['com'];
		  $cp = $_POST['codp'];
		  
		  $requete = $bdd->query("INSERT INTO adresse (numero , rue , commune , cp ) 
		               VALUES ('$num' , '$rue' , '$com' , '$cp')");
	      $reponse = $requete->fetch();
	      
		  
		  $des = $_POST['descript'];
		  $np = $_POST['nombp'];
		  $sup = $_POST['superf'];
		  $prix = $_POST['pri'];
		  $date = strftime('<strong>%Hh%M</strong>  <strong>%D %B %Y</strong>');
		  
		  $requete = $bdd->query("INSERT INTO biens (description , nb_pieces , surface , prix , date) 
		               VALUES ('$des' , '$np' , '$sup' , '$prix' , '$date')");
		 $reponse = $requete->fetch();
		  
	  }
	  
	   
		  
?>
			

<?php
	   
     require("includes/footer.php");
?>