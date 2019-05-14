  <?php 
include('../../layouts/connection.php');
$noctr=$_GET['noctr'];
$contrat = $bdd->query('SELECT * FROM contrat WHERE noctr ='.$noctr);
$materiel = $bdd->query('SELECT * FROM mat_contr WHERE noctr ='.$noctr);


  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- style -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <!-- scripts -->
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../../assets/js/bootstrap.bundle.js"></script>

  <title>AGENCE|Liste</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light static-top mb-5 shadow">
  <div class="container">
    <a class="navbar-brand" href="#">Location</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto">

         <li class="nav-item ">
          <a class="nav-link" href="../rent/list.php">Locations</a>
        </li>

        <li class="nav-item ">
          <a class="nav-link" href="list.php">Agences</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Materiel/list.php">Materiels</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../service/list.php">Service clientéle</a>
        </li>

      </ul>
    </div>
  </div>
</nav>

<!-- Page Content -->
<div class="container">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
		<h1 class="text-muted">Apercu du contrat du client</h1>
		<hr>

    <?php 

while($data=$contrat->fetch())
{
  $client = $bdd->query('SELECT nom FROM client WHERE cocli =\''.$data['cocli'].'\'');

 ?>
  <div class="row ">
  <div class="col-sm-6">
    <h5>Contrat N <?php echo $data['noctr'] ?></h5>
    <h5>Date:<?php echo $data['date_d'] ?></h5>
    <h5>Duree:<?php echo $data['duree'] ?></h5>
  </div>
  <div class="col-sm-6">
    <h5>Agence: <?php echo $data['noa'] ?></h5>
    <?php 

    while($names=$client->fetch())
{

 ?>
    <h5>Client: <?php echo $data['cocli'].'-'.$names['nom'] ?></h5>
    <?php 
    } ?>
    <h5>Montant: <?php echo $data['montant']?></h5>
  </div>
</div>

<div class="row mt-5">
  <h6>Le client ayant effectué la location a pu loué les matériel suivant:</h6>
<table class="table table-bordered">
  <thead>
    <th>Ref</th>
    <th>designation</th>
    <th>quantité</th>
  </thead>
  <tbody>
   <?php $getter = $bdd->query(' SELECT * FROM mat_contr WHERE noctr='.$data['noctr']);

        while($f=$getter->fetch())
        {

            ?>
            <tr>
            <td><?php echo $f['ref_m'] ?></td>
            <td></td>
            <td><?php echo $f['qte'] ?></td>
            </tr>
            <?php 

        }
             ?>

  </tbody>
</table>
<?php 
}
 ?>
   <h6>*La durée du contrat d'utilisation de ces materiels doit etre respécté.Le dossier du client effectuant une fraude temporel passera au conseil de discipline selon la loi 128-55 .</h6>

</div>
   


    </div>
  </div> 

</div>
  
</body>
</html>

