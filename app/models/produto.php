<?php
require_once __DIR__ . '/../../config/database.php';

class Produto
{
    private $conn;
    private $table = "produtos";

    public function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function listar()
    {
        $stmt = $this->conn->prepare("SELECT * FROM {$this->table}");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $preco, $categoria)
    {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (nome_produto, preco_produto, categoria_produto) VALUES (:nome_produto, :preco_produto, :categoria_produto)");
        $stmt->bindParam(":nome_produto", $nome);
        $stmt->bindParam(":preco_produto", $preco);
        $stmt->bindParam(":categoria_produto", $categoria);
        return $stmt->execute();
    }

    public function buscarPorId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function editar($id, $nome, $preco, $categoria) {
    $query = "UPDATE " . $this->table . " 
              SET nome_produto = :nome,
                  preco_produto = :preco,
                  categoria_produto = :categoria
              WHERE id = :id";

    $stmt = $this->conn->prepare($query);

    $nome = htmlspecialchars(strip_tags($nome));
    $preco = htmlspecialchars(strip_tags($preco));
    $categoria = htmlspecialchars(strip_tags($categoria));

    $stmt->bindValue(':id', (int)$id, PDO::PARAM_INT);
    $stmt->bindValue(':nome', $nome);
    $stmt->bindValue(':preco', $preco);
    $stmt->bindValue(':categoria', $categoria);

    return $stmt->execute();
}


    public function excluir($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_produtos', $id);
        
        return $stmt->execute();
    }

}
