<?php

namespace App\Controller;

class Controller
{
    /**
     * Router (controller)
     */
    public function route(): void {
        try {
            if(isset($_GET['controller'])) {
                switch ($_GET['controller']) {
                    case 'page':
                        $pageController = new PageController();
                        $pageController->route();
                        break;
                    case 'book':
                        $bookController = new BookController();
                        $bookController->route();
                        break;
                    default:
                        throw new \Exception("Ce contrôleur  n'existe pas.");
                }
            } else {
                // Load the home page by default
                $pageController = new PageController();
                $pageController->home();
            }
        } catch(\Exception $e) {
            // Render the error page with the message of the error
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Render a view
     * @param string $path
     * @param array $params
     */
    protected function render(string $path, array $params = []): void {
        $filePath = _ROOTPATH_.'/templates/'.$path.'.php';

        try {
            if(!file_exists($filePath)) {
                throw new \Exception("Le fichier n'existe pas :".$filePath);
            } else {
                // extracts the array to variables
                extract($params);
                require_once $filePath;
            }
        } catch(\Exception $e) {
            // Render the error page with the message of the error
            $this->render('errors/default', [
                'error' => $e->getMessage(),
            ]);
        }
    }



}