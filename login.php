<?php

session_start();

if((isset($_SESSION['is_logged_in'])) && ($_SESSION['is_logged_in']==true))
{
    header('Location: /');
    exit();
}

require_once('Controllers/php/login.php');

$errors = [];

if(isset($_POST['submit'])){
    $login = new UserLogin($_POST);
    $errors = $login->Login();
}

include ('Templates/template.php');
$Template = new Template;
$Template->Header();
?>

<div class="new-user">
    <h2>Login</h2>

    <div class="error">
        <?php echo $errors['db'] ?? '' ?>
    </div>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">
        <label>Username: </label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?>">
        <div class="error">
            <?php echo $errors['username'] ?? '' ?>
        </div>

        <label>Password: </label>
        <input type="password" name="password" value="">
        <div class="error">
            <?php echo $errors['password'] ?? '' ?>
        </div>

        <input type="submit" value="submit" name="submit" >
    </form>
</div>

<?php
$Template->Footer();
?>