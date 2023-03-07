<?php

namespace App\Repository;

use App\Entity\Book;
use App\Database\MySql;
use App\Tools\StringTools;

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
        // var_dump($mySql); //OK

        // a single instance of PDO
        $pdo = $mySql->getPDO();

        $query = $pdo->prepare("SELECT * FROM book WHERE id = :id");
        $query->bindValue(':id', $id, $pdo::PARAM_INT);
        $query->execute();
        $book = $query->fetch($pdo::FETCH_ASSOC); // To return one array only

        $bookEntity = new Book();

        foreach ($book as $key => $value) {
            //var_dump(StringTools::toPascalCase($key));
            $bookEntity->{'set'.StringTools::toPascalCase($key)}($value);
        }

        return $bookEntity;
    }



}