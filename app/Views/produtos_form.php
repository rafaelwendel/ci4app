<html>
    <head>
        <title><?php echo $titulo ?></title>
    </head>
    <body>
        <h2><?php echo $titulo ?></h2>
        <p><a href="<?php echo base_url('produtos') ?>">Voltar para lista de produtos</a></p>
        <strong><?php echo $msg ?></strong>
        <?php if($erros != '') : ?>
        <ul style="color: red;">
            <?php foreach ($erros as $erro) : ?>
            <li><?php echo $erro ?></li>
            <?php endforeach; ?>
        </ul>
        <?php endif; ?>
        <form method="post">
            <p>Nome do Produto: 
                <input type="text" name="nomeproduto" 
                       value="<?php echo (isset($produto) ? $produto->nomeproduto : '') ?>" 
                />
            </p>
            <p>Valor: 
                <input type="text" name="valor" 
                       value="<?php echo (isset($produto) ? $produto->valor : '') ?>" 
                />
            </p>
            <p>Categoria: 
                <?php echo $comboCategorias ?>
            </p>
            <p><input type="submit" value="<?php echo $acao ?>" />
        </form>
    </body>
</html>