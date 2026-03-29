<?php
session_start();

// Protect page (must login first)
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}

include './config/conn.php';

// Insert data
if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students (name, phone, course) 
            VALUES ('$name', '$phone', '$course')";

    $conn->query($sql);
}

// Fetch data
$result = $conn->query("SELECT * FROM students");
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

    <h2>Welcome, <?php echo $_SESSION['user']; ?></h2>

    <a href="./index.php" style="float:right;">Logout</a>

    <h2>Student Registration</h2>

    <form method="POST" onsubmit="return validateForm()">
        <input type="text" name="name" id="name" placeholder="Full Name">
        <input type="text" name="phone" id="phone" placeholder="Phone Number">
        <input type="text" name="course" id="course" placeholder="Course">
        <button type="submit" name="submit">Register</button>
    </form>

    <h3>Registered Students</h3>

    <table>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Course</th>
        </tr>

        <?php while($row = $result->fetch_assoc()) { ?>
        <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['course']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<script src="./js/script.js"></script>
</body>
</html>