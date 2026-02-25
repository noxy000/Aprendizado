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
        $preco = $_REQUEST["preco"] ?? 0;
        $reajuste = $_REQUEST["reajuste"] ?? 0;

        $aumento = ($preco * $reajuste) / 100;
        $novo_preco = $preco + $aumento;
    ?>
    <main>
        <h1>Reajustador de Preços</h1>
        <form action="<?=$_SERVER['PHP_SELF']?>" method="get">
            <label for="preco">Preço do Produto (R$)</label>
            <input type="number" name="preco" id="preco" min="0.10" step="0.01" value="<?=$preco?>">
            
            <label for="reajuste">Qual será o percentual de reajuste? (<strong><span id="p">0</span>%</strong>)</label>
            <input type="range" name="reajuste" id="reajuste" min="0" max="100" step="1" value="<?=$reajuste?>" oninput="mudarValor()">
            
            <input type="submit" value="Reajustar">
        </form>
    </main>

    <section id="resultado">
        <h2>Resultado do Reajuste</h2>       
        <?php 
            echo "<p>O produto que custava <strong>R$ " . number_format($preco, 2, ",", ".") . "</strong>, com <strong>$reajuste% de aumento</strong> vai passar a custar <strong>R$ " . number_format($novo_preco, 2, ",", ".") . "</strong> a partir de agora.</p>";
        ?>
    </section>
    
    <script>
        // Função para atualizar o número da porcentagem na tela
        function mudarValor() {
            let p = document.getElementById('p');
            let slider = document.getElementById('reajuste');
            
            p.innerText = slider.value;
        }

        // Chamada inicial para o valor não começar em 0 se o PHP já tiver enviado um valor
        mudarValor();
    </script>
</body>
</html>