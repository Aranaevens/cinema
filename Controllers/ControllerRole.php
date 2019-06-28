<?php

require_once 'Models\Movie.php';
require_once 'Models\Actor.php';
require_once 'Models\Director.php';
require_once 'Models\Cast.php';
require_once 'connect.php';
require_once 'Managers\RoleManager.php';


class ControllerRole
{
    private $init;

    public function __construct()
    {
        
    }

    public function listRole()
    {
        $dbd = daoconnect();
        $man = new RoleManager($dbd);
        $list = $man->getList();
        require "Views\ListRole.php";
    }

    public function viewFilmography($n)
    {
        $dbd = daoconnect();
        $man = new RoleManager($dbd);
        $target = $man->get($n);
        $list = $man->getDetails($n);
        require "Views\DetailRole.php";
    }

    public function createNewView()
    {
        require "Views\createNewRole.php";
    }

    public function pushNew($tar)
    {
        $dbd = daoconnect();
        $man = new RoleManager($dbd);
        $man->add($tar);
    }

    public function deleteView()
    {
        $dbd = daoconnect();
        $man = new RoleManager($dbd);
        $list = $man->getList();
        require "Views\deleteRoleView.php";
    }

    public function deleteOne($id)
    {
        $dbd = daoconnect();
        $man = new RoleManager($dbd);
        $man->delete($id);
    }

    public function editView()
    {
        $dbd = daoconnect();
        $man = new RoleManager($dbd);
        $list = $man->getList();
        require "Views\\editRoleView.php";
    }

    public function editPlacehold($i)
    {
        $dbd = daoconnect();
        $man = new RoleManager($dbd);
        $target = $man->get($i);
        return array(
            "target" => $target,
        );
    }
    
    public function editOne($o)
    {
        $dbd = daoconnect();
        $man = new RoleManager($dbd);
        $man->delete($o);
    }
}

?>