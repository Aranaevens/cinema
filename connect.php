<?php

function daoconnect()
{
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=cinema;charset=utf8', 'root', '');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
    finally{
        return $bdd;
    }
}