<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

<h2>Login</h2>

<?php if ($this->session->flashdata('error')): ?>
    <p style="color: red;"><?php echo $this->session->flashdata('error'); ?></p>
<?php endif; ?>

<?php echo validation_errors(); ?>

<form action="<?php echo site_url('auth/login'); ?>" method="post">
    <label for="username">Username:</label>
    <input type="text" name="username" id="username" value="<?php echo set_value('username'); ?>">
    <br>

    <label for="password">Password:</label>
    <input type="password" name="password" id="password">
    <br>

    <input type="submit" value="Login">
</form>

<a href="<?php echo site_url('auth/register'); ?>">Register</a>

</body>
</html>
