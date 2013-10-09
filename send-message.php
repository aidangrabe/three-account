<?php

set_include_path("lib");

require "classloader.php";
require "functions.php";
require "config.php";

error_reporting(-1);

function debug($txt) {
    echo $txt . "<br />";
}

$to         = trim($_POST['to']);
$message    = trim($_POST['msg']);

// check the password 
if (trim($_POST['pass']) != $CFG->password) die();

$loginForm = new LoginForm($CFG->number, $CFG->pin);
$loginForm->getHiddenFields(Url::LOGIN_FORM);
$loginForm->send(Url::LOGIN);

$message = new MessageForm($to, $message);
$message->getHiddenFields(Url::SEND_MESSAGE_FORM);
$message->send(Url::SEND_MESSAGE);

echo "Done";

?>
