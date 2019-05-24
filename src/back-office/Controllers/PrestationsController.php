<?php 

class PrestationsController extends Controller {

    protected $img;
    protected $dataForm;
    protected $error = [
        'image' => [],
        'form' => []
    ];
    const FIELDS_REF = [
        'titre'     => ['lengthMin' => 5, 'lengthMax' => 200, 'regex' => null],
        'detail'    => ['lengthMin' => 0, 'lengthMax' => 5000, 'regex' => null],
        'temps'     => ['lengthMin' => 1, 'lengthMax' => 10, 'regex' => null],
        'prix'      => ['lengthMin' => 1, 'lengthMax' => 10, 'regex' => null],
        'categorie' => ['lengthMin' => 5, 'lengthMax' => 200, 'regex' => null]
    ];

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
            $this->addPrestation2();
        } else {
            $this->showDefault();
        }
    }    

    protected function showDefault() {
        $this->showPrestations();
    }
    
    protected function showPrestations() {
        $this->setData(PrestationsManager::selectPrestations());
        $this->setVue('Vue_Prestations.twig');
        $this->run();
    }

    protected function showPrestation($id) {
        $this->setData(PrestationsManager::selectPrestation($id));
        $this->pushData('categories', PrestationsManager::getCategories());
        $this->setVue('Vue_Prestation.twig');
        $this->run();
    }

    protected function modifyPrestation($id) {
        if(isset($_POST) AND !empty($_POST)) {
            if($this->checkForm()) {
                $data = $this->getDataForm();
                PrestationsManager::update($id, $data);
            }
        } 
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
            if($this->checkForm() AND $this->checkImage()) {
                $data = $this->getDataForm();
                PrestationsManager::insertPrestation($data);
            } else {
                var_dump('kk - erreur');
            }           
        } else {
            $this->setFiltre('addPrestation');
            $this->setVue('Vue_prestation.twig');
            $this->run();
        } 
    }

    protected function addPrestation2() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setFiltre('addPrestation');
            $this->setVue('Vue_prestation.twig');
            $this->run();
            exit();
        } 
        if(!isset($_FILES['file']) || $_FILES['file']['error'] != 0) {
            $this->setError('image', 'Aucune image reçue');
            $error = json_encode($this->getError());
            echo $error;
            exit();
        }
        require 'Controllers/Form.php';
        require 'Controllers/Image.php';

        $form = new Form($this::FIELDS_REF, $_POST);   
        $img = new Image($_FILES['file'], 5000, 'static');
        if(count($form->getError()) == 0 AND count($img->getError()) == 0) {
            PrestationsManager::insertPrestation($form->getFields(), $img->getPath());
            $img->register();
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
            var_dump('test 2');
            return false;
        }
        require 'Controllers/Form.php';
        $form = new Form($this::FIELDS_REF, $_POST);   
        $form->runCheck();  
        var_dump($form->getError());   
        if(count($form->getError()) == 0) {
            $this->setDataForm($form->getFields());
            return true;
        } else {
            $this->setError('form', $form->getError());
            return false;
        }
    }

    protected function run() {
        $twig = $this->getTwig();
        echo $twig->render($this->getVue(), [
            'data' => $this->getData(),
            'filtre' => $this->getFiltre()
        ]); 
    }    

    protected function setError($type, $error) {
        $this->error[$type] = $error;
    }

    protected function getError() {
        return $this->error;
    }

    protected function setImg($img) {
        $this->img = $img;
    }

    protected function getImg() {
        return $this->img;
    }

    protected function setDataForm($fields) {
        $this->dataForm = $fields;
    }

    protected function getDataForm() {
        return $this->dataForm;
    }


}