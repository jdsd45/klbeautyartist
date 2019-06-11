<?php 

class PortfolioAlbumsController extends Controller {

    protected $error = [
        'image' => [],
        'form' => []
    ];
    const FIELDS_REF = [
        'titre'     => ['lengthMin' => 5, 'lengthMax' => 150, 'regex' => null],
    ];

    public function __construct()
    {
        $this->setTwig();
    }

    public function hub($action=null, $id=null) {
        if(!$action) {
            $this->showAlbums();
        } elseif($action == 'modify' && $id) {
            $this->modifyAlbum($id);
        } else {
            $this->showDefault();
        }
    }    

    protected function showDefault() {
        $this->showAlbums();
    }
    
    protected function showAlbums() {
        $this->setData(PortfolioAlbumsManager::selectAlbums());
        $this->setVue('Vue_PortfolioAlbums.twig');
        $this->run();
    }

    protected function modifyAlbum($id) {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucun formulaire reçu');
            echo (json_encode($this->getError()));
            exit();
        } 

        $form = new Form($this::FIELDS_REF, $_POST);
        if(count($form->getError()) == 0) {
            if(PortfolioAlbumsManager::albumNameNotExist($id, $form->getFields())) {
                PortfolioAlbumsManager::updateAlbum($id, $form->getFields());
            } else {
                $form->setError('Un album de ce nom existe déjà');
                echo (json_encode($this->getError()));
            }            
        }
        
        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            $img = new Image($_FILES['file'], 5000, $this->getFolderImg());
            if(count($img->getError()) == 0) {
                if(file_exists(PortfolioAlbumsManager::selectPathImg($id))) {
                    unlink(PortfolioAlbumsManager::selectPathImg($id));
                } 
                if($img->register()) {
                    PortfolioAlbumsManager::updatePathImg($id, $img->getPath());
                }
            }
            $this->setErrors('image', $img->getError());
        }    
        $this->setErrors('form', $form->getError());
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

