<?php
/**
 * Copyright (c) CodeEngine Academy by Markus Lech. This is a Projekt from CodeEngine Academy. All rights reserved.
 ******************************************************************************/


namespace App\Core;
use PDO;

abstract class AbstractRepository {


    protected $pdo;

    public function __construct(PDO $pdo){
        $this->pdo = $pdo;
    }


    abstract function getTableName();
    abstract function getModel();


    // Holt alle EInträge aus der DB
    function fetchAll(){

        $table = $this->getTableName();
        $model = $this->getModel();
        $statement = $this->pdo->query("SELECT * FROM `$table`");
        $posts = $statement->fetchAll(PDO::FETCH_CLASS, $model);
        return $posts;
    }

    // Holt aeinen bestimmten EIntrag aus der DB
    function fetchOne( $id)
    {
        $table = $this->getTableName();
        $model = $this->getModel();
        $statement = $this->pdo->prepare("SELECT * FROM `$table` WHERE `postid`  = :postid ");
        $statement->execute(['id' => $id]);
        $statement->setFetchMode(PDO::FETCH_CLASS, $model);
        $post = $statement->fetch(PDO::FETCH_CLASS);
        return $post;
    }

}