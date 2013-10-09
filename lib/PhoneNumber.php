<?php

class PhoneNumber {

    private $number;

    public function __construct($number) {
        $this->number = $number;
    }

    public function toInternational($country = "IRL") {
        if ($this->number[0] == "+") {
            return;
        }

        switch ($country) {
            default:
            case "IRE":
            case "IRL":
                $this->number = "+353"
                    . substr($this->number, 1, strlen($this->number));
            break;
        }
    }

    public function __toString() {
        return $this->number;
    }

}

/* TESTING
$n = array(
    "0857027121",
    "+353857027121",
    "3530857027121"
);
foreach ($n as $a) {
    $number = new PhoneNumber($a);
    $number->toInternational();
    echo $number;
}
*/

?>
