<?php
require "libs/rb-mysql.php";
R::setup( 'mysql:host=localhost;dbname=onect',
    'user', 'password' );
session_start();
?>