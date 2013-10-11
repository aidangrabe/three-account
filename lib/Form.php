<?php

class Form {

    protected $hiddenFields;
    private $html;
    protected $fields;
    protected $url;

    public function __construct($url) {
        $this->html = "";
        $this->url = $url;
    }

    public function getFormHtml() {
        if ($this->html == "") {
            $this->html = str_get_html(curl($this->url));
        }
        return $this->html;
    }
    
    public function getHiddenFields() {
        $html = $this->getFormHtml();
        foreach ($html->find('input') as $input) {
            $fieldName = (string) $input->name;
            if (in_array($fieldName, $this->hiddenFields)) {
                $this->fields[$fieldName] = $input->value;
            }
        }
    }

}

?>
