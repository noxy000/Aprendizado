var numeros = []
        function add() {
            let txti = document.getElementById('numero')
            let numero = Number(txti.value)
            let select = document.getElementById('sel')
            let pos = numeros.indexOf(numero)
            if (pos == -1 && numero !== 0) {
                let item = document.createElement('option')
                item.innerText = numero + " Adicionado"
                select.size++
                select.appendChild(item)
                numeros.push(numero)
                numeros.sort()
                txti.value = ''
                txti.focus()
            } else {
                window.alert("não pode repetir o numero")
            }

        }

        function finalizar() {
            if (numeros.length == 0) return window.alert("Adicione números primeiro!");

            let res = document.querySelector('div.res');
            let maior = numeros[0];
            let menor = numeros[0];
            let soma = 0;

            for (let i = 0; i < numeros.length; i++) {
                soma += numeros[i]; // Somando para a média
                if (numeros[i] > maior) maior = numeros[i];
                if (numeros[i] < menor) menor = numeros[i];
            }

            let media = soma / numeros.length;

            res.innerHTML = `
        <p>Total: ${numeros.length} números.</p>
        <p>Maior: ${maior} | Menor: ${menor}</p>
        <p>Média: ${media.toFixed(2)}</p>
    `;
        }

    
    function inverter() {
        let res = document.getElementById('res1');
        res.value = '';
        let texto = document.getElementById('nome').value;
        let resultado = texto.split('').reverse().join('');
        
        res.innerHTML = `Seu nome ao contrário é <strong>${resultado}</strong>`;
    }

    function mudarCor() {
    let fundo = document.querySelector('div.camaleao');
    let cor = document.getElementById('cor').value;

    // Verifica se a cor é válida E se não está vazio
    if (cor !== "" && CSS.supports('color', cor)) {
        fundo.style.backgroundColor = cor;
    } else {
        fundo.style.backgroundColor = "#ababab";
    }
}

let cliques = 0
const contagem = document.querySelector('p#res');
    function contar() {
        cliques++;
        contagem.innerHTML = `O botão foi clicado ${cliques} vezes`;
    }

let tempo_contado = document.querySelector('p#relogio')
    setInterval(function tempo() { 
        let agora = new Date().toLocaleTimeString();
        tempo_contado.innerHTML = `Agora é ${agora}`
    }, 1000)