<?php 

class CategoriesController extends Controller {

    const FIELDS_REF = [
        'titre'     => ['lengthMin' => 5, 'lengthMax' => 150, 'regex' => null],
    ];
    const IMG_SIZE_MAX = 3000;

    public function __construct()
    {
        $this->setTwig();
    }

    public function hub($action=null, $id=null) {
        if(!$action) {
            $this->showCategories();
        } elseif($action == 'modify' && $id) {
            $this->modifyCategorie($id);
        } elseif($action == 'add') {
            $this->addCategorie();
        } elseif($action == 'del' && $id) {
            $this->deleteCategorie($id);
        } else {
            $this->showCategories();
        }
    }    
    
    protected function showCategories() {
        $this->setData(CategoriesManager::selectCategories());
        $this->setVue('Vue_Categories.twig');
        $this->run();
    }

    protected function addCategorie() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucun formulaire reçu');
            echo (json_encode($this->getError()));              
            exit();
        } 
        if(!isset($_FILES['file']) || $_FILES['file']['error'] !== 0) { 
            $this->setError('image', 'Aucune image reçue');
            if(!isset($_POST) || empty($_POST)) {
                $this->setError('form', 'Aucun formulaire reçu');
            }
            echo (json_encode($this->getError()));
            exit();
        }
        $form = new Form($this::FIELDS_REF, $_POST);   
        $img = new Image($_FILES['file'], $this::IMG_SIZE_MAX, $this->getFolderImg());

        if(count($form->getError()) == 0 AND count($img->getError()) == 0) {
            if($img->register()) {
                CategoriesManager::insertCategorie($form->getFields(), $img->getPath());
            } else {
                $this->setError('image', "Erreur dans l'enregistrement de l'image");
            }
        }
        $this->setErrors('image', $img->getError());
        $this->setErrors('form', $form->getError());
        echo (json_encode($this->getError()));
    }    

    protected function modifyCategorie($id) {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucun formulaire reçu');
            echo (json_encode($this->getError()));
            exit();
        } 

        $form = new Form($this::FIELDS_REF, $_POST);
        if(count($form->getError()) == 0) {
            if(CategoriesManager::categorieNameNotExist($id, $form->getFields())) {
                CategoriesManager::updateCategorie($id, $form->getFields());
            } else {
                $form->setError('Une categorie de ce nom existe déjà');
                echo (json_encode($this->getError()));
            }            
        }
        
        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            $img = new Image($_FILES['file'], $this::IMG_SIZE_MAX, $this->getFolderImg());
            if(count($img->getError()) == 0) {
                if(file_exists(CategoriesManager::selectPathImg($id))) {
                    unlink(CategoriesManager::selectPathImg($id));
                } 
                if($img->register()) {
                    CategoriesManager::updatePathImg($id, $img->getPath());
                }
            }
            $this->setErrors('image', $img->getError());
        }    
        $this->setErrors('form', $form->getError());
        echo (json_encode($this->getError()));        
    }    

    protected function deleteCategorie($id) {
        if(file_exists(CategoriesManager::selectPathImg($id))) {
            unlink(CategoriesManager::selectPathImg($id));
        }
        CategoriesManager::deleteCategorie($id);
        $this->showCategories();
    }

    protected function run() {
        $twig = $this->getTwig();
        echo $twig->render($this->getVue(), [
            'data' => $this->getData(),
            'filtre' => $this->getFiltre()
        ]); 
    }    
}

