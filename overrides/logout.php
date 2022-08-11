<?php
session_start();
setcookie(session_name(), '', time()-7000000, '/');
session_destroy();
session_write_close();
$_SESSION = [];
header('Location: /api/auth/login.php');