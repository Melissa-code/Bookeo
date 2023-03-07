<?php

namespace App\Repository;

use App\Entity\Book;

class BookRepository
{
    /**
     * Get a book by id
     * @param int $id
     * @return Book
     */
    public function findOneById(int $id) : Book
    {
        // simulation DB
        $book = [
            'id' => 1,
            'title' => "Cyrano de Bergerac",
            'description' => "Cyrano de Bergerac est l'une des pièces les plus populaires du théâtre français, et la plus célèbre de son auteur, Edmond Rostand."
        ];

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