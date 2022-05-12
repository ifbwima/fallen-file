<div class="container">
    <div class="row">

        <h1>Création</h1><br>
        <?php if(isset($message)){
            print(" 
                <div class=\"form-group\">
                    <h6 class=\"card-subtitle mb-2 text-danger\">".$message."</h6>
                </div>");
            }?>
        <div class='col'><br>
            <div class="card bg-black border-dark" style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title">Ajouter une Oeuvre</h5>
                    <form action="./?action=ajout" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="nom" required="required" placeholder="Nom de l'Oeuvre" class="form-control bg-black text-light"/><br>
                        </div>
                        <div class="form-group">
                            <input type="date" name="date" required="required" placeholder="Date de Création" class="form-control bg-black text-light" /><br>
                        </div>
                        <div class="form-group">
                            <input type="text" name="description" placeholder="Description" class="form-control bg-black text-light" /><br>
                        </div>
                        <div class="form-group">
                            <input type="file" name="file" required="required" placeholder="Ajoutez une Image" class="form-control bg-black text-light" /><br>
                        </div>

                            <select class="form-select bg-black text-white" required="required" name="collection" id="collection-select">
                                <option value="" class='text-muted'>Selectionnez une collection</option>
                                <?php for($i=0; $i<count($collections); $i++)
                                {
                                    print("<option value=".$collections[$i]->getIdCollection().">".$collections[$i]->getNom()."</option>");
                                }?>
                            </select><br>

                        <button type="submit" class="btn btn-dark">Ajoutez</button><br>
                    </form>
                </div>
            </div>
        </div>

        <div class='col'><br>
            <div class="card bg-black border-dark" style="width: 35rem;">
                <div class="card-body">
                    <h5 class="card-title">Ajouter une Collection</h5><br>
                    <form action="./?action=ajout" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <input type="text" name="nom_collection" required="required" placeholder="Nom de la Collection" class="form-control bg-black text-light"/><br>
                        </div>
                        <div class="form-group">
                            <input type="text" name="description_collection" placeholder="Description" class="form-control bg-black text-light" /><br>
                        </div>

                        <button type="submit" class="btn btn-dark">Ajoutez</button><br>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

