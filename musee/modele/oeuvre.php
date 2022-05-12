<?php

class oeuvre
{
    private $id;
    private $nom;
    private $date;
    private $description;
    private $collection;
    private $chemin;

    public function __construct($id, $nom, $date, $description, $collection, $chemin)
    {
        $this->id = $id;
        $this->nom = $nom;
        $this->date = $date;
        $this->description = $description;
        $this->collection = $collection;
        $this->chemin = $chemin;
    }

    public function getId(){return $this->id;}
    public function getNom(){return $this->nom;}
    public function getDate(){return $this->date;}
    public function getDescription(){return $this->description;}
    public function getCollection(){return $this->collection;}
    public function getChemin(){return $this->chemin;}
}

class dao_oeuvre
{
    public static function getoeuvre()
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from oeuvre order by date_publication desc;");
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            while($ligne)
            {
                $resultat[] = new oeuvre($ligne["id"],$ligne["nom"],date("m-d-Y", strtotime($ligne["date_publication"])), $ligne["description"], $ligne["id_collections"], $ligne["chemin_image"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getoeuvrebyidcollection($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from oeuvre where id_collections = :id ;");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = null;
            while($ligne)
            {
                $resultat[] = new oeuvre($ligne["id"],$ligne["nom"],date("m-d-Y", strtotime($ligne["date_publication"])), $ligne["description"], $ligne["id_collections"], $ligne["chemin_image"]);
                $ligne = $req->fetch(PDO::FETCH_ASSOC);
            }
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function getoeuvrebyid($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("select * from oeuvre where id = :id ;");
            $req->bindValue(':id', $id, PDO::PARAM_INT);
            $req->execute();

            $ligne = $req->fetch(PDO::FETCH_ASSOC);
            $resultat = new oeuvre($ligne["id"],$ligne["nom"],date("m-d-Y", strtotime($ligne["date_publication"])), $ligne["description"], $ligne["id_collections"], $ligne["chemin_image"]);
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            die();
        }
        return $resultat;
    }

    public static function addoeuvre($nom, $date, $description, $image, $collection)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("insert into oeuvre (nom, date_publication, description, chemin_image, id_collections) values (:nom, :date, :description, :chemin, :collection);");
            $req->bindValue(':nom', $nom, PDO::PARAM_STR);
            $req->bindValue(':date', $date, PDO::PARAM_STR);
            $req->bindValue(':description', $description, PDO::PARAM_STR);
            $req->bindValue(':chemin', $image, PDO::PARAM_STR);
            $req->bindValue(':collection', $collection, PDO::PARAM_STR);
            $req->execute();

            return true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
        }
    }

    public static function deleteoeuvre($id)
    {
        try {
            $cnx = connexionPDO();
            $req = $cnx->prepare("delete from oeuvre where id = :id");
            $req->bindValue(':id', $id, PDO::PARAM_STR);
            $req->execute();

            return true;
        } catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage();
            return false;
        }
    }
}