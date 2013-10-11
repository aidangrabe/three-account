<?php

class MessageForm extends Form {
    
    public function __construct($to, $message) {
        parent::__construct(Url::SEND_MESSAGE_FORM);
        $to = new PhoneNumber($to);
        $to->toInternational();

        $this->hiddenFields = array(
            "data[_Token][key]", "data[_Token][fields]"
        );
        $this->fields = array(
            "_method" => "POST",
            "data[Message][message]" => $message,
            "data[Message][recipients_individual]" => $to,
            "data[Message][recipients_contacts]" => "",
            "data[_Token][unlocked]" => ""
        );
    }

    public function getRemainingMessages() {
        $html = $this->getFormHtml();
        //
    }

    public function send($url) {
        curl($url, $this->fields);
    }

}

?>
