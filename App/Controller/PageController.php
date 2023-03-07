<?php


namespace App\Controller;


class PageController extends Controller
{
    /**
     * Router (action)
     */
    public function route(): void {
        try {
            if(isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'about':
                        $this->about();
                        break;
                    case 'home':
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

    /**
     * About page
     */
    protected function about(): void {
        $params = [
            'test'=> 'abc',
            'test2'=> 'HEE',
        ];
        //echo "about";
        $this->render('page/about', $params);
    }

    /**
     * Home page
     */
    protected function home(): void {
        $this->render('page/home', [

        ]);
    }
}