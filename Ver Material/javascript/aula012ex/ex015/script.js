function verificar() {
    var data = new Date()
    var ano = data.getFullYear()
    var fano = document.getElementById('txtano')
    var res = document.querySelector('div#res')
    if (fano.value.length == 0 || Number(fano.value) > ano) {
        window.alert('[ERRO] Verifique os dados e tente novamente!')
    } else {
        var fsex = document.getElementsByName('radsex')
        var idade = ano - Number(fano.value)
        var gênero = ''
        var img = document.createElement('img') // criando imagem
        img.setAttribute('id', 'foto') // colocando id
        if (fsex[0].checked) {
            gênero = 'Homem'
            if (idade >= 0 && idade < 10) {
                img.setAttribute('src', 'bh.png')
            } else if (idade < 21) {
                img.setAttribute('src', 'jh.png')
            } else if (idade < 50) {
                img.setAttribute('src', 'ah.png')
            } else {
                img.setAttribute('src', 'ih.png')
            }
        } else if (fsex[1].checked) {
            gênero = 'Mulher'
            if (idade >= 0 && idade < 10) {
                img.setAttribute('src', 'bm.png')
            } else if (idade < 21) {
                img.setAttribute('src', 'jm.png')
            } else if (idade < 50) {
                img.setAttribute('src', 'am.png')
            } else {
                img.setAttribute('src', 'im.png')
            }
        }
        res.style.textAlign = 'center'
        res.innerHTML = `Detectamos ${gênero} com ${idade} ano(s).`
        res.appendChild(img)
    }
}