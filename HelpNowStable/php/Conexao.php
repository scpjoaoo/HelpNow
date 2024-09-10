<?php
// Classe de conexão com o banco de dados
class Conexao {
    private $servidor = "127.0.0.1";
    private $usuario = "root";
    private $senha = "";
    private $database = "helpnow";
    private $conn;

    public function __construct() {
        $this->conectar();
    }

    private function conectar() {
        $this->conn = new mysqli($this->servidor, $this->usuario, $this->senha, $this->database);
        if ($this->conn->connect_error) {
            die("Falha na conexão: " . $this->conn->connect_error);
        }
    }

    public function getConexao() {
        return $this->conn;
    }

    public function fecharConexao() {
        $this->conn->close();
    }
}
?>
