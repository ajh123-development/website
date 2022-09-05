`% extends templates/include/page.php %`
`% block content %`
      <h1>All Apps</h1>
      <p><a href="admin.php">List Articles</a></p>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>


<?php if ( isset( $results['statusMessage'] ) ) { ?>
        <div class="statusMessage"><?php echo $results['statusMessage'] ?></div>
<?php } ?>

      <table>
        <tr>
          <th>Name</th>
          <th>Version</th>
        </tr>

<?php foreach ( $results['apps'] as $app ) { ?>

        <tr onclick="location='admin.php?action=editApp&amp;appId=<?php echo $app->id?>'">
          <td><?php echo $app->name?></td>
          <td><?php echo $app->version?></td>
        </tr>

<?php } ?>

      </table>

      <p><?php echo $results['totalRows']?> app<?php echo ( $results['totalRows'] != 1 ) ? 's' : '' ?> in total.</p>

      <p><a href="admin.php?action=newApp">Add a New App</a></p>
`% endblock %`