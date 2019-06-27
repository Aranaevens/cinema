<?php

require_once 'Models\Role.php';

class RoleManager
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

    public function add(Role $r)
    {
        $query = $this->dao->prepare('INSERT INTO role (NOM_ROLE) VALUES(:NOM_ROLE)');

        $query->bindValue(':NOM_ROLE', $r->getNom(), PDO::PARAM_STR);

        $query->execute();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM role WHERE ID_ROLE=' . $id);
    }

    public function update(Role $r)
    {
        $query = $this->dao->prepare('UPDATE role SET NOM_ROLE = :NOM_ROLE WHERE ID_ROLE = :id');

        $query->bindValue(':NOM_ROLE', $r->getNom(), PDO::PARAM_STR);
        $query->bindValue(':id', $r->getID(), PDO::PARAM_INT);

        $query->execute();
    }

    public function get($id)
    {
        $id = (int) $id;

        $query = $this->dao->query('SELECT ID_ROLE, NOM_ROLE FROM role WHERE ID_ROLE=' . $id);

        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        return new Role($donnees);
    }

    public function getList()
    {
        $arr = [];

        $query = $this->dao->query('SELECT ID_ROLE, NOM_ROLE FROM role ORDER BY NOM_ROLE');

        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arr[] = new Role($donnees);
        }

        return $arr;
    }

    public function getDetails($id)
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
        WHERE r.ID_ROLE =' . $id);
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
            
            $queryitmd = $this->dao->query('SELECT a.ID_ACTOR, a.PRENOM_ACTOR, a.NOM_ACTOR, a.BIRTH_ACTOR, a.GENDER_ACTOR, a.GENDER_ACTOR
                                FROM
                                    film f
                                INNER JOIN
                                    casting c ON c.ID_FILM = f.ID_FILM
                                INNER JOIN
                                    role r ON c.ID_ROLE = r.ID_ROLE
                                INNER JOIN
                                    actor a ON c.ID_ACTOR = a.ID_ACTOR
                                WHERE r.ID_ROLE = ' . $id . ' AND f.ID_FILM=' . $m->getID_F());
                                
            $data = $queryitmd->fetch(PDO::FETCH_ASSOC);
            $r = new Actor ($data);
            $arrIntmd[] = $r;
            $arr[] = $arrIntmd;
        }
        return $arr;
    }
}