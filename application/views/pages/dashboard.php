<div class="container">
    <h2 class="display-3">Add Recipe</h2>
    

    <!-- Logged Out View -->
    <?php if(!$this->session->userdata('logged_in')) : ?>
    <p >In order to add a recipe you must be logged in. Either log in or register a new account on the link below.</p>
    <a href="<?php echo base_url(); ?>users/register">Register here</a>
    <?php endif; ?>
</div>