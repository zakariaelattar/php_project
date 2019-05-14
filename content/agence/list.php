  <?php 
include('../../layouts/connection.php');
$resp = $bdd->query('SELECT * FROM agence');

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

        <li class="nav-item active">
          <a class="nav-link" href="list.php">Agences</a>
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
		<h1 class="text-muted">Liste des Agences de l'entreprise</h1>
		<hr>
		<div class="mt-5">
      <a href="add.php" class="btn btn-primary ">Ajouter une nouvelle Agence</a>
		</div>
		<table class="table table-striped table-bordered mt-5">
			<thead>
				<th>Numero</th>
				<th>Nom </th>
        <th>Materiel disponible(Par reference)</th>
				<th>Action</th>
        
			</thead>
			<tbody>
        <?php while($donnees=$resp->fetch())
          {
         ?>
        <tr>
          <td><?php echo ($donnees['noa'])  ?> </td>
          <td><?php echo ($donnees['nom_a'])  ?> </td>
          <td> </td>
          <td><a href="" class="text-danger">Supprimer</a> </td>


        </tr>
            
       <?php 
}
        ?>  
			</tbody>
		</table>
    <hr>
   


    </div>
  </div> 

</div>
  
</body>
</html>

