var agora = new Date() // Estrutura condicional alinhada
var hora =  agora.getHours() // 8
console.log(`Agora são exatamente ${hora} horas`)
if (hora < 12) {
    console.log('Bom Dia!')
} else if (hora <= 18) {
    console.log('Boa Tarde!')
} else {
    console.log('Boa Noite!')
}

/* Condição Múltipla

switch (Expressão) {
    case valor 1:

        break
    case valor 2:

        break
    case valor 3:

        break
    default:

        break
}
*/