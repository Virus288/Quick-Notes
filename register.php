<?php

session_start();

if((isset($_SESSION['is_logged_in'])) && ($_SESSION['is_logged_in']==true))
{
    header('Location: /');
    exit();
}

require_once('Controllers/php/user_validator.php');

$errors = [];

if(isset($_POST['submit'])){
    $validation = new UserValidator($_POST);
    $errors = $validation->validateForm();
}

include ('Templates/template.php');
$Template = new Template;
$Template->Header();
?>

<div class="new-user">
    <h2>Create a new user</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="POST">

        <label>Username: </label>
        <input type="text" name="username" value="<?php echo htmlspecialchars($_POST['username']) ?? '' ?>">
        <div class="error">
            <?php echo $errors['username'] ?? '' ?>
        </div>

        <label>Email: </label>
        <input type="text" name="email" value="<?php echo htmlspecialchars($_POST['email']) ?? '' ?>">
        <div class="error">
            <?php echo $errors['email'] ?? '' ?>
        </div>

        <label>Password: </label>
        <input type="password" name="password" value="">
        <div class="error">
            <?php echo $errors['password'] ?? '' ?>
        </div>

        <label>Repeat password: </label>
        <input type="password" name="password2" value="">
        <div class="error">
            <?php echo $errors['password2'] ?? '' ?>
        </div>

        <input type="submit" value="submit" name="submit" >

    </form>
</div>

<?php
$Template->Footer();
?>