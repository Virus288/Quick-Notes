<?php

session_start();

$data = [];

require_once('Controllers/php/add_note.php');

if(isset($_POST['submit'])){
    $notes = new Notes($_POST);
    $data = $notes->AddNote();
}

include ('Templates/template.php');
$Template = new Template;
$Template->Header();
?>

<div class="new-user">
    <?php
    echo $data['result'];
    ?>
    <h2>Create a new note</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <label>Title: </label>
        <input type="text" name="title" value="">

        <label>Data: </label>
        <input type="text" name="data" value="">

        <input type="submit" value="submit" name="submit" >
    </form>
</div>

<?php
$Template->Footer();
?>