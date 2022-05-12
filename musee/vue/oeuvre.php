<div class="container">
    <div class="col-sm">
        <div class="card bg-black">
              <img class="card-img-top" src="./image/<?php print($oeuvre->getChemin())?>" alt="Card image cap">

              <div class="card-body" style="opacity: .8;">
                  <h4 class="card-title"><?php print($oeuvre->getNom()." ");
                  if($_SESSION["id"] == 1){
                      print ('<a href="./?action=supprimer&id_oeuvre='.$oeuvre->getId().'&id_collection='.$oeuvre->getCollection().'" class="text-white"><li class="fa fa-trash"></li></a>');
                  }?></h4>
                  <h6 class="card-text"><?php print($oeuvre->getDescription())?></h6>
                  <h6 class="card-text"><small class="text-muted"><?php print($oeuvre->getDate())?></small></h6><br>

                  <?php
                  if (isLoggedOn()){
                      ///les commentaires
                  }
                  else{
                      print('<h6 class="card-text text-white"><a href="./?action=connexion" class="text-white">Connectez-vous</a> pour voir les commentaires</h6>');
                  }
                  ?>

              </div>
        </div>
    </div>
</div>
