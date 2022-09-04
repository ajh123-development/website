{% block title %}
<?php //echo htmlspecialchars( $results['pageTitle'] )?>
{% endblock %}

{% block phplibs %}
<?php 
require_once __DIR__."/../../util.php";
?>
{% endblock %}

{% extends "main.html" %}

{% block extra_styles %}
<!-- Main Stylesheet --->
<link rel="stylesheet" href="/extra.css">
<link rel="stylesheet" type="text/css" href="style.css" />
{% endblock %}

{% block content %}

<div class="md-content\" data-md-component="content">
  <a href="."><h1>News</h1></a>
  `% yield content %`
  <div id="footer">
    News &copy; 2022. All rights reserved. <a href="admin.php">Site Admin</a>
   </div>
</div>

{% endblock %}