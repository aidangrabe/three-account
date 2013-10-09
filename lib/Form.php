<?php

class Form {

    protected $hiddenFields;
    protected $fields;
    
    public function getHiddenFields($url) {
        $html = str_get_html(curl($url));
        foreach ($html->find('input') as $input) {
            $fieldName = (string) $input->name;
            if (in_array($fieldName, $this->hiddenFields)) {
                $this->fields[$fieldName] = $input->value;
            }
        }
    }

}

?>
