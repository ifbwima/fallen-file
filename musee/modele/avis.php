<?php

class avis
{
    private $id_utilisateur;
    private $id_oeuvre;
    private $avis;

    public function __construct($id_utilisateur, $id_oeuvre, $avis)
    {
        $this->id_utilisateur = $id_utilisateur;
        $this->id_oeuvre = $id_oeuvre;
        $this->avis = $avis;
    }

    /**
    * @return mixed
    */
    public function getIdUtil()
    {
        return $this->id_utilisateur;
    }

    /**
    * @return mixed
    */
    public function getIdOeuvre()
    {
        return $this->id_oeuvre;
    }

    /**
    * @return mixed
    */
    public function getAvis()
    {
        return $this->avis;
    }
}

class  dao_avis
{
    public static function getavisbyoeuvre($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from avis where id_oeuvre = :id ;");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = null;

            while ($ligne) {
                $resultat[] = new avis($ligne["id_utilisateur"], $ligne["id_oeuvre"], $ligne["commentaires"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function addavis($id_utilisateur, $id_oeuvre, $avis)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into avis (id_utilisateur, id_oeuvre, commentaire) values (:id_utilisateur, :id_oeuvre, :avis);");
            $req->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_STR);
            $req->bindValue(':id_oeuvre', $id_oeuvre, PDO::PARAM_STR);
            $req->bindValue(':avis', $avis, PDO::PARAM_STR);
            $req->execute();

            return true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
        }
    }

    public static function deleteavis($id_utilisateur, $id_oeuvre)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("delete from avis where id_utilisateur = :id_utilisateur and id_oeuvre = :id_oeuvre;");
            $req->bindValue(':id_utilisateur', $id_utilisateur, PDO::PARAM_STR);
            $req->bindValue(':id_oeuvre', $id_oeuvre, PDO::PARAM_STR);
            $req->execute();

            return true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
        }
    }
}
