<?php
namespace Fuyens\POO;
use PDO;

class Manager
{
    protected function dbConnect()
    {
        $bdd = new PDO('mysql:host=obol.myd.infomaniak.com;dbname=obol_test;charset=utf8', 'obol_olivier', 'pp55t2p4',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		return $bdd;
    }
}