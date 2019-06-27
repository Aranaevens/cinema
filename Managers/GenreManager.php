<?php

require_once 'Models\Genre.php';
require_once 'Models\Movie.php';

class GenreManager
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

    public function add(Genre $g)
    {
        $query = $this->dao->prepare('INSERT INTO genre (NOM_GENRE) VALUES(:NOM_GENRE)');

        $query->bindValue(':NOM_GENRE', $g->getNom(), PDO::PARAM_STR);

        $query->execute();
    }

    public function delete($id)
    {
        $this->dao->exec('DELETE FROM genre WHERE ID_GENRE=' . $id);
    }

    public function update(Genre $g)
    {
        $query = $this->dao->prepare('UPDATE genre SET NOM_GENRE = :NOM_GENRE WHERE ID_GENRE = :id');

        $query->bindValue(':NOM_GENRE', $g->getNom(), PDO::PARAM_STR);
        $query->bindValue(':id', $g->getID(), PDO::PARAM_INT);

        $query->execute();
    }

    public function get($id)
    {
        $id = (int) $id;

        $query = $this->dao->query('SELECT ID_GENRE, NOM_GENRE FROM genre WHERE ID_GENRE=' . $id);

        $donnees = $query->fetch(PDO::FETCH_ASSOC);

        return new Genre($donnees);
    }

    public function getList()
    {
        $arr = [];

        $query = $this->dao->query('SELECT ID_GENRE, NOM_GENRE FROM genre ORDER BY NOM_GENRE');
        
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            
            $arr[] = new Genre($donnees);
        }
        return $arr;
    }

    public function getFilmo($id)
    {
        $arr = [];
        $query = $this->dao->query('SELECT f.ID_FILM, f.ID_DIRECTOR, f.ID_GENRE, f.TITRE_FILM, f.DUREE_FILM, f.DATE_FILM, f.IMG_FILM
        FROM
            film f
        INNER JOIN
            genre g ON g.ID_GENRE = f.ID_GENRE
        WHERE g.ID_GENRE =' . $id);
        
        while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
        {
            $arr[] = new Movie($donnees);
        }
        return $arr;
    }
}