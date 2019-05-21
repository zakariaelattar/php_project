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
        <li class="nav-item">
          <a class="nav-link" href="../agence/list.php">Agences</a>
        </li>
        <li class="nav-item active">
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
    <h1 class="text-muted thin">Ajouter un materiel</h1>
    <div class=" mt-5">
     
    </div>
    <hr>
      <form action="../../materielcontroller.php" method="post" class="form-group needs-validation" data-toggle="validator" novalidate="true" name="contentForm" role="form">
        <h3 class="thin">Information du materiel</h3>
        <label for="ref">Reference <em>(3 lettre du nom et 3 numero de son identifiant)</em></label>
        <input type="text" name="ref" class="form-control " id="ref" >
        <label for="rue">designation</label>
        <input type="text" name="design" class="form-control" id="design" required data-error="Please enter a valid email.">
        <label for="pu">prix unitaire <em>(par semaine)</em></label>
        <input type="text" name="pu" class="form-control " id="pu"  required="required" data-error="price">

        <input type="submit" class="btn btn-success mt-4" id="submit" value="Ajouter" style="margin-left: 40%;">

    
      </form>


    </div>
  </div> 

</div>
<script src="../../assets/js/bootstrap-validate.js" ></script>

  <script>
    bootstrapValidate('#design','required:le champs est requis') 
    bootstrapValidate('#pu','required:le champs est requis')
  </script>
</body>
</html>

