<?php
// Array de usuários (normalmente isso seria armazenado em um banco de dados)
$users = [
    'user1' => 'password1',
    'user2' => 'password2',
    'user3' => 'password3'
];

// Mensagem de erro ou sucesso
$message = '';

// Verificar se os dados foram enviados
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $inputUsername = $_POST['username'];
    $inputPassword = $_POST['password'];

    // Verificar se o usuário existe e a senha está correta
    if (array_key_exists($inputUsername, $users) && $users[$inputUsername] === $inputPassword) {
        $message = 'Login bem-sucedido!';
        // Aqui você pode redirecionar o usuário ou iniciar uma sessão
        header('Location: http://10.129.1.25:7003');
        exit();
    } else {
        $message = 'Usuário ou senha incorretos.';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <h2>Login</h2>
    <form action="index.php" method="post">
        <label for="username">Usuário:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    </form>
    <?php if ($message): ?>
        <p id="message"><?php echo htmlspecialchars($message); ?></p>
    <?php endif; ?>
    <p>Não tem uma conta? <a href="register.php">Registrar</a></p>
</body>
</html>
