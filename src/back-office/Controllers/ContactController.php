<?php 

class ContactController extends Controller {

    protected $img;
    protected $error = [
        'image' => [],
        'form' => []
    ];

    const FIELDS_REF = [
        'content_1'     => ['lengthMin' => 5, 'lengthMax' => 2000, 'regex' => null],
        'content_2'     => ['lengthMin' => 5, 'lengthMax' => 2000, 'regex' => null],
    ];

    public function __construct()
    {
        $this->setTwig();
    }

    public function hub($action=null, $id=null) {
        if(!$action) {
            $this->showContact();
        } elseif($action == 'modify') {
            $this->modifyContact();
        } else {
            $this->showDefault();
        }
    }    

    protected function showDefault() {
        $this->showContact();
    }

    protected function showContact() {
        $this->setData(ContactManager::selectContact());
        $this->setVue('Vue_Contact.twig');
        $this->run();
    }

    protected function modifyContact() {
        if(!isset($_POST) || empty($_POST)) {
            $this->setError('form', 'Aucun formulaire reçu');
            echo (json_encode($this->getError()));
            exit();
        } 
        $form = new Form($this::FIELDS_REF, $_POST);
        if(count($form->getError()) == 0) {
            ContactManager::updateContact($form->getFields());
        }
        
        if(isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            $img = new Image($_FILES['file'], 5000, $this->getFolderImg());
            //$img = new Image($_FILES['file'], 5000, '../static');
            if(count($img->getError()) == 0) {
                if(file_exists(ContactManager::selectPathImg())) {
                    unlink(ContactManager::selectPathImg());
                } 
                if($img->register()) {
                    ContactManager::updatePathImg($img->getPath());
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




