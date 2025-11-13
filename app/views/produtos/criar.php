<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Novo produto</title>
    <link rel="stylesheet" href="/aula_mvc/assets/css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">

</head>

<body>
    <div class="container">
        <h1>Cadastrar novo produto</h1>
        <form action="index.php?controller=produto&action=criar" id="form-criar" method="POST">
            <label for="nome">Nome:</label>
            <input type="text" id="nome" name="nome_produto" placeholder="Blush" required>

            <label for="nome">Preço:</label>
            <input type="text" id="nome" name="preco_produto" placeholder="199,90" required>

            <label for="categoria">Categoria</label>
            <input type="text" id="categoria" name="categoria_produto" placeholder="Maquiagem" required>

            <div id="btn-salvar">
                <button type="submit" class="button">Salvar</button>
            </div>
        </form>

        <p style="text-align:center; margin-top: 15px;">
            <a href="index.php?controller=produto&action=listar"> Voltar</a>
        </p>

        <div class="footer">
            &copy; <?= date('Y') ?> - Sistema MVC em PHP Puro
        </div>
    </div>
</body>

</html>