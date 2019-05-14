  <?php 
include('../../layouts/connection.php');
//get data
$agencies = $bdd->query('SELECT * FROM agence');
$materiels= $bdd->query('SELECT * FROM materiel');

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
  <script src="../assets/js/jquery.min.js"></script>
  <script src="../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/bootstrap.bundle.js"></script>
  <script src="../../assets/js/vue.min.js"></script>

  <title>LOCATION|Ajouter</title>
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
<div class="container" id="app">
  <div class="card border-0 shadow my-5">
    <div class="card-body p-5">
    <h1 class="text-muted thin">Ajouter une location</h1>
    <div class="alert alert-warning border-left-3">
      Une location concerne plusieurs materiels de la meme agence.
    </div>
      <form action="../../rentController.php" method="post" class="form-group">
        <h3 class="thin">Information du client</h3>
        <label for="cocli">Code du client<em>(definit automatiquement par le systeme )</em> </label>
        <input type="text"  name="cocli" class="form-control" disabled="" id="cocli">
        <label for="nom">Nom </label>
        <input type="text" v-model="nom" name="nom" class="form-control" id="nom" @keypress="merge">
        <label for="rue">Rue</label>
        <input type="text" name="rue" class="form-control" id="rue">
        <label for="ville">Ville</label>
        <input type="text" id="ville" v-model="ville" class="form-control" name="ville" @keypress="merge">
        <hr>

        <div class="col-sm-5">
          <h3 class="thin">Information sur l'agence</h3>
        <label for="nom-a">veuillez selectionner l'agence concerné par cette location </label>
            <select name="nom_a" id="nom_a" v-model="nom_a"  @change="merge" class="form-control" >
              <?php 
              while($data=$agencies->fetch())
                {
               ?>
              <option value=<?php echo ($data['nom_a']) ?> ><?php echo ($data['nom_a']) ?></option>

              <?php
                }
                ?>

            </select>
            <label for="duree">Entrez la durée de cette location</label>
            <input type="number" placeholder="Durée en semaine" id="duree" name="duree" class="form-control">  
        </div>
        <hr>

        <h3 class="thin">Information sur les materiels</h3>
        <label for="">Materiel a loué <em>(Materiel associé a cette agence)</em></label>
        <input type="text" id="motant" name="montant" :value="montant">
        <?php 
        while($payload=$materiels->fetch())
            {

         ?>
        <div class="input-group mb-3">
        <div class="input-group-prepend">
          <div class="input-group-text">
            <input type="checkbox" name="design[]" @click="sum" id=<?php echo ($payload['pu']) ?> value=<?php echo ($payload['design']) ?> aria-label="Checkbox for following text input">
          </div>
        </div>
        <input  disabled class="form-control"  aria-label="Text input with checkbox" value=<?php echo ($payload['design']) ?> >
        <input disabled="" class="form-control"   aria-label="Text input with checkbox" value=<?php echo ($payload['pu']) ?>  >
        <input type="number" class="form-control"   aria-label="Text input with checkbox" id="qte" name="qte[]"  >
          
    

      </div>
      <?php 
        }
       ?>

        <input type="submit" class="btn bnt-primary mt-5 " value="Crée la location" style="margin-left:40%" >
    
      </form>


    </div>
  </div> 

</div>





<script>
  app=new Vue({
    el:'#app',
    data:   {
      nom:'',
      ville:'',
      nom_a:'',
      montant:0,
      qts:[],
      cocli
    },
  methods: {
    merge: function () {
      date=new Date();
      time=date.getMinutes();
      param=time;
       name=this.nom.split('',2).join('');
       city=this.ville.split('',2).join('');
       agency=this.nom_a.split('',2).join('');
      document.getElementById('cocli').value=name+city+param;

    },
    sum: function(e)
    {
      mount = parseInt(e.target.id);
      if(e.target.checked)
        this.montant+=mount;

        else
        this.montant-=mount;
      alert(qts[0]);



    }

  }

  });

</script>  
</body>
</html>

