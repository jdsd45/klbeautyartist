<?php 

class PrestationsController extends Controller {

    protected $categories;
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
        $this->setCategories();
    }

    public function hub($action=null, $id=null) {
        if(!$action && $id) {
            $this->showPrestation($id);
        } elseif($action == 'modify' && $id) {
            $this->modifyPrestation($id);
        } elseif($action == 'add') {
            $this->addPrestation();
        } elseif($action == 'del' && $id) {
            $this->deletePrestation($id);
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
        //$this->pushData('categories', PrestationsManager::selectCategories());
        $this->pushData('categories', $this->getCategories());
        $this->setVue('Vue_Prestation.twig');
        $this->run();
    }

    protected function modifyPrestation($id) {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucune formulaire reçu');
            echo (json_encode($this->getError()));
            exit();
        } 

        require 'Controllers/Form.php';
        $form = new Form($this::FIELDS_REF, $_POST);
        var_dump('test');
        if(count($form->getError()) == 0) {
            PrestationsManager::updatePrestation($id, $form->getFields());
        }

        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            require 'Controllers/Image.php';
            $img = new Image($_FILES['file'], 5000, 'static');
            if(count($img->getError()) == 0) {
                if(unlink(PrestationsManager::selectPathImg($id))) {
                    $img->register();
                    PrestationsManager::updatePathImage($id, $img->getPath());
                }
            }
        }    
        echo (json_encode($this->getError()));        
    }


    protected function addPrestation() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setFiltre('addPrestation');
            $this->pushData('categories', $this->getCategories());
            $this->setVue('Vue_prestation.twig');
            $this->run();
            exit();
        } 
        if(!isset($_FILES['file']) || $_FILES['file']['error'] != 0) {
            $this->setError('image', 'Aucune image reçue');
            echo (json_encode($this->getError()));
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
        echo (json_encode($this->getError()));
    }

    protected function deletePrestation($id) {
        if(unlink(PrestationsManager::selectPathImg($id))) {
            PrestationManager::deletePrestation($id);
        } else {
            $this->setError('image', 'Erreur dans la suppression de l\'image, la prestation n\'a pu être supprimmée');
        }
        echo (json_encode($this->getError()));
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

    protected function getCategories() {
        return $this->categories;
    }

    protected function setCategories() {
        $this->categories = PrestationsManager::getCategories();
    }

}