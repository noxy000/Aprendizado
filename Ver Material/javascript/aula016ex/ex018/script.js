var txtn = document.getElementById('txtn')
var select = document.getElementById('txtselect')
var res = document.getElementById('res')
var ni = -1
var elementos = []

function adicionar() {
    var num = Number(txtn.value)
    let temounao = elementos.indexOf(num)
    if (num < 1 || num > 100 || temounao != -1) {
        alert('Número inválido ou já encontrado na lista!')
    } 
     else {
        elementos.push(num)
    var item = document.createElement('option')
    item.text = `Valor ${num} adicionado!`      
    select.appendChild(item)
    ni ++
    txtn.value = ''
    num.focus
    }
}

function finalizar() {
    if (elementos.length == 0) {
        alert('Adicione pelo menos 1 elemento para finalizar!')
    } else {
        res.innerText = ''
    elementos.sort()
    res.innerHTML += `<p>Ao todo temos ${elementos.length} número(s) cadastrado(s)</p>`
    res.innerHTML += `<p>O maior valor informado foi ${elementos[ni]}</p>`
    res.innerHTML += `<p>O menor valor informado foi ${elementos[0]}</p>`
    var soma = 0
    let pos = 0
    for (let pos in elementos) {
        soma += elementos[pos]
    }
    res.innerHTML += `Somando todos o valores temos ${soma}</p>`
    res.innerHTML += `A média dos valores digitados é ${soma/elementos.length}</p>`
    }
    
}