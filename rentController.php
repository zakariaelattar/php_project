  <?php 
include('layouts/connection.php');
// preparation de la requete 
$req1 = $bdd->prepare('INSERT INTO client(cocli,nom, rue, ville) VALUES(:cocli,:nom, :rue, :ville)');
$req2 = $bdd->prepare('INSERT INTO contrat(noctr, date_d, duree,montant,cocli,noa) VALUES(:noctr,:date_d,:duree,:montant,:cocli,:noa)');
$req3 = $bdd->prepare('INSERT INTO mat_contr(noctr, ref_m, qte) VALUES(:noctr,:ref_m,:qte)');
//getting all data
 

// ------Recuperation du client--------------
@$cocli=$_POST['cocli'];
@$nom=$_POST['nom'];
@$rue=$_POST['rue'];
@$ville=$_POST['ville'];

// -------Recuperation de l'agence------
@$nom_a=$_POST['nom_a'];
 $n= $bdd->query('SELECT noa FROM agence WHERE nom_a =\'' .$nom_a.'\'');
  while($loaded=$n->fetch())
            {
            		$noa=$loaded['noa'];
            	
            }
 //-------Autre informatons---------------
 @$date_d=date("Y-m-d");
 @$duree=$_POST['duree'];
 $montant=$_POST['montant'];
 @$noctr=date("h").date("m").date("s");


// // -------Recuperation des materiels------
  $materiel=array();
 $qte=$_POST['qte'];
 $design=$_POST['design'];
  $size=sizeof($design);
  for($i=0;$i<$size;$i++)
  {
  	$current=$design[$i];
  	$materiel[$i]['design']=$current;
  	$get_ref=$bdd->query('SELECT ref FROM materiel WHERE design =\''.$current.'\'');
  	while($data=$get_ref->fetch())
  	$materiel[$i]['ref']=$data['ref'];
  	$get_pu=$bdd->query('SELECT pu FROM materiel WHERE design =\''.$current.'\'');
  	while($data=$get_pu->fetch())
  	$materiel[$i]['pu']=$data['pu'];
  	$materiel[$i]['qte']=$qte[$i];

  }


// insering client information
  $req1->execute(array(
    'cocli'=>$cocli,  // 2 digit nom 2 digit id agence 2 digit materiel
   	'nom' => $nom,
  	'rue' => $rue,
   	'ville' => $ville
  	));

//  // insering contrat informations  

  $req2->execute(array(
	'noctr' => $noctr,
 	'date_d' => $date_d, 
 	'duree' => $duree,
 	'montant'=>$montant,
 	'cocli'=>$cocli,
 	'noa'=>$noa
 	));

// //  // insering mat_contr information
  for($i=0;$i<$size;$i++)
  {
    $req3->execute(array(
   	'noctr' => $noctr,
   	'ref_m' => $materiel[$i]['ref'],
   	'qte' => $materiel[$i]['qte']
 	));

  }

 header('location:content/rent/list.php?success=true');








 ?>