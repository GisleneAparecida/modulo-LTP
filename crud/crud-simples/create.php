<?php
require "db.php";
$pdo = getPDO();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = $_POST["name"] ?? "";
    $sobrenome  = $_POST["sobrenome"] ?? "";
    $email = $_POST["email"] ?? "";
    $endereco  = $_POST["endereco"] ?? "";
    $telefone  = $_POST["telefone"] ?? "";
    $stmt = $pdo->prepare("INSERT INTO users (name,sobrenome,email,endereco,telefone) VALUES (?,?,?,?,?)");
    $stmt->execute([$name, $sobrenome, $email, $endereco, $telefone]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Novo Usuário</title>
</head>

<body>
    <h2>Novo Usuário</h2>
    <form method="post">
        <div>Nome: <input type="text" name="name" required></div>
        <div>sobrenome: <input type="text" name="sobrenome" required></div>
        <div>Email: <input type="email" name="email" required></div>
        <div>endereco: <input type="text" name="endereco" required></div>
        <div>telefone: <input type="text" name="telefone" required></div>
        <button type=" submit">Salvar</button>
    </form>
    <p><a href="index.php">Voltar</a></p>
</body>

</html>