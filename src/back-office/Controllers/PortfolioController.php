<?php 

class PortfolioController extends Controller {

    protected $albums;
    protected $img;
    protected $error = [
        'image' => [],
        'form' => []
    ];

    const FIELDS_REF = [
        'titre'     => ['lengthMin' => 5, 'lengthMax' => 200, 'regex' => null],
        'album'     => ['lengthMin' => 0, 'lengthMax' => 10, 'regex' => null],
        'mots_cles' => ['lengthMin' => 1, 'lengthMax' => 250, 'regex' => null]
    ];

    public function __construct()
    {
        $this->setTwig();
        $this->setAlbums();
    }

    public function hub($action=null, $id=null) {
        if(!$action && $id) {
            $this->showPhoto($id);
        } elseif($action == 'modify' && $id) {
            $this->modifyPhoto($id);
        } elseif($action == 'visibility' && $id) {
            $this->visibility($id);
        } elseif($action == 'add') {
            $this->addPhoto();
        } elseif($action == 'delete' && $id) {
            $this->deletePhoto($id);
        } elseif($action == 'deleteImg' && $id) {
            $this->deleteImg($id);
        } else {
            $this->showDefault();
        }
    }    

    protected function showDefault() {
        $this->showPhotos();
    }
    
    protected function showPhotos() {
        $this->setData(PortfolioManager::selectPhotos());
        $this->setVue('Vue_Portfolio.twig');
        $this->run();
    }

    protected function showPhoto($id) {
        $this->setData(PortfolioManager::selectPhoto($id));
        $this->setVue('Vue_PortfolioPhoto.twig');
        $this->run();
    }

    protected function addPhoto() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setData(false);
            $this->setFiltre('addPhoto');
            $this->setVue('Vue_PortfolioPhoto.twig');
            $this->run();                
            exit();
        } 
        if(!isset($_FILES['file']) || $_FILES['file']['error'] != 0) { 
            $this->setError('image', 'Aucune image reçue');
            if(!isset($_POST) || empty($_POST)) {
                $this->setError('form', 'Aucun formulaire reçu');
            }
            echo (json_encode($this->getError()));
            exit();
        }
        $form = new Form($this::FIELDS_REF, $_POST);   
        $img = new Image($_FILES['file'], 5000, $this->getFolderImg());
        //$img = new Image($_FILES['file'], 5000, '../static');

        if(count($form->getError()) == 0 AND count($img->getError()) == 0) {
            if($img->register()) {
                PortfolioManager::insertPhoto($form->getFields(), $img->getPath());
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
            PortfolioManager::updatePhoto($id, $form->getFields());
        }

        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            $img = new Image($_FILES['file'], 5000, $this->getFolderImg());
            //$img = new Image($_FILES['file'], 5000, '../static');
            if(count($img->getError()) == 0) {
                if(file_exists(PortfolioManager::selectPathImg($id))) {
                    unlink(PortfolioManager::selectPathImg($id));
                } 
                if($img->register()) {
                    PortfolioManager::updatePathImg($id, $img->getPath());
                }
            }
            $this->setErrors('image', $img->getError());
        }    
        $this->setErrors('form', $form->getError());
        echo (json_encode($this->getError()));        
    }

    protected function deletePhoto($id) {
        if(file_exists(PortfolioManager::selectPathImg($id))) {
            unlink(PortfolioManager::selectPathImg($id));
        }
        PortfolioManager::deletePhoto($id);
        $this->showPhotos();
    }

    protected function visibility($id) {
        PortfolioManager::updateVisibility($id);
        $this->showPhotos();
    }

    protected function run() {
        $twig = $this->getTwig();;
        echo $twig->render($this->getVue(), [
            'data' => $this->getData(),
            'albums' => $this->getAlbums(),
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

    protected function setImg($img) {
        $this->img = $img;
    }

    protected function getImg() {
        return $this->img;
    }

    protected function getAlbums() {
        return $this->albums;
    }

    protected function setAlbums() {
        $this->albums = PortfolioAlbumsManager::selectAlbums();
    }

}