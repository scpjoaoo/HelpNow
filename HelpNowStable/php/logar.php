<?php
// logar.php
include 'Conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['Email']) && isset($_POST['password'])) {
        $Email = $_POST['Email'];
        $password = $_POST['password'];

        // Buscar o usuário pelo nome de usuário
        $sql = "SELECT * FROM usuários WHERE Email = '$Email'";
        $result = $conn->query($sql);

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();

            // Verifique se a senha corresponde ao hash
            if (password_verify($password, $user['Senha'])) {
                echo "Login realizado com sucesso!";
            } else {
                echo "Senha incorreta.";
            }
        } else {
            echo "Usuário não encontrado.";
        }
    } else {
        echo "Por favor, preencha todos os campos.";
    }

    $conn->close();
} else {
    echo "Método de requisição inválido.";
}
?>
