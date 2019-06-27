<?php

require_once 'Models\Actor.php';
require_once 'Models\Movie.php';
require_once 'Models\Role.php';

class ActorManager
{
    private $dao;

    public function __construct($dao)
    {
        $this->dao = $dao;
    }

    public function setDao($dao)
    {
        $this->dao = $dao;
    }

    public function add(Actor $a)
    {
        $query = $this->dao->prepare('INSERT INTO actor (PRENOM_ACTOR, NOM_ACTOR, BIRTH_ACTOR, GENDER_ACTOR) VALUES(:PRENOM_ACTOR, :NOM_ACTOR, :BIRTH_ACTOR, :GENDER_ACTOR)');

        $query->bindValue(':PRENOM_ACTOR', $a->getPrenom(), PDO::PARAM_STR);
        $query->bindValue(':NOM_ACTOR', $a->getNom(), PDO::PARAM_STR);
        $query->bindValue(':BIRTH_ACTOR', $a->getBirth(), PDO::PARAM_STR_NATL);
        $query->bindValue(':GENDER_ACTOR', $a->getGender(), PDO::PARAM_INT);

        $query->execute();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM actor WHERE ID_ACTOR=' . $id);
    }

    public function update(Actor $a)
    {
        $query = $this->dao->prepare('UPDATE actor SET PRENOM_ACTOR = :PRENOM_ACTOR, NOM_ACTOR = :NOM_ACTOR, BIRTH_ACTOR = :BIRTH_ACTOR, GENDER_ACTOR = :GENDER_ACTOR WHERE ID_ACTOR = :id');

        $query->bindValue(':PRENOM_ACTOR', $a->getPrenom(), PDO::PARAM_STR);
        $query->bindValue(':NOM_ACTOR', $a->getNom(), PDO::PARAM_STR);
        $query->bindValue(':BIRTH_ACTOR', $a->getBirth(), PDO::PARAM_STR_NATL);
        $query->bindValue(':GENDER_ACTOR', $a->getGender(), PDO::PARAM_INT);
        $query->bindValue(':id', $a->getID(), PDO::PARAM_INT);

        $query->execute();
    }

    public function get($id)
    {
        $id = (int) $id;

        $query = $this->dao->query('SELECT ID_ACTOR, PRENOM_ACTOR, NOM_ACTOR, BIRTH_ACTOR, GENDER_ACTOR FROM actor WHERE ID_ACTOR=' . $id);

        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        return new Actor($donnees);
    }

    public function getList()
    {
        $arr = [];

        $query = $this->dao->query('SELECT ID_ACTOR, PRENOM_ACTOR, NOM_ACTOR, BIRTH_ACTOR, GENDER_ACTOR FROM actor ORDER BY NOM_ACTOR');

        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arr[] = new Actor($donnees);
        }

        return $arr;
    }

    public function getFilmo($id)
    {
        $arr = [];
        // try{
        $query = $this->dao->query('SELECT f.ID_FILM, f.ID_DIRECTOR, f.ID_GENRE, f.TITRE_FILM, f.DUREE_FILM, f.DATE_FILM, f.IMG_FILM
        FROM
            film f
        INNER JOIN
            casting c ON c.ID_FILM = f.ID_FILM
        INNER JOIN
            role r ON c.ID_ROLE = r.ID_ROLE
        INNER JOIN
            actor a ON c.ID_ACTOR = a.ID_ACTOR
        WHERE a.ID_ACTOR =' . $id);
        //}
        // catch(Exception $e){
        //     echo '1';
        //     echo $e->getMessage();
        // }
        
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arrIntmd = [];
            $m = new Movie($donnees);
            $arrIntmd[] = $m;
            
            $queryitmd = $this->dao->query('SELECT r.ID_ROLE, r.NOM_ROLE
                                FROM
                                    film f
                                INNER JOIN
                                    casting c ON c.ID_FILM = f.ID_FILM
                                INNER JOIN
                                    role r ON c.ID_ROLE = r.ID_ROLE
                                INNER JOIN
                                    actor a ON c.ID_ACTOR = a.ID_ACTOR
                                WHERE a.ID_ACTOR = ' . $id . ' AND f.ID_FILM=' . $m->getID_F());
                                
            $data = $queryitmd->fetch(PDO::FETCH_ASSOC);
            $r = new Role ($data);
            $arrIntmd[] = $r;
            $arr[] = $arrIntmd;
        }
        return $arr;
    }
}

?>