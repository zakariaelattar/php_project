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

  <title>LOCATION|Liste</title>
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

         <li class="nav-item active">
          <a class="nav-link" href="../rent/list.php">Locations</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../agence/list.php">Agences</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Materiel/list.php">Materiels</a>
        </li>
        <li class="nav-item">
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
		<h1 class="text-muted">Liste des location effectué de l'entreprise</h1>
		<hr>
		<div class="mt-5">
      <a href="add_rent.php" class="btn btn-primary ">Ajouter une nouvelle location</a>
		</div>
		<table class="table table-striped table-bordered mt-5">
			<thead>
				<th>N contrat</th>
				<th>Nom du client</th>
				<th>Materiel loué</th>
				<th>date de debut du contrat</th>
				<th>Durée du contrat </th>
			</thead>
			<tbody>
                <?php while($donnees=$reponse->fetch())
          {
       $getter = $bdd->query(' SELECT ref_m FROM mat_contr WHERE noctr='.$donnees['noctr']);
            ?>
				<tr>
          <td><?php echo $donnees['noctr'] ?></td>
          <td><?php echo $donnees['cocli'] ?></td>
          <td>
                         <?php while($mat=$getter->fetch())
          {

            ?>
            <ul>
              <li><?php echo $mat['ref_m'] ?></li>
            </ul>
            <?php 
            }
             ?>
          </td>
          <td><?php echo $donnees['date_d'] ?></td>
          <td><?php echo $donnees['duree'] ?></td>

				</tr>
      <?php } ?>
			</tbody>
		</table>



    </div>
  </div> 

</div>
  
</body>
</html>

