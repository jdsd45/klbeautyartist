<?php 

class AboutController extends Controller {

    protected $img;
    protected $error = [
        'image' => [],
        'form' => []
    ];

    const FIELDS_REF = [
        'content'     => ['lengthMin' => 5, 'lengthMax' => 9999, 'regex' => null]
    ];

    public function __construct()
    {
        $this->setTwig();
    }

    public function hub($action=null, $id=null) {
        if(!$action) {
            $this->showAbout();
        } elseif($action == 'modify') {
            $this->modifyAbout();
        } else {
            $this->showDefault();
        }
    }    

    protected function showDefault() {
        $this->showAbout();
    }

    protected function showAbout() {
        $this->setData(AboutManager::selectAbout());
        $this->setVue('Vue_About.twig');
        $this->run();
    }

    protected function modifyAbout() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucun formulaire reçu');
            echo (json_encode($this->getError()));
            exit();
        } 
        $form = new Form($this::FIELDS_REF, $_POST);
        if(count($form->getError()) == 0) {
            AboutManager::updateAbout($form->getFields());
        }
        
        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            $img = new Image($_FILES['file'], 5000, $this->getFolderImg());
            //$img = new Image($_FILES['file'], 5000, '../static');
            if(count($img->getError()) == 0) {
                if(file_exists(AboutManager::selectPathImg())) {
                    unlink(AboutManager::selectPathImg());
                } 
                if($img->register()) {
                    AboutManager::updatePathImg($img->getPath());
                }
            }
            $this->setErrors('image', $img->getError());
        }    
        $this->setErrors('form', $form->getError());
        echo (json_encode($this->getError()));        
    }

    protected function run() {
        $twig = $this->getTwig();;
        echo $twig->render($this->getVue(), [
            'data' => $this->getData(),
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

}




