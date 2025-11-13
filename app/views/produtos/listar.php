<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Listar produtos</title>
    <link rel="stylesheet" href="/aula_mvc/assets/css/style.css">
 <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Rethink+Sans:ital,wght@0,400..800;1,400..800&family=Space+Grotesk:wght@300..700&display=swap" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h1>Gerenciar produtos</h1>
        <a href="index.php?controller=produto&action=criar" class="button">Novo produto</a>
        <table>
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Categoria</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dados as $user): ?>
                    <tr>
                        <td><?= htmlspecialchars($user['nome_produto']) ?></td>
                        <td><?= htmlspecialchars($user['preco_produto']) ?></td>
                        <td><?= htmlspecialchars($user['categoria_produto']) ?></td>
                        <td>
    <div class="acoes">
        <a href="index.php?controller=produto&action=editar&id=<?= (int)$user['id'] ?>" 
           class="btn btn-warning btn-sm">
            Editar
        </a>

        <a href="javascript:void(0);"
           class="btn btn-danger btn-sm"
           onclick="confirmarExclusao(<?= (int)$user['id']; ?>);">
            Excluir
        </a>
    </div>
</td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="footer">
            &copy; <?= date('Y') ?> - Sistema MVC em PHP Puro
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function confirmarExclusao(id) {
        Swal.fire({
            title: 'Tem certeza?',
            text: 'Essa ação não poderá ser desfeita!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Sim, excluir',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = 'index.php?controller=produto&action=excluir&id=' + id;
            }
        });
    }
    </script>
</body>

</html>