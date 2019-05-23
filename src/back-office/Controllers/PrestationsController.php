<?php 

class PrestationsController extends Controller {

    protected $error = [
        'image' => [],
        'form' => []
    ];
    protected $img;
    protected $form;

    public function __construct()
    {
        $this->setTwig();
    }

    public function hub($action=null, $id=null) {
        if(!$action && $id) {
            $this->showPrestation($id);
        } elseif($action == 'modify' && $id) {
            $this->modifyPrestation($id);
        } elseif($action == 'add') {
            $this->addPrestation();
        } else {
            $this->showDefault();
        }
    }    

    protected function showDefault() {
        $this->showPrestations();
    }
    
    protected function run() {
        $twig = $this->getTwig();
        echo $twig->render($this->getVue(), [
            'data' => $this->getData()
        ]); 
    }
    
    protected function showPrestations() {
        $this->setData(PrestationsManager::getPrestations());
        $this->setVue('Vue_Prestations.twig');
        $this->run();
    }

    protected function showPrestation($id) {
        $this->setData(PrestationsManager::getPrestation($id));
        $this->pushData('categories', PrestationsManager::getCategories());
        $this->setVue('Vue_Prestation.twig');
        $this->run();
    }

    protected function modifyPrestation($id) {
/*         if(isset($_POST)) {
            if($this->checkForm()) {
                $form = $this->getForm();
                PrestationsManager::update($id, $form);
            }
        } */
        if(isset($_FILES)) {
            if($this->checkImage()) {
                $img = $this->getImg();
                $path = $img->getPath();
                //PrestationsManager::updatePathImg($id, $path);
            }
        }
    }

    protected function addPrestation() {
        if(isset($_POST) AND !empty($_POST)) {

        }
    }

    protected function checkImage() {
        if (!isset($_FILES['file']) || $_FILES['file']['error'] != 0) {
            $this->setError('image', 'Aucune image reçue');
            return false;
        }            
        require 'Controllers/Image.php';
        $img = new Image($_FILES['file'], 5000, 'static');
        if(count($img->getError()) == 0) {
            $registred = $img->register();
        }    
        if($registred) {
            $this->setImg($img);
            return true;
        } else {
            $img->setError('Erreur dans le chargement du fichier');
            $this->setError('image', $img->getError());
            return false;
        }
    }

    protected function checkForm() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucun formulaire reçu');
            return;
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
        } else {
            $this->setError('form', $form->getError());
        }
    }

    protected function setError($type, $error) {
        $this->error[$type] = $error;
    }

    protected function getError($type, $error) {
        return $this->error;
    }

    protected function setImg($img) {
        $this->img = $img;
    }

    protected function getImg() {
        return $this->img;
    }

    protected function setForm($form) {
        $this->form = $form;
    }

    protected function getForm() {
        return $this->form;
    }


}