  <?php 
include('layouts/connection.php');
// preparation de la requete 
$request= $bdd->prepare('INSERT INTO agence(noa,nom_a) VALUES(:noa,:nom_a)');
//getting all data

print_r($_POST);

$request->execute(array(
	'noa' =>'',
	'nom_a' =>$_POST['nom_a']
	));
header('location:content/agence/list.php?success=true');









 ?>