<?php require_once __DIR__."/util.php";
session_destroy();
header('Location: /api/auth/logout.php');