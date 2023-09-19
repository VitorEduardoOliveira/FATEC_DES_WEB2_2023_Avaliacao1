<?php
session_start();

if (isset($_SESSION['username']) && $_SESSION['username'] === 'portaria') {
    header('Location: dashboard.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'portaria' && $password === 'FatecAraras') {
        $_SESSION['username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $loginError = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Fatec Araras</title>
</head>
<body>
    <h1>Login</h1>
    <?php if (isset($loginError) && $loginError): ?>
        <p>Erro: Credenciais inválidas!</p>
    <?php endif; ?>
    <form method="post" action="index.php">
        <label for="username">Login:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Senha:</label>
        <input type="password" id="password" name="password" required><br><br>
        <input type="submit" value="Entrar">
    </form>
</body>
</html>