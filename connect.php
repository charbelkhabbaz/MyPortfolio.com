<?php
$Name = $_POST['Name'];
$Email = $_POST['Email'];
$Number = $_POST['Number'];
$Subject = $_POST['Subject'];
$Message = $_POST['Message'];

$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "myform";

$conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
if (mysqli_connect_error()) {
    die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
} else {
    $stmt = $conn->prepare("INSERT INTO mycontacts (Name, Email, Number, Subject, Message) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die('Prepare Error: ' . $conn->error);
    }
    $stmt->bind_param("ssiss", $Name, $Email, $Number, $Subject, $Message);
    if ($stmt->execute()) {
        echo "Message sent successfully";
    } else {
        echo "An error occurred. Please try again. " . $stmt->error;
    }
    $stmt->close();
}
$conn->close();
?>



