<?php

/*
 * Util para exibir caixa de mensagem nas paginas HTML
 * Dependencias: bootstrap 3.x, jquery 2.x
 * Desenvolvedor: Guilherme Oliveira Toccacelli
 * Contato: consu3sg@gmail.com / gt0gt2.8@hotmail.com
 * 
 * Exemplo 1: echo new MessageBox("Welcome", "Hellow, World!", MessageBox::SUCCESS, MessageBox::DURATION_SLOW);
 * 
 * Exemplo 2: $messageBox = new MessageBox();
 * 
 *            $messageBox->setMessage("Welcome");
 *            $messageBox->setTitle("Hello, World!");
 *            $messageBox->setType(MessageBox::SUCCESS);
 *            $messageBox->setDuration(MessageBox::DURATION_SLOW);
 * 
 *            $messageBox->show();
 * 
 */

class MessageBox {

    const SUCCESS = 1;
    const INFO = 2;
    const WARNING = 3;
    const ERROR = 4;
    
    const DURATION_SLOW = 6000;
    const DURATION_NORMAL = 4000;
    const DURATION_FAST = 2000;

    private $title = "";
    private $message = "";
    private $type = 0;
    private $duration = -1;

    public function __construct($title, $message, $type = 0, $duration = -1) {
        $this->title = $title;
        $this->message = $message;
        $this->type = $type;
        $this->duration = $duration;
    }

    public function __toString() {
        $this->show();
    }

    public function show() {
        
        $tmpId = "tmpObj" . time();
        $button = ["btn-primary", "btn-success", "btn-info", "btn-warning", "btn-danger"][$this->type];

        $html = "<div class=\"modal fade\" id=\"$tmpId\" style=\"margin-top: 5%\" role=\"dialog\">"
                . "    <div class=\"modal-dialog modal-sm\">"
                . "        <div class=\"modal-content\">"
                . "            <div class=\"modal-header\">"
                . "                <button type=\"button\" class=\"close\" data-dismiss=\"modal\">&times;</button>"
                . "                <h4 class=\"modal-title\"> <span class=\"glyphicon --glyphicon-alert\"></span> $this->title</h4>"
                . "            </div>"
                . "            <div class=\"modal-body\">"
                . "                <p>$this->message</p>"
                . "            </div>"
                . "            <div class=\"modal-footer\">"
                . "                <button type=\"button\" class=\"btn $button\" data-dismiss=\"modal\">Ok</button>"
                . "            </div>"
                . "        </div>"
                . "    </div>"
                . "</div>";
        
        $output = "$('body').append('$html'); $('#$tmpId').modal('show');";

        if ($this->duration !== -1) {
            $output .= "setTimeout( function(){ $('#$tmpId').modal(\"hide\"); }, $this->duration );";
        }
        echo $output;
    }
    
    function getTitle() {
        return $this->title;
    }

    function getMessage() {
        return $this->message;
    }

    function getType() {
        return $this->type;
    }

    function getDuration() {
        return $this->duration;
    }

    function setTitle($title) {
        $this->title = $title;
    }

    function setMessage($message) {
        $this->message = $message;
    }

    function setType($type) {
        $this->type = $type;
    }

    function setDuration($duration) {
        $this->duration = $duration;
    }

}
