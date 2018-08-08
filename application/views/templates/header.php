<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="Nicklas Ockelberg" content="Seminar 3">
        <meta name="viewport" content="width-device-width, initial-scale=1.0">
        <link rel="icon" href="<?php echo asset_url();?>images/Favicon.ico">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo asset_url();?>css/stylesheet.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <style>
            <?php if($status['status'] == 1):?> 
            .status-message select{
                background-color: #4CAF50;
                color: white;
            }
            .status-message select:focus{
                background-color: #4CAF50;
                color: white;
            }
            <?php elseif($status['status'] == 2):?> 
            .status-message select{
                background-color: #dc3545;
                color: white;
            }
            .status-message select:focus{
                background-color: #dc3545;
                color: white;
            }

            <?php endif ?>

        </style>
        <?php $this->session->set_userdata('last_page', current_url()); ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?php echo base_url(); ?>home">PubRecipes</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>home">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="<?php echo base_url(); ?>dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <?php if(!$this->session->userdata('logged_in')) : ?>
                        <a class = "nav-link" href="<?php echo base_url(); ?>users/register">Register</a>
                        <?php endif ?>
                    </li>
                </ul>
                <?php if($this->session->userdata('logged_in')) : ?>
                <?php echo form_open('Users/changeStatus'); ?> 
                <div class="status-message">
                    <select onchange="this.form.submit()" name = "status" class="form-control" required id="status-select">
                        <option selected="selected" disabled="disabled"><?php echo ucwords($this->session->userdata('username'));?></option>
                        <option value="0">Away</option>
                        <option value="1">Available</option>
                        <option value="2">Unavailable</option>
                    </select>
                </div>
                <?php echo form_close(); ?>

                <a href="<?php echo base_url(); ?>users/logout" style="float:right;" id="logoutbtn">Log out</a> 
                <?php endif ?>
                <?php if(!$this->session->userdata('logged_in')) : ?>
                <button id="loginbtn" onclick="document.getElementById('id01').style.display='block'" style="width:auto;">Log in</button>
                <?php endif ?>
            </div>
        </nav>
        <div id="id01" class="modal">
            <form class="modal-content animate" action="<?php echo base_url(); ?>users/login" method="post">
                <div class="form-group">
                    <label>Username:<sup>*</sup></label>
                    <input type="text" name="username"class="form-control" value="" autofocus required>
                </div>
                <div class="form-group">
                    <label>Password:<sup>*</sup></label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="Submit">
                </div>
                <p>Don't have an account? <a href="<?php echo base_url(); ?>users/register">Sign up now</a>.</p>
                <div class="container">
                    <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                </div>
            </form>
        </div>
        <?php if($this->session->flashdata('login_failed')):?>
        <?php echo '<p class="fail">'.$this->session->flashdata('login_failed').'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('user_registered')):?>
        <?php echo '<p class="success">'.$this->session->flashdata('user_registered').'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('user_loggedout')):?>
        <?php echo '<p class="success">'.$this->session->flashdata('user_loggedout').'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('message_added')):?>
        <?php echo '<p class="success">'.$this->session->flashdata('message_added').'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('message_error')):?>
        <?php echo '<p class="fail">'.$this->session->flashdata('message_error').'</p>'; ?>
        <?php endif; ?>
        <?php if($this->session->flashdata('user_loggedin')):?>
        <?php echo '<p class="success">'.$this->session->flashdata('user_loggedin').'</p>'; ?>
        <?php endif; ?>
