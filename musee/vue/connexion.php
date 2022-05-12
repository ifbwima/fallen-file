<div class='col-sm'><br>
    <h1>Connexion</h1>
    <center>
        <div class="card bg-black" style="width: 25rem;">
            <div class="card-body">
                <form action="./?action=connexion" method="POST">
                    <div class="form-group">
                        <input type="text" name="pseudo" required="required" placeholder="Pseudo" class="form-control bg-black text-light"/><br>
                    </div>
                    <div class="form-group">
                        <input type="password" name="mdp" required="required" placeholder="Mot de passe" class="form-control bg-black text-light" /><br>
                    </div>
                    <?php if(isset($con)){
                        if($con != "true"){
                            print(" 
                                <div class=\"form-group\">
                                    <p class=\"text-danger\">pseudo ou mot de passe incorrect</p>
                                </div>");
                        }
                    }?>

                    <button type="submit" class="btn btn-light">Connexion</button><br>
                    <a href="./?action=inscription">Inscription</a>
                </form>
            </div>
        </div>
    </center>
</div>