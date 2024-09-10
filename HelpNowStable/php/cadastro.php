<?php
// signup.php
include 'Conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['newUsername'];
    $email = $_POST['email'];
    $password = $_POST['newPassword'];
    $telefone = $_POST['newTelefone'];

    // Verificando se o usuário já existe
    $sql_check = "SELECT * FROM usuários WHERE username = '$username' OR email = '$email'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "Nome de usuário ou email já existente. Tente outro.";
    } else {
        // Inserir novo usuário
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "INSERT INTO usuários (nome, Email, senha, telefone) VALUES ('$username', '$email', '$hashed_password', '$telefone')";

        if ($conn->query($sql) === TRUE) {
            echo "<script>alert('Cadastro realizado com sucesso!'); window.location.href = 'index.html';</script>";
            exit();
        } else {
            echo "Erro ao cadastrar: " . $conn->error;
        }
    }

    $conn->close();
}
?>
