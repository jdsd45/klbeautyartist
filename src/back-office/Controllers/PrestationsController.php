<?php 

class PrestationsController extends Controller {

    const FIELDS = ['titre', 'detail', 'prix', 'categorie', 'temps'];

    public function __construct()
    {
        $this->setTwig();
    }

    public function showDefault() {
        $this->showPrestations();
    }
    
    protected function run() {
        $twig = $this->getTwig();
        echo $twig->render($this->getVue(), [
            'data' => $this->getData()
        ]); 
    }
    
    public function showPrestations() {
        $this->setData(PrestationsManager::getPrestations());
        $this->setVue('Vue_Prestations.twig');
        $this->run();
    }

    public function showPrestation($id) {
        $this->setData(PrestationsManager::getPrestation($id));
        $this->pushData('categories', PrestationsManager::getCategories());
        $this->setVue('Vue_Prestation.twig');
        $this->run();
    }

    public function modifyPrestation($id) {
        if(isset($_FILES)) {
            $errorImg = $this->checkImage();
            if(count($errorImg) == 0) {

            }
        }
    }

    public function addPrestation() {
        if(isset($_POST) AND !empty($_POST)) {

        }
    }

    protected function checkImage() {
        if (isset($_FILES['file']) AND $_FILES['file']['error'] == 0) {
            require 'Controllers/Image.php';
            $img = new Image($_FILES['file'], 5000, 'static');
            if(count($img->getError()) == 0) {
                $img->register();
            }            
        } else {
            $img->setError('Erreur dans le chargement du fichier');
        }
        return $img->getError();
    }

    protected function checkForm() {
        $form = new Form();

    }

    public function hub($action=null, $id=null) {
        if(!$action && $id) {
            $this->showPrestation($id);
        } elseif($action == 'modify' && $id) {
            $this->modifyPrestation($id);
        } elseif($action == 'add') {
            $this->addPrestation();
        } else {
            $this->showPrestations();
        }

    }

}