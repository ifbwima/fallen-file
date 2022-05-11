<div class="col-md"><br>
    <div class="row">
        <h1>Accueil</h1><br><br>

        <?php for($i=0; $i<count($tab_oeuvre); $i++)
        {
            print('
                <div class="col-5">
                <div class="card-group">
                    <div class="card bg-black" ><br>
                        <a href=\'./?action=oeuvre&id_oeuvre='.$tab_oeuvre[$i]->getId().'\'>
                        <img class="card-img-top" src="./image/'.$tab_oeuvre[$i]->getChemin().'" alt="Card image cap">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title">'.$tab_oeuvre[$i]->getNom().'</h4>
                            <h6 class="card-text">'.$tab_oeuvre[$i]->getDescription().'</h6>
                            <h6 class="card-text"><small class="text-muted">'.$tab_oeuvre[$i]->getDate().'</small></h6><br><br>
                        </div>
                    </div>
                </div>
                </div>
            ');
        }?>
    </div>