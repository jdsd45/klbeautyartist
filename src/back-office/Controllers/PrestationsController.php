<?php 

class PrestationsController extends Controller {

     public function __construct()
    {
        $this->setTwig();
    }

    public function showDefault() {
        $this->showPrestations();
    }

/*
    public function showMessages() {
        $this->setData(MessagesManager::getMessages());
        $this->setVue('Vue_Messages.twig');
        $this->run();
    }

    public function showMessage($id=null) {
        $this->setData(MessagesManager::getMessage($id));
        $this->setVue('Vue_Message.twig');
        $this->run();
    }

    public function deleteMessage($id) {
        MessagesManager::setSuppressionMessage($id);
    }

    public function cancelDelete($id) {
        MessagesManager::setSuppressionMessage($id);
    }

    public function showBin() {
        $this->setFiltre('bin');
        $this->setData(MessagesManager::getMessagesSupprimes());
        $this->setVue('Vue_Messages.twig');
        $this->run();
    } 
    */
    
    protected function run() {
        $twig = $this->getTwig();
        echo $twig->render($this->getVue(), [
            'data' => $this->getData()
        ]); 
    }

    /*
    public function hub($action=null, $id=null){
        if (!$action && $id) {
            $this->showMessage($id);
        } elseif($action == 'bin') {
            $this->showBin();
        } elseif($action == 'del' && $id) {
            $this->deleteMessage($id);
            $this->showMessages();
        } elseif($action == 'delcancel' && $id) {
            $this->cancelDelete($id);
            $this->showBin();
        } else {
            $this->showDefault();
        }
    } */

    public function modifyPrestation($id) {

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

    public function hub($action=null, $id=null) {
        if(!$action && $id) {
            $this->showPrestation($id);
        } else {
            $this->showPrestations();
        }
    }

}