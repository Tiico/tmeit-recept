<?php echo validation_errors(); ?>
<div class="wrapper">
    <h2><?= $title; ?></h2>
    <p>Please fill this form to create an account.</p><br>
    <?php echo form_open('users/register') ?>
    <div>
        <input id="uname" type="text" name="username" placeholder="Enter Username" autofocus>
    </div>
    <div>
        <input type="password" name="password" placeholder="Enter Password">
    </div>
    <div>
        <input type="password" name="password2"  placeholder="Repeat Password">
    </div>
    <div>
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </div>
    <?php echo form_close(); ?>
    <p>Already registered? <button id="loginbtn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log in</button></p>
</div>
