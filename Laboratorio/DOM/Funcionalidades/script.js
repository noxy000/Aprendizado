var numeros = [];

// 1. MÁQUINA DE CALCULAR (Reutilizável)
function atualizarPainel(lista) {
    let res = document.querySelector('div.res');
    
    if (lista.length === 0) {
        res.innerHTML = "Aguardando números...";
        return;
    }

    let maior = Math.max(...lista);
    let menor = Math.min(...lista);
    let soma = lista.reduce((acc, val) => acc + val, 0);
    let media = soma / lista.length;

    res.innerHTML = `
        <p>Total: ${lista.length} números.</p>
        <p>Maior: ${maior} | Menor: ${menor}</p>
        <p>Média: ${media.toFixed(2)}</p>
    `;
}

// 2. ADICIONAR
function add() {
    let txti = document.getElementById('numero');
    let numero = Number(txti.value);
    let select = document.getElementById('sel');

    if (numeros.indexOf(numero) == -1 && txti.value.length !== 0) {
        numeros.push(numero);
        numeros.sort((a, b) => a - b); // Garante ordem numérica
        
        // Atualiza a visualização
        renderizarLista(numeros); 
        atualizarPainel(numeros); // Atualiza estatísticas na hora
        
        txti.value = '';
        txti.focus();
    } else {
        alert("Número inválido ou já existente.");
    }
}

function remover() {
    let select = document.getElementById('sel');
    let indexado = select.selectedIndex; // nada seelcionado significa -1
    if (indexado !== -1) { // tem algo indexado
        numeros.splice(indexado, 1) // splice é apagar
        select.remove(indexado)
        atualizarPainel(numeros)
    }
}

// 3. FILTRAR (Usa a mesma máquina)
function filtrar() {
    let digitado = document.getElementById('txtfiltro').value;
    
    // Cria lista só com o que combina
    let filtrados = numeros.filter(n => n.toString().startsWith(digitado));

    renderizarLista(filtrados); // Mostra só os filtrados no select
    atualizarPainel(filtrados); // Calcula estatísticas só dos filtrados
}

// AUXILIAR: Desenha as options no select
function renderizarLista(lista) {
    let select = document.getElementById('sel');
    select.innerHTML = '';
    lista.forEach(n => {
        let item = document.createElement('option');
        item.text = n;
        select.appendChild(item);
    });
}

// --- RESTO DAS FUNÇÕES (O que já estava funcionando) ---

function inverter() {
    let res = document.getElementById('res1');
    let texto = document.getElementById('nome').value;
    res.innerHTML = `Seu nome ao contrário é <strong>${texto.split('').reverse().join('')}</strong>`;
}

function mudarCor() {
    let fundo = document.querySelector('div.camaleao');
    let cor = document.getElementById('cor').value;
    fundo.style.backgroundColor = (cor !== "" && CSS.supports('color', cor)) ? cor : "#ababab";
}

let cliques = 0;
function contar() {
    cliques++;
    document.querySelector('p#res').innerHTML = `O botão foi clicado ${cliques} vezes`;
}

function zerar() {
    cliques = 0;
    document.querySelector('p#res').innerHTML = `O botão foi clicado ${cliques} vezes`;
}

setInterval(() => {
    document.querySelector('p#relogio').innerHTML = `Agora é ${new Date().toLocaleTimeString()}`;
}, 1000);


// . sort usando a - b quando ele pega 2 numeros do array, se der positivo ele joga pra tras, se der negativo ele deixa tá

// lista.reduce((acc, val) => acc + val, 0);
//acc é onde ele guarda e vai somando cada valor da lista que o val pega e joga pra ele


function adicionarTarefa() {
    let input = document.getElementById('tarefa');
    let tarefaTexto = input.value;
    let listaUL = document.getElementById('tarefas');

    if (tarefaTexto == '') return; // Não deixa adicionar tarefa vazia

    let item = document.createElement('li');
    item.innerText = tarefaTexto + " "; 

    let btnApagar = document.createElement('button');
    btnApagar.innerText = "Apagar";
    btnApagar.style.backgroundColor = "red";

    btnApagar.onclick = function() {
        item.remove(); // Ele sabe exatamente qual 'item' deve apagar!
    };

    item.onclick = function() {
    item.style.textDecoration = "line-through";
    item.style.color = "gray";
    };

    item.appendChild(btnApagar);
    listaUL.appendChild(item);

    input.value = '';
    input.focus();
}