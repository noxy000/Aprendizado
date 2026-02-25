<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercício PHP</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .grid-divisao {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            max-width: 300px;
            margin: 20px auto;
        }

        .grid-item {
            padding: 15px;
            font-size: 1.8em;
            text-align: center;
        }

        .divisor {
            border-bottom: 3px solid black;
            border-left: 3px solid black;
        }

        .quociente {
            border-left: 3px solid black;
        }
    </style>
</head>
<body>
    <?php 
        $divid = $_GET["divid"] ?? 0;
        $divis = $_GET["divis"] ?? 1;

        $quociente = (int)($divid / $divis); // ou intdiv
        $resto = $divid % $divis;
    ?>
    <main>
        <h1>Anatomia de uma Divisão</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="divid">Dividendo</label>
            <input type="number" name="divid" id="divid" value="<?=$divid?>">
            <label for="divis">Divisor</label>
            <input type="number" name="divis" id="divis" min="1" value="<?=$divis?>">
            <input type="submit" value="Analisar">
        </form>
    </main>

    <section id="resultado">
        <h2>Estrutura da Divisão</h2>       
        
        <div class="grid-divisao">
            <div class="grid-item"><?=$divid?></div>
            
            <div class="grid-item divisor"><?=$divis?></div>
            
            <div class="grid-item"><?=$resto?></div>
            
            <div class="grid-item quociente"><?=$quociente?></div>
        </div>

        <p>O resultado da divisão de <strong><?=$divid?></strong> por <strong><?=$divis?></strong> é <strong><?=$quociente?></strong> com resto <strong><?=$resto?></strong>.</p>
    </section>
</body>
</html>