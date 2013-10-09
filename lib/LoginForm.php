<?php

class LoginForm extends Form {
    
    public function __construct($mobileNumber, $pinNumber) {
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

    //public function getHiddenFields($url) {
    //    $this->fields = parent::getHiddenFields($url, $this->hiddenFields);
    //    //$loginPageContent = curl($url);

    //    //$html = str_get_html($loginPageContent);
    //    //foreach ($html->find('input') as $input) {
    //    //    $fieldName = (string) $input->name;
    //    //    if (in_array($fieldName, $this->hiddenFields)) {
    //    //        $this->fields[$fieldName] = $input->value;
    //    //    }
    //    //}
    //}

    public function send($url) {
        curl($url, $this->fields);
    }

}

?>
