let listaDeObjetos = [];

// 1. FUNÇÃO ESPECIALISTA EM DESENHAR (A "fábrica" de LI)
function criarElementoTarefa(tarefaObjeto) {
    let listaUL = document.getElementById('tarefas');
    let item = document.createElement('li');
    item.innerText = tarefaObjeto.texto + " ";

    // Aplica o estilo se já estiver concluída (importante para quando carregar do HD)
    if (tarefaObjeto.status === "concluida") {
        item.style.textDecoration = "line-through";
        item.style.color = "gray";
    }

    let btnApagar = document.createElement('button');
    btnApagar.innerText = "Apagar";


    btnApagar.onclick = function() {
        let indice = listaDeObjetos.indexOf(tarefaObjeto);
        listaDeObjetos.splice(indice, 1);
        item.remove();
        atualizarContador()
        salvarNoHD();
    };

    item.onclick = function() {
        if(tarefaObjeto.status === "pendente") {
            tarefaObjeto.status = 'concluida';
            item.style.textDecoration = "line-through";
            item.style.color = "gray";
        } else {
            tarefaObjeto.status = 'pendente';
            item.style.textDecoration = "none";
            item.style.color = "black";
        }       
        atualizarContador()
        salvarNoHD();
    };

    item.appendChild(btnApagar);
    listaUL.appendChild(item);
}

// 2. FUNÇÃO QUE CHAMA O INPUT
function adicionarTarefa() {
    let input = document.getElementById('tarefa');
    if (input.value == '') return;

    let novaTarefa = {
        texto: input.value,
        status: 'pendente'
    };

    listaDeObjetos.push(novaTarefa);
    criarElementoTarefa(novaTarefa); // Chama a fábrica de desenho
    salvarNoHD();
    atualizarContador()

    input.value = '';
    input.focus();
}

// 3. PERSISTÊNCIA
function salvarNoHD() {
    localStorage.setItem('minhasTarefas', JSON.stringify(listaDeObjetos));
}

function carregarDoHD() {
    let dadosNoHD = localStorage.getItem('minhasTarefas');
    if (dadosNoHD) {
        listaDeObjetos = JSON.parse(dadosNoHD);
        // Para cada objeto salvo, a gente manda para a "fábrica" de desenho
        listaDeObjetos.forEach(obj => criarElementoTarefa(obj));
    }
}

carregarDoHD();

function atualizarContador() {
    let pendentes = listaDeObjetos.filter(tarefa => tarefa.status === 'pendente');
    

    document.getElementById('contador').innerText = `Você tem ${pendentes.length} tarefas pendentes`;
}

atualizarContador()