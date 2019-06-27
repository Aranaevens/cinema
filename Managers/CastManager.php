<?php

require_once 'Models\Cast.php';

class CastManager
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

    public function add(Cast $c)
    {
        $query = $this->dao->prepare('INSERT INTO casting (ID_ACTOR, ID_FILM, ID_ROLE) VALUES(:ID_ACTOR, :ID_FILM, :ID_ROLE)');

        $query->bindValue(':ID_ACTOR', $c->getActor(), PDO::PARAM_INT);
        $query->bindValue(':ID_FILM', $c->getFilm(), PDO::PARAM_INT);
        $query->bindValue(':ID_ROLE', $c->getRole(), PDO::PARAM_INT);

        $query->execute();
    }

    public function delete($id_a, $id_f, $id_r)
    {
        $this->dao->exec('DELETE FROM casting WHERE ID_ACTOR=' . $id_a . 'AND ID_FILM=' . $id_f . 'AND ID_ROLE=' . $id_r);
    }

    public function update(Cast $c)
    {
        //useless
    }

    public function get($id)
    {
        //useless
    }

    public function getList()
    {
        //useless
    }
}