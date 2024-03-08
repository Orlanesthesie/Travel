<?php
session_start();
require_once '../config/connexion.php';

$uploads = "../assets/images/logo";
$tmp_name = $_FILES['image']['tmp_name'];
$name = $_FILES['image']['name'];
