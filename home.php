<?php
// connecting
require_once 'dbconnect.php';

// sessions
session_start();

// verification
if(!isset($_SESSION['logged'])):
    header ('location: index.php');
endif;

//data
$id = $_SESSION['id_user'];
$sql = "SELECT * FROM user WHERE id = '$id'";
$result = mysqli_query($connect, $sql);
$data = mysqli_fetch_array($result);
mysqli_close($connect);
?>

<html>
<head>
    <title>Restricted Page</title>
    <meta charset="utf-8">

</head>
<body>
    <h1>Olá <?php echo $data['name']?></h1>
    <a href="logout.php">Log Out</a>
</body>
</html>