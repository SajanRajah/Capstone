<?php
spl_autoload_register(function ($class_name) {
    include $_SERVER['DOCUMENT_ROOT'] . "/students/SG0318A17/M5Project/CommunityPortal/" .$class_name . '.php';
});
?>