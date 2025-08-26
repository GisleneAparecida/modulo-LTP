<?php
require "db.php";
$pdo = getPDO();
$users = $pdo->query("SELECT * FROM users ORDER BY id DESC")->fetchAll();
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <title>CRUD Simples - Usuários</title>
</head>

<body>
    <h2>Usuários</h2>
    <p><a href="create.php">+ Novo Usuário</a></p>
    <table border="1" cellpadding="5" cellspacing="0">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>sobrenome</th>
            <th>Email</th>
            <th>endereco</th>
            <th>telefone</th>
            <th>ações
        </tr>
        </th>

        <?php foreach ($users as $u): ?>
        <tr>
            <td><?= (int)$u['id'] ?></td>
            <td><?= htmlspecialchars($u['name']) ?></td>
            <td><?= htmlspecialchars($u['sobrenome']) ?></td>
            <td><?= htmlspecialchars($u['email']) ?></td>
            <td><?= htmlspecialchars($u['endereco']) ?></td>
            <td><?= htmlspecialchars($u['telefone']) ?></td>
            <td>
                <a href="edit.php?id=<?= (int)$u['id'] ?>">Editar</a> |
                <a href="delete.php?id=<?= (int)$u['id'] ?>"
                    onclick="return confirm('Excluir este usuário?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>

</html>