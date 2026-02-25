<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos Primitivos em PHP</title>
</head>
<body>
    <h1>Teste de tipos primitivos</h1>
    <?php 
        //0x = hexadecimal 0b = binário 0 = Octal
        //$num = 010;
        //echo "O valor da variável é $num";

        //$v = 300;
        //var_dump($v); 
        //dump é despejo, vai despejar na tela todas as informações da variável

        //em valores boleanos true é 1 e false é nada

        //$num = (int) 3e2; //diria que é float, mas dá pra forçar pra dizer que é int/integer
        //echo "O valor de num é $num ";
        //var_dump($num);

        //$casado = true;
        //echo "O valor para casado é $casado"

        //$vet = [6, 2.5, "Maria", 3, false];
        //var_dump($vet);

        class Pessoa {
            private string $nome;
        }

        $p = new Pessoa;
        var_dump($p);

        // echo "$nom \"Minotauro\" $snom"; "não quero que mostre como o fechamento de uma string, quero que mostre literalmente as aspas, isso se chama sequência de escape

        /*
        Existe \' pra conseguir colocar aspas simples dentro de aspas simples

        já nas asplas duplas existem mais algumas sequências de escape

        \n Nova linha, quebra a linha
        \t Tabulação horizontal, tipo quando aperta tab e ele dá um espaço maior
        \\ barra invertida
        \$ sinal de cifrão
        \u{} codepoint unicode
        
        Sintaxe Heredoc

        $curso = "PHP";
        $ano = date('Y');
        echo <<< FRASE   <- se colocasse 'FRASE' string Nowdoc ai ele não interpreta
            Estou estudando $curso
                Em $ano
        FRASE;
        */
    ?>
</body>
</html>