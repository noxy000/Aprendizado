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
        date_default_timezone_set("America/Sao_Paulo");
        $dataAtual = date("Y");
        $ano = $_GET["ano1"] ?? 0; // Ano em que o usuário nasceu
        $anoE = $_GET["ano2"] ?? 0; // Ano escolhido
    ?>
    <main>
        <h1>Calculando a sua idade</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="ano1">Em que ano você nasceu?</label>
            <input type="number" name="ano1" id="ano1" value="2000" max="<?=$dataAtual?>">
            <label for="ano2">Quer saber sua idade em que ano (atualmente estamos em <strong style="font-weight: bold;"><?=$dataAtual?></strong>)</label>
            <input type="number" name="ano2" id="ano2" value="<?=$dataAtual?>">
            <input type="submit" value="Qual será minha idade?">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado</h2>       
        <p>Quem nasceu em <?=$ano?> vai ter <strong><?=($anoE - $ano)?> anos</strong> em <?=$anoE?>!</p>
    </section>
</body>
</html>