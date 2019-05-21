  <?php 
include('../../layouts/connection.php');
$response = $bdd->query('SELECT * FROM materiel');
$agencies = $bdd->query('SELECT * FROM agence');
$ref=array();
 $ag=array();
 $json_ag;
 $json_ref;
$j=0;
$k=0;
$m=0;
  ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
    <!-- style -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <!-- scripts -->
  <script src="../../assets/js/jquery.min.js"></script>
  <script src="../../assets/js/bootstrap.min.js"></script>
  <script src="../../assets/js/bootstrap.bundle.js"></script>
  <script src="../../assets/js/vue.min.js"></script>


  <title>MATERIEL|Liste</title>
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
		<h1 class="text-muted">Liste des materiels disponible dans l'entreprise</h1>
		<hr>
      <div class="row">
        
		<div class="mt-5">
      <h3 class="text-muted thin">Voici la liste des materiels disponible dans l'entreprise:</h3>
      <a href="add.php" class="btn btn-primary ">Ajouter un nouveau materiel</a>
		</div>
		<table class="table table-striped table-bordered mt-5">
			<thead>
				<th>Ref</th>
				<th>Designation</th>
				<th>Prix unitaire/<small>semaine</small></th>
				<th>Actions </th>
			</thead>
			<tbody>

        <?php

         while($donnees=$response->fetch())
          {
            $ref[$j]=$donnees['ref'];
         ?>
				<tr>
          <td><?php echo ($donnees['ref'])  ?> </td>
          <td><?php echo ($donnees['design'])  ?> </td>
          <td><?php echo ($donnees['pu'])  ?> </td>
          <td><a href="" class="text-danger">Supprimer</a> </td>


				</tr>
            
       <?php 
       $j++;
}
        ?>  

			</tbody>
		</table>

      </div>
      <hr>
      <div class="row mt-5" id="app">
              <h3 class="text-muted thin">Vous pouvez desormais affecter les materiels aux agences de l'entreprise:</h3>
              <div class="alert alert-warning">Voici la listes de toutes les agences et la liste de tous les materiel,selectionnez l'agence et puis ajoutez les materiel en specifiant la quantité.</div>


              <div class="col-sm-6 border-left border-success" @click="ajouter">
              <h6>Les agences:</h6>
                <?php while($data=$agencies->fetch()){ ?>
                  <div class="form-group">
                <input class="" type="radio" id="agence" name="agence" value=<?php echo $data['nom_a'] ?> @click="selected_agencie">
                <label for="agence"><?php echo $data['nom_a'] ?></label>
                    
                  </div>
              <?php 
                $ag[$m]=$data['nom_a'];
                $m++;
                 $json_ag=json_encode($ag);


            } ?>
              </div>

              <div class="col-sm-6 border-left border-success" id="materials">
                 <h6>Les materiels:</h6>
                  <?php
                   for($k=0;$k<sizeof($ref);$k++)
                    { ?>

                  <div class="form-group"  >
                <input class="" type="checkbox" name="check" id="mat" value=<?php echo $ref[$k] ?>  @click="selected_materiel">
                <input type="number" id="quantity" placeholder="quantité" name="restant"  >
                <label for="mat"><?php echo $ref[$k] ?></label>
                    
                  </div>
              <?php } 
                $json_mat=json_encode($ref);
              ?>
              </div>

      <button class="btn btn-primary mt-5 mx-auto">Enregistrer</button>
        
       </div>

      </div>


    </div>
  </div> 

</div>
              <input type="" id="ag" value=<?php echo $json_ag ?> style="visibility:hidden">
              <input type="" id="mat" value=<?php echo $json_mat ?> style="visibility:hidden">

  
  <script>
  app=new Vue({
    el:'#app',
    data:   {
      agences:[],
      materiels:[],
      current_agence:'',
      old:[],
      click:1,
      materiel:{},

      correspondance:[]  

      
       //correspondance des agences et leur materiels objet avec des tableau
        
      
    },
  methods: {

    ajouter: function()
    {
      this.agences=document.getElementById('ag').value;
      this.materiels=document.getElementById('mat').value;

    },
    old_materiel: function(current_agence) //save the cheked materiel
    {
      this.old=this.correspondance;
    },
    check_materiels: function(agence) //executed when the agency is active
    {

          if(document.getElementById('mat').value==this.old[agence]) //check if the materiel is in the array of old_cheked
            document.getElementById('mat').checked=true;
    },
    uncheck_materiels: function() //executed when the agency is desactivated
    {
      // for(let tmp=0;tmp<this.materiels.lenght();tmp++)
      //     if(document.getElementById('mat')==this.old[agence]) //uncheck if the materiel is in the array of old_cheked
      //       document.getElementById('mat').checked=false;
      console.log('elements are checked:'+document.getElementsByName('check')ààà);

    },
    selected_agencie: function(e)
    { 
      old_materiel=this.current_agence;
      console.log('the old agency is:'+this.current_agence);
      console.log('the current agency is:'+e.target.value);

      console.log(e.target.checked);
      this.current_agence=e.target.value;
      console.log(this.correspondance[this.current_agence]);
      this.uncheck_materiels();






        //test if the agence is checked or no


    },
    selected_materiel: function(e)
      {


        if(e.target.checked)
        this.correspondance[this.current_agence]+=','+e.target.value+',';  
       

        console.log(this.correspondance);
      }
  }

  

  });

</script> 
</body>
</html>

