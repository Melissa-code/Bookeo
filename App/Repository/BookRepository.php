<?php

namespace App\Repository;

use App\Entity\Book;
use App\Database\MySql;

class BookRepository
{
    /**
     * Find a book by id (in the DB)
     * @param int $id
     * @return Book
     */
    public function findOneById(int $id) : Book
    {
        $mySql = MySql::getInstance();
        // var_dump($mySql);

        // a single instance of PDO
        $pdo = $mySql->getPDO();

        $query = $pdo->prepare("SELECT * FROM book WHERE id = :id");
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $book = $query->fetch();

        // simulation DB
//        $book = [
//            'id' => 1,
//            'title' => "Cyrano de Bergerac",
//            'description' => "Cyrano de Bergerac est l'une des pièces les plus populaires du théâtre français, et la plus célèbre de son auteur, Edmond Rostand."
//        ];
        $bookEntity = new Book();
        $bookEntity->setId($book['id']);
        $bookEntity->setTitle($book['title']);
        $bookEntity->setDescription($book['description']);

//        foreach ($bookEntity as $key => $value) {
//            $bookEntity->{'set'}($value);
//        }

        return $bookEntity;
    }



}