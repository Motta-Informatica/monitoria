<?php
if (isset($_POST['submit'])) {
    $nome = $_POST['nome'];
    $senha = $_POST['senha'];
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "monitoria";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO login (nome, senha) VALUES ('$nome', '$senha')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('cadastrado com sucesso!!')</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <title>usuario</title>
</head>

<body>
    <form action="" method="post" class="container">
        <div>
            <label for="noem" class="form-label h4">Nome:</label>
            <input type="text" name="nome" id="nome" class="form-control">
        </div>
        <div>
            <label for="senha" class="form-label h4">senha:</label>
            <input type="text" name="senha" id="senha" class="form-control">
        </div>
        <div class="d-flex justify-content-center mt-5">
            <button type="submit" name="submit" class="btn btn-outline-primary w-50">Cadastrar</button>
        </div>
    </form>
</body>

</html>