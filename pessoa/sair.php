<?php
session_start();

if (count($_SESSION) > 0) {
    session_unset();
    session_destroy();
}
header("location:index.php");