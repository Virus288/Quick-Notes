<?php
  session_start();

    include ('Templates/template.php');
    $Template = new Template;
    $Template->Header();
?>

<?php
    if((isset($_SESSION['is_logged_in'])) && ($_SESSION['is_logged_in']==true))
    {

    }
?>

<body>
      <div class="menu">
          <span class="intro">
              Create: Notes, Reminders, Locations, Images.
          </span>
      </div>

<script>

    <?php
    echo 'let username = \''.$_SESSION["username"].'\' ';
    ?>

    document.addEventListener('DOMContentLoaded', () => {
        getNotes(username);
    }, false);
</script>

  <?php
  $Template->Footer();
  ?>