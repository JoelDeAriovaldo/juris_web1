<?php

require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$servername = $_ENV['DB_HOST'];
$username = $_ENV['DB_USER'];
$password = $_ENV['DB_PASSWORD'];
$dbname = $_ENV['DB_NAME'];

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
  die("Connection error: " . mysqli_connect_error());
}

$email = $_POST["email"];
$date = date('Y-m-d');

$sql = "INSERT INTO subscribers_juris VALUES ('','$email','$date')";

if (mysqli_query($conn, $sql)) {
  echo "Cadastro efectuado com sucesso!";
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}


mysqli_close($conn);
?>