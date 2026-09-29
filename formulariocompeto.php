<form method="post">

Nome: <input type="text" name="nome"><br><br>
Idade: <input type="text" name="idade"><br><br>
Email: <input type="text" name="email"><br><br>

<input type="submit" value="Guardar">

</form>

<?php

if (isset($_POST["nome"])) {

    $conn = new mysqli("localhost", "root", "", "escola");

    if ($conn->connect_error) {
        die("Erro na ligação: " . $conn->connect_error);
    }

    $nome = htmlspecialchars(trim($_POST["nome"]));
    $idade = (int) $_POST["idade"];
    $email = htmlspecialchars(trim($_POST["email"]));

    $sql = "INSERT INTO alunos (nome, idade, email)
            VALUES ('$nome', $idade, '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "✔ Dados guardados com sucesso!";
    } else {
        echo "Erro: " . $conn->error;
    }

    $conn->close();
}

?>