<?php
require_once __DIR__ . '/../models/produto.php';

class ProdutoController
{

    public function listar()
    {
        $produto = new Produto();
        $dados = $produto->listar();
        require __DIR__ . '/../views/produtos/listar.php';
    }

    public function criar()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = $_POST['nome_produto'] ?? null;
            $preco = $_POST['preco_produto'] ?? null;
            $categoria = $_POST['categoria_produto'] ?? null;

            if ($nome === null || $preco === null || $categoria === null) {
                die('Erro: campos não enviados. Confira os "name" do formulário.');
            }

            $produto = new Produto();
            $produto->criar($nome, $preco, $categoria);
            header("Location: index.php?controller=produto&action=listar");
            exit;
    }
        require __DIR__ . '/../views/produtos/criar.php';
    }

    public function editar($id) {
        $produto = new Produto();
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if ($produto->editar($id, $_POST['nome_produto'], $_POST['preco_produto'], $_POST['categoria_produto'])) {
                header("Location: index.php?controller=produto&action=listar");
                exit();
            } else {
                $erro = "Erro ao editar produto.";
            }
        }

        $dados = $produto->buscarPorId($id);
        
        if (!$dados) {
            header("Location: index.php?controller=produto&action=listar");
            exit();
        }
 
        include __DIR__ . '/../views/produtos/editar.php';
    }

    public function excluir($id) {
        $produto = new Produto();
        
        if ($produto->excluir($id)) {
            header("Location: index.php?controller=produto&action=listar");
        } else {
            header("Location: index.php?controller=produto&action=criar");
        }
        exit();
    }
}
