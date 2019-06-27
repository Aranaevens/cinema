<?php

require_once 'Models\Director.php';
require_once 'Models\Movie.php';

class DirectorManager
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

    public function add(Director $d)
    {
        $query = $this->dao->prepare('INSERT INTO director (PRENOM_DIRECTOR, NOM_DIRECTOR, BIRTH_DIRECTOR) VALUES(:PRENOM_DIRECTOR, :NOM_DIRECTOR, :BIRTH_DIRECTOR)');

        $query->bindValue(':PRENOM_DIRECTOR', $d->getPrenom(), PDO::PARAM_STR);
        $query->bindValue(':NOM_DIRECTOR', $d->getNom(), PDO::PARAM_STR);
        $query->bindValue(':BIRTH_DIRECTOR', $d->getBirth(), PDO::PARAM_STR_NATL);

        $query->execute();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM director WHERE ID_DIRECTOR=' . $id);
    }

    public function update(Director $d)
    {
        $query = $this->dao->prepare('UPDATE director SET PRENOM_DIRECTOR = :PRENOM_DIRECTOR, NOM_DIRECTOR = :NOM_DIRECTOR, BIRTH_DIRECTOR = :BIRTH_DIRECTOR WHERE ID_DIRECTOR = :id');

        $query->bindValue(':PRENOM_DIRECTOR', $d->getPrenom(), PDO::PARAM_STR);
        $query->bindValue(':NOM_DIRECTOR', $d->getNom(), PDO::PARAM_STR);
        $query->bindValue(':BIRTH_DIRECTOR', $d->getBirth(), PDO::PARAM_STR_NATL);
        $query->bindValue(':id', $d->getID(), PDO::PARAM_INT);

        $query->execute();
    }

    public function get($id)
    {
        $id = (int) $id;

        $query = $this->dao->query('SELECT ID_DIRECTOR, PRENOM_DIRECTOR, NOM_DIRECTOR, BIRTH_DIRECTOR FROM director WHERE ID_DIRECTOR=' . $id);

        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        return new Director($donnees);
    }

    public function getList()
    {
        $arr = [];

        $query = $this->dao->query('SELECT ID_DIRECTOR, PRENOM_DIRECTOR, NOM_DIRECTOR, BIRTH_DIRECTOR FROM director ORDER BY NOM_DIRECTOR');

        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arr[] = new Director($donnees);
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
            director d ON d.ID_DIRECTOR = f.ID_DIRECTOR
        WHERE d.ID_DIRECTOR =' . $id);
        //}
        // catch(Exception $e){
        //     echo '1';
        //     echo $e->getMessage();
        // }
        
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arr[] = new Movie($donnees);
        }
        return $arr;
    }
}