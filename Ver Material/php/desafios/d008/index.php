<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php 
        $valor = $_GET["valor"] ?? 0;

        $raiz = sqrt($valor);
        $raizCubica = $valor ** (1/3);
    ?>
    <main>
        <h1>Informe um número</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="valor">Número</label>
            <input type="number" name="valor" id="valor" step="0.01" value="<?=$valor?>">
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado Final</h2>       
        <p>Analisando o número <?=$valor?>, temos:</p>
        <ul>
            <li>A sua raiz quadrada é <strong><?=number_format($raiz, 3, ",", ".")?></strong></li>
            <li>A sua raiz cúbica é <strong><?=number_format($raizCubica, 3, ",", ".")?></strong></li>
        </ul>
    </section>
</body>
</html>