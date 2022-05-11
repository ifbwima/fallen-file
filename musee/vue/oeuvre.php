<div class="col-sm"><br>
    <div class="card bg-black">
      <img class="card-img-top" src="./image/<?php print($oeuvre->getChemin())?>" alt="Card image cap">
    </div>
    <div class="card bg-black" style="opacity: .8;">
      <div class="card-body">
          <h4 class="card-title"><?php print($oeuvre->getNom());?></h4>
          <h6 class="card-text"><?php print($oeuvre->getDescription())?></h6>
          <h6 class="card-text"><small class="text-muted"><?php print($oeuvre->getDate())?></small></h6><br>

          <?php
          if (isLoggedOn()){

          }
          else{
              print('<h6 class="card-text text-muted"><a href="./?action=connexion">Connectez-vous</a> pour voir les commentaires</h6>');
          }
          ?>

      </div>
    </div>
</div>

