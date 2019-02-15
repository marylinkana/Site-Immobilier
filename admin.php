<?php
    require("includes/header.php");

	$requete=$bdd->query("SELECT * FROM users");
	if(isset($_GET['level']) AND $_GET['level'] <> 2 )
	{
		$_SESSION['connect']=false;
		echo "vous ne pouvez accéder à cette session";
	}


	if(isset($_GET['ban']) AND $_GET['ban'] == 0 )
	{
		$requete = $bdd->query("UPDATE users SET ban=1 WHERE id_u = ".$_GET['ban']);

	}
	 else
		 if(isset($_GET['ban']) AND $_GET['ban'] == 1 )
	     {
		     $requete = $bdd->query("UPDATE users SET ban=0 WHERE id_u = ".$_GET['ban']);
	     }

	if(isset($_GET['level']) AND $_GET['level'] == 1 )
	{
		$requete = $bdd->query("UPDATE users SET level=0 WHERE id_u = ".$_GET['ban']);
	}
	else
	  {
	    if(isset($_GET['level']) AND $_GET['level'] == 0 )
	    {
		    $requete = $bdd->query("UPDATE users SET level=1 WHERE id_u = ".$_GET['ban']);

	    }
	  }




	while($reponse=$requete->fetch() AND $reponse['level'] !== 2)
	{
		echo $reponse['login']. "  ";

		if($reponse['ban'] == 0)
		{
		    echo "<a class='ban' href='admin.php?ban=".$reponse['id_u']."'>Bannir<a> </br></br>";
		}

		if($reponse['ban'] == 1)
		{
			echo "<a class='ban' href='admin.php?deban=".$reponse['id_u']."'>Debannir</a> </br></br>";
		}

		if($reponse['level'] == 0)
		{
			echo "<a class='ban' href='admin.php?acheteur=".$reponse['id_u']."'>Passer en acheteur</a> </br></br>";
		}

		if($reponse['level'] == 1)
		{
			echo "<a class='ban' href='admin.php?vendeur=".$reponse['id_u']."'>Passer en vendeur</a> </br></br>";
		}

	}
	require("includes/footer.php");
?>
