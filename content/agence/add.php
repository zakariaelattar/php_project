  <?php 
include('../../layouts/connection.php');
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- style -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:200i" rel="stylesheet">
  <!-- scripts -->
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/1000hz-bootstrap-validator/0.11.9/validator.min.js"></script>

  <title>AGENCE|Ajouter</title>
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

        <li class="nav-item">
          <a class="nav-link" href="../rent/list.php">Location</a>
        </li>
        <li class="nav-item active">
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
    <h1 class="text-muted thin">Ajouter une agence a votre entreprise</h1>
    <div class="alert alert-warning mt-5">
      L'ajout d'une agence permet de generer lors du besoin d'un contrat lorsque un client loue un ou plusieur materiel de celle-ci.
    </div>
    <hr>
      <form action="../../agenceController.php" method="post" class="form-group" data-toggle="validator" novalidate="true">
        <h3 class="thin">Information de l'agence</h3>
        <label for="">Numero <em>(definie automatiquement par le systeme)</em></label>
        <input type="text" disabled="" name="noa" class="form-control " id="noa">
        <label for="nom_a">Nom de l'agence</label>
        <input type="text" name="nom_a" class="form-control" id="nom_a" required="required" data-error="Please enter a valid email.">
        <input type="submit" class="btn btn-success mt-4" value="Ajouter" style="margin-left: 40%;">

    
      </form>


    </div>
  </div> 

</div>
  
</body>
</html>

