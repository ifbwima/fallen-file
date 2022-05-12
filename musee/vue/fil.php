<div class="container">
    <div class="row"><br>
            <h1>Accueil</h1><br><br>

            <?php for($i=0; $i<count($tab_oeuvre); $i++)
            {
                print('
                    <div class="col-lg-4 col-md-6">
                        <div class="card bg-black border-dark" >
                            <a href=\'./?action=oeuvre&id_oeuvre='.$tab_oeuvre[$i]->getId().'\'>
                            <img class="card-img-top" src="./image/'.$tab_oeuvre[$i]->getChemin().'" alt="Card image cap">
                            </a>
                            <div class="card-body">
                                <h4 class="card-title">'.$tab_oeuvre[$i]->getNom().'</h4>
                                <h6 class="card-text">'.$tab_oeuvre[$i]->getDescription().'</h6>
                                <h6 class="card-text"><small class="text-muted">'.$tab_oeuvre[$i]->getDate().'</small></h6>
                            </div>
                        </div>
                    </div>
                ');
            }?>
    </div>
</div>


<div class="container">

    <div class="d-flex flex-column bg-warning m-2">
        <?php for($i=0; $i<count($tab_oeuvre); $i++)
        {
            if ($i%2==0){
                $cond = "flex-row";
            }
            else{
                $cond = "";
            }
            print('
                <div class="'.$cond.'">
                    <div class="p-3">
                        <div class="card bg-black"><br>
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
</div>



