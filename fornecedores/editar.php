<?php

// Pegando da url o valor do parêmtro chamado id
$id = $_GET['id'];

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Fornecedor</title>
    <link rel="stylesheet" href="../css/estilos.css">
</head>
<body>
    
    <h1>Editar fornecedor</h1>

    <form action="" method="post">

        <div>
            <label for="nome">Nome:</label>
            <input type="text" name="nome" id="nome" required>
        </div>
        <button type="submit">Atualizar</button>

    </form>

    <a href="listar.php">← Voltar</a>

</body>
</html>