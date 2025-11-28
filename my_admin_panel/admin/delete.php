<?php
require '../includes/auth.php';
require '../includes/db.php';


$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM posts WHERE id = ?");
$stmt->execute([$id]);
header('Location: posts.php');
exit;
