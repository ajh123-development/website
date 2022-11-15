{% extends "main.html" %}

{% block content %}
<div class="md-content" data-md-component="content">
    <article class="md-content__inner md-typeset">
        <div id="before_user_content">
            <p>1234</p>

            <ul class="md-nav__list" data-md-scrollfix>
                {% for nav_item in nav %}
                    {% set path = "__sub_nav_" ~ loop.index %}
                    {% set level = 1 %}
                    {% include "partials/nav-item.html" %}
                {% endfor %}
            </ul>

        </div>
    </article>
</div>
{% endblock %}