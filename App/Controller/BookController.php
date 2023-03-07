<?php


namespace App\Controller;

use App\Entity\Book;
use App\Repository\BookRepository;


class BookController extends Controller {

    /**
     * Router (Book)
     */
    public function route(): void {
        try {
            if(isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->show();
                        break;
                    case 'list':
                        // $this->list();
                        break;
                    case 'edit':
                        // $this->edit();
                        break;
                    case 'add':
                        // $this->add();
                        break;
                    case 'delete':
                        // $this->delete();
                        break;

                    default:
                        throw new \Exception("Cette action n'existe pas.");
                }
            } else {
                throw new \Exception("Aucune action détectée.");
            }
        } catch (\Exception $e) {
            // Render the error page with the message of the error
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     *
     */
    protected function show(): void
    {
        try {
            if(isset($_GET['id'])) {

                $id = (int)$_GET['id'];

                // Load the book by an appeal to the repository
                $bookRepository = new BookRepository();
                $book = $bookRepository->findOneById($id);

                $this->render('book/show', [
                    "book" => $book,
                ]);
            } else {
                throw new \Exception("Il n'y a pas d'id de livre.");
            }
        } catch (\Exception $e) {
            // Render the error page with the message of the error
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }
    }


}