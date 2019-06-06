<?php 

class PrestationsController extends Controller {

    protected $categories;
    protected $img;
    protected $error = [
        'image' => [],
        'form' => []
    ];
    const FIELDS_REF = [
        'titre'     => ['lengthMin' => 5, 'lengthMax' => 200, 'regex' => null],
        'detail'    => ['lengthMin' => 0, 'lengthMax' => 5000, 'regex' => null],
        'temps'     => ['lengthMin' => 1, 'lengthMax' => 10, 'regex' => null],
        'prix'      => ['lengthMin' => 1, 'lengthMax' => 10, 'regex' => null],
        'categorie' => ['lengthMin' => 1, 'lengthMax' => 10, 'regex' => null]
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
        } elseif($action == 'delete' && $id) {
            $this->deletePrestation($id);
        } elseif($action == 'deleteImg' && $id) {
            $this->deleteImg($id);
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
        $this->setVue('Vue_Prestation.twig');
        $this->run();
    }

    protected function modifyPrestation($id) {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucun formulaire reçu');
            echo (json_encode($this->getError()));
            exit();
        } 
        $form = new Form($this::FIELDS_REF, $_POST);
        if(count($form->getError()) == 0) {
            PrestationsManager::updatePrestation($id, $form->getFields());
        }

        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            $img = new Image($_FILES['file'], 5000, '../../static');
            //$img = new Image($_FILES['file'], 5000, '../static');
            if(count($img->getError()) == 0) {
                if(file_exists(PrestationsManager::selectPathImg($id))) {
                    unlink(PrestationsManager::selectPathImg($id));
                } 
                if($img->register()){
                    PrestationsManager::updatePathImg($id, $img->getPath());
                }
            }
            $this->setErrors('image', $img->getError());
        }  
        $this->setErrors('form', $form->getError());
        echo (json_encode($this->getError()));        
    }

    protected function addPrestation() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setData(false);
            $this->setFiltre('addPrestation');
            $this->setVue('Vue_Prestation.twig');
            $this->run();                
            exit();
        } 
        
        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            $form = new Form($this::FIELDS_REF, $_POST);   
            $img = new Image($_FILES['file'], 5000, '../../static');
            //$img = new Image($_FILES['file'], 5000, '../static');

            if(count($form->getError()) == 0 AND count($img->getError()) == 0) {
                PrestationsManager::insertPrestation($form->getFields());
                PrestationsManager::updatePathImg(PrestationsManager::selectIdLastPrestation(), $img->getPath());
                $img->register();
            }
            $this->setErrors('image', $img->getError());
        } else {
            $form = new Form($this::FIELDS_REF, $_POST);   
            if(count($form->getError()) == 0) {
                PrestationsManager::insertPrestation($form->getFields());
            }
        }
        $this->setErrors('form', $form->getError());
        echo (json_encode($this->getError()));
    }

    protected function deletePrestation($id) {
        if(file_exists(PrestationsManager::selectPathImg($id))) {
            unlink(PrestationsManager::selectPathImg($id));
        }
        PrestationsManager::deletePrestation($id);
        $this->showPrestations();
    }

    protected function deleteImg($id) {
        if(file_exists(PrestationsManager::selectPathImg($id))) {
            unlink(PrestationsManager::selectPathImg($id));
            PrestationsManager::updatePathImg($id, null);
        } else {
            $this->setError('image', 'Erreur dans la suppression de l\'image, la prestation n\'a pu être supprimmée');
        }
        $this->showPrestation($id);
    }

    protected function run() {
        $twig = $this->getTwig();;
        echo $twig->render($this->getVue(), [
            'data' => $this->getData(),
            'categories' => $this->getCategories(),
            'filtre' => $this->getFiltre()
        ]); 
    }    

    protected function setError($type, $error) {
        $this->error[$type] = $error;
    }

    protected function setErrors($type, $errors) {
        foreach ($errors as $error) {
            $this->error[$type][] = $error;
        }
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

    protected function getCategories() {
        return $this->categories;
    }

    protected function setCategories() {
        $this->categories = CategoriesManager::selectCategories();
    }

}