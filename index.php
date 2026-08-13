<?php

require_once('produto.php'); #link- do arquivo produto.php para poder instanciar a classe Produto

$arrayProdutos = [
    [
        'id'        => 1,
        'nome'      => 'Fone de Ouvido Bluetooth Pro',
        'descricao' => 'Som de alta fidelidade com cancelamento ativo de ruído (ANC) e bateria com até 30h de duração.',
        'preco'     => 299.90,
        'categoria' => 'Eletrônicos',
        'imagem'    => 'images/fone.png',
        'estoque'   => 15
    ],
    [
        'id'        => 2,
        'nome'      => 'Smartwatch Sport Fit',
        'descricao' => 'Monitoramento cardíaco 24/7, GPS integrado, tela AMOLED HD e resistência à água (5 ATM).',
        'preco'     => 450.00,
        'categoria' => 'Acessórios',
        'imagem'    => 'images/smartwatch.png',
        'estoque'   => 8
    ],
    [
        'id'        => 3,
        'nome'      => 'Teclado Mecânico RGB',
        'descricao' => 'Switches mecânicos táteis, iluminação RGB personalizável e estrutura durável em alumínio.',
        'preco'     => 389.99,
        'categoria' => 'Periféricos',
        'imagem'    => 'images/teclado.png',
        'estoque'   => 3
    ],
    [
        'id'        => 4,
        'nome'      => 'Mochila Impermeável Tech',
        'descricao' => 'Compartimento acolchoado para notebook de 15.6", saída USB externa e tecido resistente à água.',
        'preco'     => 189.90,
        'categoria' => 'Acessórios',
        'imagem'    => 'images/mochila.png',
        'estoque'   => 9
    ]
];

$produtos = [];
foreach ($arrayProdutos as $arrayProduto) {

    $produto = new Produto();

    $produto->codigo = $arrayProduto['id'];
    $produto->nome = $arrayProduto['nome'];
    $produto->descricao = $arrayProduto['descricao'];
    $produto->preco = $arrayProduto['preco'];
    $produto->categoria = $arrayProduto['categoria'];
    $produto->caminhoImagem = $arrayProduto['imagem'];
    $produto->quantidade = $arrayProduto['estoque'];
   
    $produtos[] = $produto->reporEstoque($arrayProduto['estoque']);
}


?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lojinha da esquina</title>
    <!-- Fonte Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css">
</head>
<body>

    <!-- Cabecalho da Loja -->
    <header>
        <div class="header-container">
            <a href="index.php" class="logo">
                Lojinha da Esquina
            </a>
            <nav class="header-nav">
                <a href="index.php" class="nav-link active">Produtos</a>
                <a href="clientes.php" class="nav-link">Clientes</a>
            </nav>
            <div class="cart-icon">
                 Carrinho (0)
            </div>
        </div>
    </header>

    <!-- Conteudo Principal -->
    <main>
        <div class="page-title">
            <h1>Produtos em Destaque</h1>
            <p>Confira nossas ofertas exclusivas carregadas dinamicamente via PHP</p>
        </div>

        <!-- Grid de Produtos Renderizado pelo PHP -->
        <section class="products-grid">
            <?php foreach ($produtos as $produto): ?>
                <article class="product-card">
                    <div class="image-container">
                        <img src="<?= htmlspecialchars($produto->caminhoImagem) ?>" alt="<?= htmlspecialchars($produto->nome) ?>">
                    </div>
                    <div class="product-info">
                        <div class="product-meta">
                            <!-- Categoria vinda do Array em PHP -->
                            <span class="category-badge">
                                <?= htmlspecialchars($produto->categoria) ?>
                            </span>

                            <!-- Quantidade em Estoque vinda do Array em PHP -->
                            <span class="stock-badge <?= $produto->quantidade <= 5 ? 'low-stock' : '' ?>">
                                Estoque: <?= (int)$produto->quantidade ?> un.
                            </span>
                        </div>

                        <!-- Nome vindo do Array em PHP -->
                        <h2 class="product-title">
                            <?= htmlspecialchars($produto->nome) ?>
                        </h2>

                        <!-- Descricao vinda do Array em PHP -->
                        <p class="product-description">
                            <?= htmlspecialchars($produto->descricao) ?>
                        </p>

                        <div class="product-footer">
                            <!-- Preco vindo do Array em PHP com formatação R$ -->
                            <span class="product-price">
                                R$ <?= number_format($produto->preco, 2, ',', '.') ?>
                            </span>
                            <button class="btn-buy">Comprar</button>
                        </div>
                    </div>
                </article>
            <?php endforeach; ?>
        </section>
    </main>

    <!-- Rodape -->
    <footer>
        &copy; <?= date('Y') ?> Lojinha da Esquina - Exemplo de E-commerce com PHP e HTML
    </footer>

</body>
</html>
