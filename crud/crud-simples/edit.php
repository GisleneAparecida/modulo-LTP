<?php
require "db.php";
$pdo = getPDO();

$id = $_GET["id"] ?? 0;
$stmt = $pdo->prepare("SELECT * FROM users WHERE id=?");
$stmt->execute([$id]);
$user = $stmt->fetch();

if (!$user) {
    exit("Usuário não encontrado.");
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name  = $_POST["name"] ?? "";
    $sobrenome = $_POST["sobrenome"] ?? ""; 
    $email = $_POST["email"] ?? "";
    $endereco = $_POST["endereco"] ?? "";
    $telefone = $_POST["telefone"] ?? "";
    $stmt = $pdo->prepare("UPDATE users SET name=?, sobrenome=?, email=?, endereco=?, telefone=? WHERE id=?");
    $stmt->execute([$name, $sobrenome, $email, $endereco, $telefone, $id]);
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>Editar Usuário</title>
</head>

<body>
    <h2>Editar Usuário #<?= (int)$user["id"] ?></h2>
    <form method="post">
        <div>Nome: <input type="text" name="name" value="<?= htmlspecialchars($user["name"]) ?>" required></div>
        <div>sobrenome: <input type="text" name="sobrenome" value="<?= htmlspecialchars($user["sobrenome"]) ?>"
                required></div>
        <div>Email: <input type="email" name="email" value="<?= htmlspecialchars($user["email"]) ?>" required></div>
        <div>endereco: <input type="text" name="endereco" value="<?= htmlspecialchars($user["endereco"]) ?>" require d>
        </div>
        <div>telefone: <input type="text" name="tel" value="<?= htmlspecialchars($user["telefone"]) ?>" required></div>
        <button type="submit">Atualizar</button>
    </form>
    <p><a href="index.php">Voltar</a></p>
</body>

</html>