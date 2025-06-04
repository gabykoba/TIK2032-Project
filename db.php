<?php
$conn = new mysqli("localhost", "root", "", "portofolio");

if ($conn->connect_error) {
  die("Koneksi gagal: " . $conn->connect_error);
}
?>
