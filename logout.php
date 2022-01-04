<?php
session_start();
session_unset();
session_destroy();
$_SESSION['CID'] = NULL;
$_SESSION['FULLNAME'] = NULL;
$_SESSION['EMAIL'] =  NULL;
unset($_SESSION['CID']);
header('location: http://localhost:8888/18B-Telecom/');