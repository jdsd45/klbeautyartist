<?php 

class CarouselController extends Controller {

    protected $error = [
        'image' => [],
        'form' => []
    ];
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
            $this->showPhotos();
        } elseif($action == 'modify' && $id) {
            $this->modifyPhoto($id);
        } elseif($action == 'add') {
            $this->addPhoto();
        } elseif($action == 'del' && $id) {
            $this->deletePhoto($id);
        } else {
            $this->showDefault();
        }
    }    

    protected function showDefault() {
        $this->showPhotos();
    }
    
    protected function showPhotos() {
        $this->setData(CarouselManager::selectPhotos());
        $this->setVue('Vue_Carousel.twig');
        $this->run();
    }

    protected function addPhoto() {
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
                CarouselManager::insertPhoto($form->getFields(), $img->getPath());
            } else {
                $this->setError('image', "Erreur dans l'enregistrement de l'image");
            }
        }
        $this->setErrors('image', $img->getError());
        $this->setErrors('form', $form->getError());
        echo (json_encode($this->getError()));
    }    

    protected function modifyPhoto($id) {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucun formulaire reçu');
            echo (json_encode($this->getError()));
            exit();
        } 

        $form = new Form($this::FIELDS_REF, $_POST);
        if(count($form->getError()) == 0) {
            CarouselManager::updatePhoto($id, $form->getFields());
        }
        
        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            $img = new Image($_FILES['file'], $this::IMG_SIZE_MAX, $this->getFolderImg());
            if(count($img->getError()) == 0) {
                if(file_exists(CarouselManager::selectPathImg($id))) {
                    unlink(CarouselManager::selectPathImg($id));
                } 
                if($img->register()) {
                    CarouselManager::updatePathImg($id, $img->getPath());
                }
            }
            $this->setErrors('image', $img->getError());
        }    
        $this->setErrors('form', $form->getError());
        echo (json_encode($this->getError()));        
    }    

    protected function deletePhoto($id) {
        if(file_exists(CarouselManager::selectPathImg($id))) {
            unlink(CarouselManager::selectPathImg($id));
        }
        CarouselManager::deletePhoto($id);
        $this->showPhotos();
    }

    protected function run() {
        $twig = $this->getTwig();
        echo $twig->render($this->getVue(), [
            'data' => $this->getData(),
            'filtre' => $this->getFiltre()
        ]); 
    }    

    protected function setError($type, $error) {
        $this->error[$type][] = $error;
    }

    protected function setErrors($type, $errors) {
        foreach ($errors as $error) {
            $this->error[$type][] = $error;
        }
    }

    protected function getError() {
        return $this->error;
    }
}

