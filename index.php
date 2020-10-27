<?php
  session_start();

    include ('Templates/template.php');
    $Template = new Template;
    $Template->Header();
?>

<?php
    if((!isset($_SESSION['is_logged_in'])) && ($_SESSION['is_logged_in']!=true))
    {
    echo '    <div class="menu">
          <span class="intro">
              Create: Notes, Reminders, Locations, Images.
          </span>
        </div>';
    } else {
        $Template->Logged();
    }
?>




  <?php
  $Template->Footer();
  ?>