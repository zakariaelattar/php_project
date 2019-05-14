  <?php 
include('../../layouts/connection.php');
$reponse = $bdd->query('SELECT * FROM contrat');

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

  <title>SERVICE|Client</title>
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
		<h1 class="text-muted">Liste des Client et leur contrat avec la societé contrats </h1>
		<hr>
		<div class="mt-5">
		</div>
		<table class="table table-striped table-bordered mt-5">
			<thead>
				<th>Nom du client</th>
				<th>N contrat </th>
        <th>date de debut du contrat</th>
				<th>Durée du contrat</th>
        <th>Montant Attribué au total</th>
        <th>Action</th>
        
			</thead>
			<tbody>
        <?php 
          while($data=$reponse->fetch())
          {

         ?>
				<tr>
          <td><?php echo $data['cocli'] ?></td>
          <td><?php echo $data['noctr'] ?></td>
          <td><?php echo $data['date_d'] ?></td>
          <td><?php echo $data['duree'] ?></td>
          <td><?php echo $data['montant'] ?></td>

          <td><a href=<?php echo "../contrat/show.php?noctr=".$data['noctr'] ?>>Afficher le contrat</a></td>
          <?php } ?>

				</tr>
			</tbody>
		</table>
    <hr>
   


    </div>
  </div> 

</div>
  
</body>
</html>

