<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>

<h2>Register</h2>

<?php if ($this->session->flashdata('error')): ?>
    <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>

<?php if ($this->session->flashdata('success')): ?>
    <p style="color: green;"><?php echo $this->session->flashdata('success'); ?></p>
<?php endif; ?>

<?php echo validation_errors(); ?>

<form action="<?php echo site_url('auth/register'); ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>">
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>

    <label for="confirm_password">Confirm Password:</label>
    <input type="password" name="confirm_password" id="confirm_password">
    <br>

    <input type="submit" value="Register">
</form>

<a href="<?php echo site_url('auth/login'); ?>">Login</a>

</body>
</html>
