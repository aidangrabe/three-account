<?php

class LoginForm extends Form {
    
    public function __construct($mobileNumber, $pinNumber) {
        parent::__construct(Url::LOGIN_FORM);
        $this->hiddenFields = array(
            "data[_Token][key]", "data[_Token][fields]"
        );
        $this->fields = array(
            "_method"                   => "POST",
            "data[User][telephoneNo]"   => $mobileNumber,
            "data[User][pin]"           => $pinNumber,
            "data[_Token][unlocked]"    => ""
        );
    }

    public function send($url) {
        curl($url, $this->fields);
    }

}

?>
