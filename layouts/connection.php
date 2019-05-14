<?php
// connecting to database named location
try{
	$bdd=new PDO("mysql:host=localhost;dbname=location","root","");
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(PDOException $e)
{
	echo $e->getMessage();
}

?>