<?php
require "db.php";
$pdo = getPDO();
$id = $_GET["id"] ?? 0;
$stmt = $pdo->prepare("DELETE FROM users WHERE id=?");
$stmt->execute([$id]);
header("Location: index.php");
exit;
