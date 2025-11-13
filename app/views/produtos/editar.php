<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar produto</title>
    <link rel="stylesheet" href="/aula_mvc/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="header">
            <h1> Editar Produto</h1>
            <a href="index.php" class="btn btn-primary">
                 Voltar
            </a>
        </div>

        <div class="content">
            <div class="form-container">
                <?php if (isset($erro)): ?>
                    <div class="alert alert-danger">
                         <?= $erro ?>
                    </div>
                <?php endif; ?>

                <div class="product-info-card">
                    <div class="product-info-header">
                        <span class="badge badge-info">#<?= $dados['id'] ?></span>
                        <h3><?= htmlspecialchars($dados['nome_produto']) ?></h3>
                    </div>
                    <p class="product-info-description">
                        Atualize as informações do produto abaixo
                    </p>
                </div>

                <form method="POST" action="index.php?controller=produto&action=editar&id=<?= $dados['id'] ?>">

                    <div class="form-group">
                        <label for="nome">
                             Nome do Produto
                            
                        </label>
                        <input 
                            type="text" 
                            id="nome" 
                            name="nome_produto" 
                            value="<?= htmlspecialchars($dados['nome_produto']) ?>"
                            required
                            autofocus>
                    </div>

                    <div class="form-group">
                        <label for="preco">
                             Preço (R$)
                           
                        </label>
                        <input 
                            type="number" 
                            id="preco" 
                            name="preco_produto" 
                            step="0.01" 
                            min="0"
                            value="<?= htmlspecialchars($dados['preco_produto']) ?>"
                            required>
                    </div>

                    <div class="form-group">
                        <label for="categoria">
                             Categoria
        
                        </label>
                        <input type="text" id="categoria" name="categoria_produto" value="<?= htmlspecialchars($dados['categoria_produto']) ?>" required>
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-success">
                             Atualizar Produto
                        </button>
                        <a href="index.php" class="btn btn-secondary">
                             Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="footer">
            <p>© 2024 Sistema MVC de Produtos | Desenvolvido com PHP, PDO e MySQL</p>
        </div>
    </div>
</body>
</html>