<?php 

class PrestationsController extends Controller {

    private $error = [
        'image' => [],
        'form' => []
    ];

    public function __construct()
    {
        $this->setTwig();
    }

    public function hub($action=null, $id=null) {
        if(!$action && $id) {
            $this->showPrestation($id);
        } elseif($action == 'modify' && $id) {
            //$this->modifyPrestation($id);
            $this->checkForm();
        } elseif($action == 'add') {
            $this->addPrestation();
        } else {
            $this->showPrestations();
        }
    }    

    public function showDefault() {
        $this->showPrestations();
    }
    
    protected function run() {
        $twig = $this->getTwig();
        echo $twig->render($this->getVue(), [
            'data' => $this->getData()
        ]); 
    }
    
    public function showPrestations() {
        $this->setData(PrestationsManager::getPrestations());
        $this->setVue('Vue_Prestations.twig');
        $this->run();
    }

    public function showPrestation($id) {
        $this->setData(PrestationsManager::getPrestation($id));
        $this->pushData('categories', PrestationsManager::getCategories());
        $this->setVue('Vue_Prestation.twig');
        $this->run();
    }

    public function modifyPrestation($id) {
        if(isset($_FILES)) {
            $errorImg = $this->checkImage();
            if(count($errorImg) == 0) {

            }
        }
    }

    public function addPrestation() {
        if(isset($_POST) AND !empty($_POST)) {

        }
    }

    protected function checkImage() {
        if (!isset($_FILES['file']) || $_FILES['file']['error'] != 0) {
            return false;
        }            
        require 'Controllers/Image.php';
        $img = new Image($_FILES['file'], 5000, 'static');
        if(count($img->getError()) == 0) {
            $img->register();
        } else {
            $img->setError('Erreur dans le chargement du fichier');
        }
        return $img->getError();
    }

    protected function checkForm() {
        if(!isset($_POST) || empty($_POST)) {
            return false;
        }
        require 'Controllers/Form.php';
        $fields = [
            'titre'     => ['lengthMin' => 5, 'lengthMax' => 200, 'regex' => null],
            'detail'    => ['lengthMin' => 0, 'lengthMax' => 5000, 'regex' => null],
            'temps'     => ['lengthMin' => 1, 'lengthMax' => 10, 'regex' => null],
            'prix'      => ['lengthMin' => 1, 'lengthMax' => 10, 'regex' => null],
            'categorie' => ['lengthMin' => 1, 'lengthMax' => 200, 'regex' => null]
        ];
        $form = new Form($fields, $_POST);
        if(count($form->getError()) == 0) {
            return true;
        }
        return $form->getError();
    }

    private function setError($type, $error) {
        $this->error[$type] = $error;
    }

    public function getError($type, $error) {
        $this->error[$type] = $error;
    }

}