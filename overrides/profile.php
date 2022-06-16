{% extends "main.html" %}
{% block content %}
<div id="before_user_content"></div>
<script>
    function construct(){
      var body = document.createElement('p');
      var bodyText1 = document.createTextNode("ID:"+window._miners_user.id);
      var bodyText2 = document.createTextNode("Email:"+window._miners_user.email);
      var bodyText3 = document.createTextNode("Name:"+window._miners_user.name);
      body.style.fontSize = ".7rem";
      body.appendChild(bodyText1);
      body.appendChild(bodyText2);
      body.appendChild(bodyText3);

      var div = document.getElementById("before_user_content");
      insertAfter(div, body)
    }
    
    setTimeout(function() {
        construct();
    }, 1000);
  </script>
{% endblock %}