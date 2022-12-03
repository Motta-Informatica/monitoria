<?php
function user()
{
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

    $sql = "SELECT id, nome FROM login";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $nome = $row['nome'];
            $id_u = $row['id'];

            echo '
            <option value="' . $id_u . '">' . $nome . '</option>
            ';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}
function verifica($user, $produto)
{
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

    $sql = "SELECT id_user, id_produto FROM compras WHERE id_user='$user' and id_produto='$produto' ";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            return true;
        }
    } else {
        return false;
    }
    $conn->close();
}

function produto()
{
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

    $sql = "SELECT id_p, nome FROM produto";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            $nome = $row['nome'];
            $id_p = $row['id_p'];

            echo '
            <option value="' . $id_p . '">' . $nome . '</option>
            ';
        }
    } else {
        echo "0 results";
    }
    $conn->close();
}

if (isset($_POST['submit'])) {
    $usuario = $_POST['usuario'];
    $produto = $_POST['produto'];
    if(verifica($usuario, $produto) == true){
        echo "<script>alert('compra já existe!')</script>";
    }else{
        $usuario = $_POST['usuario'];
        $produto = $_POST['produto'];
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
    
        $sql = "INSERT INTO compras (id_user, id_produto) VALUES ('$usuario', '$produto')";
    
        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('compra feita com sucesso!!')</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    
        $conn->close();
    }

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
            <label for="" class="form-label">Usuario:</label>
            <select name="usuario" id="" class="form-control">
                <option value="">Selecione um usuario</option>
                <?= user() ?>
            </select>
        </div>
        <div>
            <label for="" class="form-label">produto:</label>
            <select name="produto" id="" class="form-control">
                <option value="">Selecione um produto</option>
                <?= produto() ?>
            </select>
        </div>
        <div class="d-felx justify-content-center mt-5">
            <button type="submit" name="submit" class="btn btn-outline-primary w-50">Comprar</button>
        </div>
    </form>
</body>

</html>