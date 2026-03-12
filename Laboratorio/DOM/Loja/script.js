// --- ELEMENTOS GLOBAIS ---
let txtnome = document.getElementById('nome');
let txtn = document.getElementById('txtn');
let lista = document.getElementById('produtos');
var produtos = []; // Array para controle interno

// --- FUNÇÃO DE CADASTRO ---
function cadastrar() {
    let nome = txtnome.value;
    let preco = Number(txtn.value);

    if (nome.length > 0 && txtn.value.length > 0) {
        // Salva no banco de dados (Array)
        produtos.push({nome: nome, preco: preco});

        // Cria a div do produto com a classe CSS
        let item = document.createElement('div');
        item.classList.add('produto'); 
        item.innerHTML = `
            <p><strong>Produto:</strong> ${nome}</p>
            <p><strong>Preço:</strong> R$ ${preco.toFixed(2)}</p>
            <button onclick="excluir(this)" style="background-color: red; width: 100%;">X</button>
        `
        
        lista.appendChild(item);

        // Limpa os campos e volta o foco pro nome
        txtnome.value = '';
        txtn.value = '';
        txtnome.focus();
    } else {
        alert('Preencha os campos corretamente!');
    }
}

// --- FUNÇÕES DE NAVEGAÇÃO (ABAS) ---
let telaCad = document.getElementById('cadastro');
let telaProd = document.getElementById('produtos');

function telaDeCadastro() {
    telaCad.style.display = 'block';
    telaProd.style.display = 'none';
}

function telaDeProdutos() {
    telaProd.style.display = 'flex';
    telaCad.style.display = 'none';
}

// --- FUNÇÃO DE PESQUISA (A JOIA DA COROA) ---
function pesquisar() {
    // 1. Pega o que foi digitado
    let busca = document.getElementById('pesquisando').value.toLowerCase();
    
    // 2. Pega todos os cards de produtos que existem na tela
    let cards = document.getElementsByClassName('produto');

    // Variável "bandeira" (flag) para saber se encontramos algo
    let achouAlgum = false;

    // 3. Loop para esconder ou mostrar
    for (let i = 0; i < cards.length; i++) {
        let textoCard = cards[i].innerText.toLowerCase();

        if (textoCard.includes(busca)) {
            cards[i].style.display = "block"; // Se achou, mostra
            achouAlgum = true; // Avisa que encontrou pelo menos um
        } else {
            cards[i].style.display = "none"; // Se não achou, esconde
        }
    }

    // 4. Lógica do "Não Encontrado"
    // Se você tiver uma <p id="mensagemVazio"> no HTML, pode usar assim:
    let msg = document.getElementById('mensagemVazio');
    if (achouAlgum == false && cards.length > 0) {
        msg.style.display = "block";
        msg.innerText = "Nenhum produto corresponde à busca.";
    } else {
        msg.style.display = "none";
    }
}

function excluir(botao) {
    let card = botao.parentElement; // Pega a div que é "pai" do botão
    card.remove(); // Remove a div da tela na hora!
}

