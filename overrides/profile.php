<?php require_once __DIR__."/util.php";
// If the user is not logged in redirect to the login page...
if (getMyId() === false) {
	header('Location: /api/auth/authorize.php?response_type=code&client_id=minersonline&state=xyz');
	exit;
}
?>

{% extends "main.html" %}

{% block extra_styles %}
<!-- Skin Viewer Stylesheet --->
<link rel="stylesheet" href="/skinviewer.css">
<!-- Main Stylesheet --->
<link rel="stylesheet" href="/extra.css">
{% endblock %}


{% block content %}
<?php 
$myid = getMyId();
$id = json_decode($myid, true)["id"];
$user = json_decode(getUser($id), true);
?>
<div class="md-content" data-md-component="content">
    <article class="md-content__inner md-typeset">
        <div id="before_user_content">
            <div class="columns">
                <div class="column">
                <p>Your account details are below:</p>
                <table>
                    <tr>
                    <td>ID:</td>
                    <td><?=$id?></td>
                    </tr>
                    <tr>
                    <td>Email:</td>
                    <td><?=$user["email"]?></td>
                    </tr>
                    <tr>
                    <td>PlayerName:</td>
                    <td><?=$user["name"]?></td>
                    </tr>
                </table>
                <?= var_dump(json_decode(getPerms(),true)["permissions"]); ?>
                </div>
                <div class="column">
                    <style>
                        #skin-viewer *{ background-image: url('https://minersonline.ddns.net/api/images/skin/<?=$user["player"]["skinUrl"]?>'); }
                        #skin-viewer .cape{ background-image: url('https://minersonline.ddns.net/api/images/cape/<?=$user["player"]["capeUrl"]?>'); }
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
            </div>
        </div>
    </article>
</div>
{% endblock %}