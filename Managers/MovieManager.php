<?php

require_once 'Models\Movie.php';
require_once 'Models\Director.php';
require_once 'Models\Role.php';
require_once 'Models\Actor.php';
require_once 'Models\Genre.php';

class MovieManager
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

    public function add(Movie $m)
    {
        $query = $this->dao->prepare('INSERT INTO film (ID_DIRECTOR, ID_GENRE, TITRE_FILM, DUREE_FILM, DATE_FILM, IMG_FILM) VALUES(:ID_DIRECTOR, :ID_GENRE, :TITRE_FILM, :DUREE_FILM, :DATE_FILM, :IMG_FILM)');

        $query->bindValue(':ID_DIRECTOR', $m->getID_D(), PDO::PARAM_INT);
        $query->bindValue(':ID_GENRE', $m->getID_G(), PDO::PARAM_INT);
        $query->bindValue(':TITRE_FILM', $m->getTitre(), PDO::PARAM_STR_NATL);
        $query->bindValue(':DUREE_FILM', $m->getDuree(), PDO::PARAM_INT);
        $query->bindValue(':DATE_FILM', $m->getDate()->format('Y-m-d'), PDO::PARAM_STR);
        $query->bindValue(':IMG_FILM', $m->getImg(), PDO::PARAM_STR);

        $query->execute();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM film WHERE ID_FILM=' . $id);
    }

    public function update(Movie $m)
    {
        $query = $this->dao->prepare('UPDATE film SET ID_DIRECTOR = :ID_DIRECTOR, ID_GENRE = :ID_GENRE, TITRE_FILM = :TITRE_FILM, DUREE_FILM = :DUREE_FILM, DATE_FILM = :DATE_FILM, IMG_FILM = :IMG_FILM WHERE ID_FILM = :id');

        $query->bindValue(':ID_DIRECTOR', $m->getID_D(), PDO::PARAM_STR);
        $query->bindValue(':ID_GENRE', $m->getID_G(), PDO::PARAM_STR);
        $query->bindValue(':TITRE_FILM', $m->getTitre(), PDO::PARAM_STR_NATL);
        $query->bindValue(':DUREE_FILM', $m->getDuree(), PDO::PARAM_INT);
        $query->bindValue(':DATE_FILM', $m->getDate(), PDO::PARAM_STR);
        $query->bindValue(':IMG_FILM', $m->getImg(), PDO::PARAM_STR);
        $query->bindValue(':id', $m->getID_F(), PDO::PARAM_INT);

        $query->execute();
    }

    public function get($id)
    {
        $id = (int) $id;

        $query = $this->dao->query('SELECT ID_FILM, ID_DIRECTOR, ID_GENRE, TITRE_FILM, DUREE_FILM, DATE_FILM, IMG_FILM FROM film WHERE ID_FILM=' . $id);

        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        return new Movie($donnees);
    }

    public function getList()
    {
        $arr = [];

        $query = $this->dao->query('SELECT ID_FILM, ID_DIRECTOR, ID_GENRE, TITRE_FILM, DUREE_FILM, DATE_FILM, IMG_FILM FROM film ORDER BY TITRE_FILM');

        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arr[] = new Movie($donnees);
        }

        return $arr;
    }

    public function getDList()
    {
        $arr = [];

        $query = $this->dao->query('SELECT ID_FILM, ID_DIRECTOR, ID_GENRE, TITRE_FILM, DUREE_FILM, DATE_FILM, IMG_FILM FROM film ORDER BY TITRE_FILM');

        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arrIntmd = [];
            $m =  new Movie($donnees);
            $arrIntmd[] = $m;

            $queryitmd = $this->dao->query('SELECT d.ID_DIRECTOR,                                   d.PRENOM_DIRECTOR, d.NOM_DIRECTOR,                                  d.BIRTH_DIRECTOR
                                FROM
                                    film f
                                INNER JOIN
                                    director d ON d.ID_DIRECTOR = f.ID_DIRECTOR
                                WHERE f.ID_FILM = ' . $m->getID_F());
                                
            $data = $queryitmd->fetch(PDO::FETCH_ASSOC);
            $r = new Director ($data);
            $arrIntmd[] = $r;
            $arr[] = $arrIntmd;
        }

        return $arr;
    }

    public function getCasting($id)
    {
        $arr = [];
        $query = $this->dao->query('SELECT a.ID_ACTOR, a.PRENOM_ACTOR, a.NOM_ACTOR, a.BIRTH_ACTOR, a.GENDER_ACTOR
        FROM
            film f
        INNER JOIN
            casting c ON c.ID_FILM = f.ID_FILM
        INNER JOIN
            role r ON c.ID_ROLE = r.ID_ROLE
        INNER JOIN
            actor a ON c.ID_ACTOR = a.ID_ACTOR
        WHERE f.ID_FILM =' . $id);
        
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arrIntmd = [];
            $a = new Actor($donnees);
            $arrIntmd[] = $a;
            
            $queryitmd = $this->dao->query('SELECT r.ID_ROLE, r.NOM_ROLE
                                FROM
                                    film f
                                INNER JOIN
                                    casting c ON c.ID_FILM = f.ID_FILM
                                INNER JOIN
                                    role r ON c.ID_ROLE = r.ID_ROLE
                                INNER JOIN
                                    actor a ON c.ID_ACTOR = a.ID_ACTOR
                                WHERE f.ID_FILM = ' . $id . ' AND a.ID_ACTOR=' . $a->getID());
                                
            $data = $queryitmd->fetch(PDO::FETCH_ASSOC);
            $r = new Role ($data);
            $arrIntmd[] = $r;
            $arr[] = $arrIntmd;
        }
        return $arr;
    }

    public function getGen($id)
    {
        $id = (int) $id;

        $query = $this->dao->query('SELECT g.ID_GENRE, g.NOM_GENRE
                                    FROM
                                        film f
                                    INNER JOIN
                                        genre g ON g.ID_GENRE = g.ID_GENRE
                                    WHERE f.ID_FILM = ' . $id);

        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        return new Genre($donnees);
    }

    public function getDir($id)
    {
        $id = (int) $id;

        $query = $this->dao->query('SELECT d.ID_DIRECTOR,                                                   d.PRENOM_DIRECTOR, d.NOM_DIRECTOR,                                      d.BIRTH_DIRECTOR
                                    FROM
                                        film f
                                    INNER JOIN
                                        director d ON d.ID_DIRECTOR = f.ID_DIRECTOR
                                    WHERE f.ID_FILM = ' . $id);

        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        return new Director($donnees);
    }

    public function getAct($id)
    {
        $arr = [];

        $query = $this->dao->query('SELECT a.ID_ACTOR, a.PRENOM_ACTOR, a.NOM_ACTOR, a.BIRTH_ACTOR, a.GENDER_ACTOR
        FROM
            film f
        INNER JOIN
            casting c ON c.ID_FILM = f.ID_FILM
        INNER JOIN
            role r ON c.ID_ROLE = r.ID_ROLE
        INNER JOIN
            actor a ON c.ID_ACTOR = a.ID_ACTOR
        WHERE f.ID_FILM =' . $id);

        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arr[] = new Actor($donnees);
        }

        return $arr;
    }
}