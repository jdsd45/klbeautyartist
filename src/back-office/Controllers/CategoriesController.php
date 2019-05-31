<?php 

class CategoriesController extends Controller {

    protected $error = [
        'image' => [],
        'form' => []
    ];
    const FIELDS_REF = [
        'nom'     => ['lengthMin' => 2, 'lengthMax' => 200, 'regex' => null],
    ];

    public function __construct()
    {
        $this->setTwig();
    }

    public function hub($action=null, $id=null) {
        if(!$action) {
            $this->showCategories();
        } elseif($action == 'modify' && $id) {
            $this->modifyCategorie($id);
            $this->showCategories();
        } elseif($action == 'add') {
            $this->addCategorie();
            $this->showCategories();
        } elseif($action == 'del' && $id) {
            $this->deleteCategorie($id);
            $this->showCategories();
        } else {
            $this->showDefault();
        }
    }    

    protected function showDefault() {
        $this->showCategories();
    }
    
    protected function showCategories() {
        $this->setData(CategoriesManager::selectCategories());
        $this->setVue('Vue_Categories.twig');
        $this->run();
    }

    protected function modifyCategorie($id) {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucune formulaire reçu');
            echo (json_encode($this->getError()));
            exit();
        } 
        require 'Controllers/Form.php';
        $form = new Form($this::FIELDS_REF, $_POST);
        if(count($form->getError()) == 0) {
            CategoriesManager::updateCategorie($id, $form->getFields());
        }
    }

    protected function addCategorie() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setVue('Vue_Categories.twig');
            $this->run();
            exit();
        } 
        require 'Controllers/Form.php';
        $form = new Form($this::FIELDS_REF, $_POST);   
        if(count($form->getError()) == 0) {
            CategoriesManager::insertCategorie($form->getFields());
        }
    }

    protected function deleteCategorie($id) {
        CategoriesManager::deleteCategorie($id);
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

}