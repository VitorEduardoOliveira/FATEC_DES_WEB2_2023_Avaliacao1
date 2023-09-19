<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['username'] !== 'portaria') {
    header('Location: index.php');
    exit;
}
function lerRegistros() {
    $registros = [];
    $arquivo = fopen('alunos.txt', 'r');
    
    if ($arquivo) {
        while (($linha = fgets($arquivo)) !== false) {
            $dados = explode('/', $linha);
            if (count($dados) === 3) {
                $registros[] = ['Nome' => trim($dados[0]), 'RA' => trim($dados[1]), 'Placa' => trim($dados[2])];
            }
        }
        fclose($arquivo);
    }
    
    return $registros;
}

$registros = lerRegistros();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Painel de Controle - Fatec Araras</title>
</head>
<body>
    <h1>Painel de Controle</h1>
    <p>Bem-vindo, <?php echo $_SESSION['username']; ?>!</p>
    
    <h2>Registros de Alunos</h2>
    <table>
        <tr>
            <th>Nome</th>
            <th>R.A.</th>
            <th>Placa</th>
        </tr>
        <?php foreach ($registros as $registro): ?>
            <tr>
                <td><?php echo $registro['Nome']; ?></td>
                <td><?php echo $registro['RA']; ?></td>
                <td><?php echo $registro['Placa']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    
    <br>
    <a href="logout.php">Sair</a>
    <br><br>
    <a href="cadastro.php">Cadastrar Aluno</a>
</body>
</html>
