`% extends templates/include/page.php %`
`% block content %`
      <div id="adminHeader">
        <h2>News Admin</h2>
        <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
      </div>

      <h1><?php echo $results['pageTitle']?></h1>

      <form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
        <input type="hidden" name="appId" value="<?php echo $results['app']->id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

        <ul>

          <li>
            <label for="name">App Name</label>
            <input type="text" name="name" id="name" placeholder="Name of the app" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['app']->name )?>" />
          </li>

          <li>
            <label for="version">App version</label>
            <input type="text" name="version" id="version" placeholder="Version of the app" required autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['app']->version )?>" />
          </li>

          <li>
            <label for="type">App Type</label>
            <input type="text" name="type" id="type" placeholder="The type of app we are" autofocus maxlength="255" value="<?php echo htmlspecialchars( $results['app']->type )?>" />
          </li>

          <li>
            <label for="dateTime">App release time</label>
            <textarea name="dateTime" id="dateTime" placeholder="An ISO formated timestamp" required maxlength="1000" style="height: 5em;"><?php echo htmlspecialchars( $results['app']->dateTime )?></textarea>
          </li>

          <li>
            <label for="rawJson">JSON source</label>
            <textarea name="rawJson" id="rawJson" placeholder="The json that defines the app" required maxlength="100000" style="height: 30em;"><?php echo htmlspecialchars( $results['app']->rawJson )?></textarea>
          </li>


        </ul>

        <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
        </div>

      </form>

<?php if ( $results['app']->id ) { ?>
      <p><a href="admin.php?action=deleteApp&amp;appId=<?php echo $results['app']->id ?>" onclick="return confirm('Delete This App?')">Delete This App</a></p>
<?php } ?>
`% endblock %`