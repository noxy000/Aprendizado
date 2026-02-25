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
        $total = $_REQUEST["tempo"] ?? 0;
        $sobra = $total;

        // Lógica de "Cascata" usando o resto da divisão (%)
        // Semanas (604.800s)
        $semanas = (int)($sobra / 604800);
        $sobra %= 604800;

        // Dias (86.400s)
        $dias = (int)($sobra / 86400);
        $sobra %= 86400;

        // Horas (3.600s)
        $horas = (int)($sobra / 3600);
        $sobra %= 3600;

        // Minutos (60s)
        $minutos = (int)($sobra / 60);
        $sobra %= 60;

        // Segundos
        $segundos = $sobra;
    ?>
    <main>
        <h1>Calculadora de Tempo</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="tempo">Qual é o total de segundos?</label>
            <input type="number" name="tempo" id="tempo" min="0" step="1" value="<?=$total?>" required>           
            <input type="submit" value="Calcular">
        </form>
    </main>

    <section id="resultado">
        <h2>Totalizando tudo</h2>       
        <p>Analisando o valor que você digitou, <strong><?=number_format($total, 0, ',', '.')?> segundos</strong> equivalem a:</p>
        
        
        
        <ul>
            <li><strong><?=$semanas?></strong> semanas</li>
            <li><strong><?=$dias?></strong> dias</li>
            <li><strong><?=$horas?></strong> horas</li>
            <li><strong><?=$minutos?></strong> minutos</li>
            <li><strong><?=$segundos?></strong> segundos</li>
        </ul>
    </section>
</body>
</html>