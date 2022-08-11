<?php
include_once($_SERVER['DOCUMENT_ROOT']."/util.php");
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: /api/auth/login.php');
	exit;
}
?>

{% extends "main.html" %}

{% block scripts %}
<script>
    import * as oauth2 from '@panva/oauth4webapi'
    
</script>
{% endblock %}

{% block styles %}
<!-- Skin Viewer Stylesheet --->
<link rel="stylesheet" href="/skinviewer.css">
{% endblock %}

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

            <style>
                #skin-viewer *{ background-image: url('skin_modern.png'); }
            </style>
            <div id="skin-viewer" class="mc-skin-viewer-11x legacy legacy-cape spin">
                <div class="player">
                    <!-- Head -->
                    <div class="head" >
                        <div class="top"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="right"></div>
                        <div class="back"></div>
                        <div class="bottom"></div>
                        <div class="accessory">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                        </div>
                    </div>
                    <!-- Body -->
                    <div class="body">
                        <div class="top"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="right"></div>
                        <div class="back"></div>
                        <div class="bottom"></div>
                        <div class="accessory">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                        </div>
                    </div>
                    <!-- Left Arm -->
                    <div class="left-arm">
                        <div class="top"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="right"></div>
                        <div class="back"></div>
                        <div class="bottom"></div>
                        <div class="accessory">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                        </div>
                    </div>
                    <!-- Right Arm -->
                    <div class="right-arm">
                        <div class="top"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="right"></div>
                        <div class="back"></div>
                        <div class="bottom"></div>
                        <div class="accessory">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                        </div>
                    </div>
                    <!-- Left Leg -->
                    <div class="left-leg">
                        <div class="top"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="right"></div>
                        <div class="back"></div>
                        <div class="bottom"></div>
                        <div class="accessory">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                        </div>
                    </div>
                    <!-- Right Leg -->
                    <div class="right-leg">
                        <div class="top"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="right"></div>
                        <div class="back"></div>
                        <div class="bottom"></div>
                        <div class="accessory">
                            <div class="top"></div>
                            <div class="left"></div>
                            <div class="front"></div>
                            <div class="right"></div>
                            <div class="back"></div>
                            <div class="bottom"></div>
                        </div>
                    </div>
                    <!-- Cape -->
                    <div class="cape">
                        <div class="top"></div>
                        <div class="left"></div>
                        <div class="front"></div>
                        <div class="right"></div>
                        <div class="back"></div>
                        <div class="bottom"></div>
                    </div>
                </div>
            </div>
        </div>
    </article>
</div>
{% endblock %}