<?php
class utilisateur
{
    private $id;
    private $pseudo;
    private $mdp;

    public function __construct($id, $pseudo, $mdp)
    {
        $this->id = $id;
        $this->pseudo = $pseudo;
        $this->mdp = $mdp;
    }

    public function getid(){return $this->id;}
    public function getpseudo(){return $this->pseudo;}
    public function getmdp(){return $this->mdp;}
}

class dao_utilisateur
{
    public static function getutilisateurbypseudo($pseudo)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from utilisateur where pseudo = :pseudo ;");
            $req->bindValue(':pseudo', $pseudo, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = new utilisateur($ligne["id"],$ligne["pseudo"],$ligne["mdp"]);


        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }
}