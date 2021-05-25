<?php
//Sessions
session_start();

$_SESSION['mail'] = trim($_POST['loginMail']);
$_SESSION['password'] = $_POST['loginPassword'];

header('location: dashboard.php');
