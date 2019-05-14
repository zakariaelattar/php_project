  <?php 
include('layouts/connection.php');
// preparation de la requete 
$req = $bdd->prepare('INSERT INTO materiel(ref, design, pu) VALUES(:ref, :design, :pu)');
//getting all data

$ref=$_POST['ref'];
$design=$_POST['design'];
$pu=$_POST['pu'];

$req->execute(array(
	'ref' => $ref,
	'design' => $design,
	'pu' => $pu
	));

header('location:content/materiel/list.php?success=true');








 ?>