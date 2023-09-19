<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'portaria') {
    header('Location: index.php');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $ra = $_POST['ra'];
    $placa = $_POST['placa'];

    if (!empty($nome) && !empty($ra) && !empty($placa)) {
        $registro = $nome . '/' . $ra . '/' . $placa . "\n";
        file_put_contents('alunos.txt', $registro, FILE_APPEND);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Alunos - Fatec Araras</title>
</head>
<body>
    <h1>Cadastro de Alunos</h1>
    <form method="post" action="cadastro.php">
        <label for="nome">Nome Completo:</label>
        <input type="text" id="nome" name="nome" required><br><br>
        <label for="ra">Registro Acadêmico (R.A.):</label>
        <input type="text" id="ra" name="ra" required><br><br>
        <label for="placa">Placa do Carro ou Moto:</label>
        <input type="text" id="placa" name="placa" required><br><br>
        <input type="submit" value="Cadastrar">
    </form>
    <br>
    <a href="dashboard.php">Voltar para o Painel de Controle</a>
</body>
</html>
