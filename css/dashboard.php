<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

<div class="container">
    <img src="./images/logo.webp" class="logo">

    <h2>Welcome, <?php echo $_SESSION['user']; ?>!</h2>

    <p>You are successfully logged in.</p>

    <a href="logout.php">Logout</a>
</div>

</body>
</html>