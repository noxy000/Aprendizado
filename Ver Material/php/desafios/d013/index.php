<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio PHP - Decomposição de Tempo</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        // Entrada de dados
        $saque = $_GET["saque"] ?? 0;

        $notas100 = (int)($saque / 100); // Daria para usar floor, ele arredonda pra baixo
        $sobra = $saque - 100 * $notas100;

        $notas50 = (int)($sobra / 50);
        $sobra -= 50 * $notas50;

        $notas10 = (int)($sobra / 10);
        $sobra -= 10 * $notas10;

        $notas5 = (int)($sobra / 5);
        $sobra -= 5 * $notas5; // Nem precisaria desse ultimo mas tome



    ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="saque">Qual valor você deseja sacar (R$)</label>
            <input type="number" name="saque" id="saque" min="0" step="5" value="<?=$saque?>" required>           
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section id="resultado">
        <h2>Saque de R$<?=number_format($saque, 2, ",", ".")?> realizado</h2>       
        <p>O caixa eletrônico vai te entregar as seguintes notas:</p>
        <ul>
            <li>Notas de 100 <?=$notas100?>x</li>
            <li>Notas de 50 <?=$notas50?>x</li>
            <li>Notas de 10 <?=$notas10?>x</li>
            <li>Notas de 5 <?=$notas5?>x</li>
        </ul>
    </section>
</body>
</html>