<?php

if(isset($_POST['submit']))
{
    if(empty($_POST['email']))
    {
        echo "Email is required <br/>";
    }
    else
    {
        $email = $_POST['email'];
    }

    if(empty($_POST['title']))
    {
        echo "Title is required <br/>";
    }
    else
    {
        $title = $_POST['title'];
    }

    if(empty($_POST['ingredients']))
    {
        echo "Ingredients are required <br/>";
    }
    else
    {
        $ingredients = $_POST['ingredients'];
    }
}

?>

<?php
require 'templates/header.php'; ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <label for="">Your email</label>
        <input type="text" name="email"/>
        <label for="">Pizza Title</label>
        <input type="text" name="title"/>
        <label for="">Ingredients</label>
        <input type="text" name="ingredients"/>
        <div class="center">
            <input type="submit" name="submit" value="Submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php
require 'templates/footer.php'; ?>