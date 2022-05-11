<?php

class collections
{
    private $id;
    private $description;
    private $nom;
    private $lastoeuvre;

    /**
     * @param $id_collection
     * @param $description
     * @param $nom
     */
    public function __construct($id_collection, $nom, $description, $last)
    {
        $this->id = $id_collection;
        $this->description = $description;
        $this->nom = $nom;
        $this->lastoeuvre = $last;
    }

    /**
     * @return mixed
     */
    public function getIdCollection()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @return mixed
     */
    public function getNom()
    {
        return $this->nom;
    }

    public function getLast()
    {
        return $this->lastoeuvre;
    }
}

class  dao_collections
{
    public static function getallcollection()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from collections;");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = null;
            while($ligne)
            {
                $last = dao_collections::getlastoeuvrecollection($ligne["id"]);
                $resultat[] = new collections($ligne["id"],$ligne["nom"],$ligne["caracteristique"], $last);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getcollectionbyid($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from collections where id = :id ;");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $last = dao_collections::getlastoeuvrecollection($ligne["id"]);
            $resultat = new collections($ligne["id"],$ligne["nom"],$ligne["caracteristique"], $last);

        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }


    public static function getcollection()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from collections;");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = null;
            while($ligne)
            {
                $last = dao_collections::getlastoeuvrecollection($ligne["id"]);
                if($last != "defaut.png")
                    $resultat[] = new collections($ligne["id"],$ligne["nom"],$ligne["caracteristique"], $last);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getlastoeuvrecollection($collection)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from oeuvre where id_collections = :id order by date_publication desc;");
            $req->bindValue(':id', $collection, PDO::PARAM_STR);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = "defaut.png";
            if($ligne["chemin_image"] != null)
                $resultat = $ligne["chemin_image"];
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function addcollection($nom, $description)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into collections (nom, caracteristique) values (:nom, :description);");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->execute();

            return true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
        }
    }

    public static function deletecollection($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("delete from collections where id = :id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            return true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
        }
    }
}