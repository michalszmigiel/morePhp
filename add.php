<?php

$title = $email = $ingredients = "";

$errors = [
        'email'=>'',
        'title'=>'',
        'ingredients'=>''
];

if(isset($_POST['submit']))
{
    if(empty($_POST['email']))
    {
        $errors['email'] = "Email is required <br/>";
    }
    else
    {
        $email = $_POST['email'];
        if(!filter_var($email, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = "Email must be a valid email address.";
        }
    }

    if(empty($_POST['title']))
    {
        $errors['title'] = "Title is required <br/>";
    }
    else
    {
        $title = $_POST['title'];
        if(!preg_match('/^[a-zA-Z\s]+$/', $title))
        {
            $errors['title'] = "Title must be letters and spaces only.";
        }
    }

    if(empty($_POST['ingredients']))
    {
        $errors['ingredients'] = "Ingredients are required <br/>";
    }
    else
    {
        $ingredients = $_POST['ingredients'];
        if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients))
        {
            $errors['ingredients'] = "Ingredients must be a comma separated list.";
        }
    }

    if(array_filter($errors))
    {
        //
    }
    else {
        header('Location: index.php');
    }

}
?>

<?php
require 'templates/header.php'; ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <label for="">Your email</label>
        <input type="text" name="email" value="<?= htmlspecialchars($email);?>"/>
        <div class="red-text">
            <?= $errors['email'];?>
        </div>
        <label for="">Pizza Title</label>
        <input type="text" name="title" value="<?= htmlspecialchars($title);?>"/>
        <div class="red-text">
            <?= $errors['title'];?>
        </div>
        <label for="">Ingredients</label>
        <input type="text" name="ingredients" value="<?= htmlspecialchars($ingredients);?>"/>
        <div class="red-text">
            <?= $errors['ingredients'];?>
        </div>
        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php
require 'templates/footer.php'; ?>