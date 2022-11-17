{% extends "main.html" %}

{% block phplibs %}<?php require_once __DIR__."/../../util.php";?>{% endblock %}

{% block extra_styles %}
<!-- Main Stylesheet --->
<link rel="stylesheet" type="text/css" href="/assets/stylesheets/news.css" />
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