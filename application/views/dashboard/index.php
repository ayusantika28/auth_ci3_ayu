<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome to the Dashboard</h2>

<p>Hello, <?php echo $this->session->userdata('username'); ?>!</p>

<a href="<?php echo site_url('auth/logout'); ?>">Logout</a>

</body>
</html>
