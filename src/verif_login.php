<?php
session_start();

if(isset($_POST['email'])):
var_dump($_POST['email']);
die;
endif;
