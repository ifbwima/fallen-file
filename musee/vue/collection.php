<div class="container">
    <div class="row"><br>
    <?php
    if(isset($tab_collection))
    {?>
            <h1>Collections</h1>

            <?php for($i=0; $i<count($tab_collection); $i++)
            {
                print("
                <div class='col-lg-4 col-md-6'><br>
                    <div class=\"card bg-dark text-white\">
                        <img class=\"card-img\" style=\"opacity: 0.4;\"src=\"./image/".$tab_collection[$i]->getLast()."\" alt=\"\">
                        <a href='./?action=collection&id_collection=".$tab_collection[$i]->getIdCollection()."&nom=".$tab_collection[$i]->getNom()."'>
                            <div class=\"card-img-overlay\"><br>
                                <h1 class=\"card-title text-light\">".$tab_collection[$i]->getNom()."</h1>
                                <p class=\"card-text text-light\">".$tab_collection[$i]->getDescription()."</p>
                            </div>
                        </a>
                    </div>
                </div>");
            }?>
    <?php }
    elseif(isset($tab_oeuvre))
    {?>
            <?php print("<br><h1>Collection ".$nom_col."</h1>");
            for($i=0; $i<count($tab_oeuvre); $i++)
            {
                print("
                <div class='col-lg-4 col-md-6'><br>
                    <div class=\"card bg-dark text-white\">
                        <a href='./?action=oeuvre&id_oeuvre=".$tab_oeuvre[$i]->getId()."'>
                        
                            <img class=\"card-img-top\" style=\"opacity: 0.4;\"src=\"./image/".$tab_oeuvre[$i]->getChemin()."\" alt=\"image\">
                            <div class=\"card-img-overlay\">
                                <h2 class=\"card-title text-light\">".$tab_oeuvre[$i]->getNom()."</h2>
                            </div>
                        
                        </a>
                    </div>
                </div>");
            }
    }?>
    </div>
</div>


