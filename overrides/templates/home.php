{% extends "main.html" %}

<!-- Render home under tabs -->
{% block tabs %}
  {{ super() }}

  <!-- Additional styles for landing page -->
  <style>

    /* Application header should be static for the landing page */
    .md-header {
      position: initial;
    }

    /* Remove spacing, as we cannot hide it completely */
    .md-main__inner {
      margin: 0;
    }

    /* Hide main content for now */
    /* .md-content {
      display: none;
    } */

    /* Hide table of contents */
    @media screen and (min-width: 60em) {
      .md-sidebar--secondary {
        display: none;
      }
    }

    /* Hide navigation */
    @media screen and (min-width: 76.25em) {
      .md-sidebar--primary {
        display: none;
      }
    }
  </style>

  <!-- Landing page -->
  <section class="mdx-container">
    <div class="md-grid md-typeset">
      <div class="mdx-home">

        <!-- Image -->
        <div class="mdx-home__image">
          <img
            src="assets/images/background.png"
            alt=""
            width="1659"
            height="200"
            draggable="false"
          >
        </div>

        <br>

        <!-- Content -->
        <div class="mdx-home__content">
          <h1>Miners Online</h1>
          <p>{{ config.site_description }}</p>
          <a
            href="{{ page.next_page.url | url }}"
            title="{{ page.next_page.title | e }}"
            class="md-button md-button--primary"
          >
            View Docs
          </a>
          <a
            href="{{ 'news/' | url }}"
            title="Miners Online News"
            class="md-button md-button--primary"
          >
            News
          </a>
        </div>
      </div>
    </div>
  </section>
{% endblock %}

<!-- Content -->
{% block content %}
<h1>About Us</h1>
<p>Want to kown what we do? View the <a href="/About">next page</a>.</p>
<p>For more information please see our news and events <a href="/news">here</a>.</p>
<p>To driectly communicate with us, join the <a href="https://discord.gg/ybWqDAkDES">discord</a>. Our response will be slow, but it will not be never!</p>
{% endblock %}