<?php 

class MessagesController extends Controller {

    private $filtre;

    public function __construct()
    {
        $this->filtre = null;
    }

    public function showDefault() {
        $this->showMessages();
    }

    public function showMessages() {
        $this->data = MessagesManager::getMessages();
        $this->vue = "Vue_Messages.twig";
        $twig = $this->getTwig();
        echo $twig->render($this->getVue(), [
            'data' => $this->getData(),
            'filtre'   => $this->getFiltre()
            ]); 
    }

    private function
}