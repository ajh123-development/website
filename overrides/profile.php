<?php
include_once($_SERVER['DOCUMENT_ROOT']."/util.php");
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: login.php');
	exit;
}
$DATABASE_HOST = '127.0.0.1';
$DATABASE_USER = 'mjolnir';
$DATABASE_PASS = 'RI0Yjnc5trf3l(U0';
$DATABASE_NAME = 'mjolnir';
$DATABASE_PREFIX = 'users_';
$con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
if (mysqli_connect_errno()) {
	exit('Failed to connect to MySQL: ' . mysqli_connect_error());
}
// We don't have the password or email info stored in sessions so instead we can get the results from the database.
$stmt = $con->prepare('SELECT id, username, playerName FROM '.$DATABASE_PREFIX.'accounts WHERE id = ?');
// In this case we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['id']);
$stmt->execute();
$stmt->bind_result($id, $email, $name);
$stmt->fetch();
$stmt->close();
?>

{% extends "main.html" %}
{% block content %}
<div class="md-content" data-md-component="content">
    <article class="md-content__inner md-typeset">
        
    <div id="before_user_content">
    <p>Your account details are below:</p>
    <table>
        <tr>
        <td>ID:</td>
        <td><?=$id?></td>
        </tr>
        <tr>
        <td>Email:</td>
        <td><?=$email?></td>
        </tr>
        <tr>
        <td>PlayerName:</td>
        <td><?=$name?></td>
        </tr>
    </table>
    </div>

    </article>
</div>
{% endblock %}