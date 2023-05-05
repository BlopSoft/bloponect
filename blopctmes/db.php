<?php
require "libs/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=onect',
    'root', 'root' );
session_start();
?>