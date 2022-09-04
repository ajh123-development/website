`% extends templates/include/page.php %`
`% block content %`
      <h1 style="width: 75%;"><?php echo htmlspecialchars( $results['article']->title )?></h1>
      <div style="width: 75%; font-style: italic;">By <?php echo htmlspecialchars( $results['article']->author )?></div>
      <div style="width: 75%; font-style: italic;"><?php echo htmlspecialchars( $results['article']->summary )?></div>
      <div style="width: 75%;"><?php echo $results['article']->content?></div>
      <p class="pubDate">Published on <?php echo date('j F Y', $results['article']->publicationDate)?></p>

      <p><a href="./">Return to Homepage</a></p>
`% endblock %`