<?php
include "libs/load.php";
if (Session::isauthenticated()) {
    header("Location: /");
    die();
} else {
    Session::renderpage();
}
//echo __DIR__;
