<?php


namespace App\Controller;


class BookController
{

    public function route(): void {
        try {
            if(isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'show':
                        $this->about();
                        break;
                    case 'list':
                        $this->home();
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
}