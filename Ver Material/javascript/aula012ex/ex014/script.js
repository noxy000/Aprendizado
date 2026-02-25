function carregar() {
    var msg = window.document.getElementById('msg')
    var img = window.document.getElementById('imagem')
    var data = new Date
    var hora = data.getHours()
    msg.innerHTML = `Agora são ${hora} horas.`
    if (hora >= 0 && hora < 12) {
        // Bom dia
        img.src = 'a.jpg'
        window.document.body.style.background = '#67dcf0'
    } else if (hora >= 12 && hora <= 18) {
        // Boa tarde
        img.src = 'b.jpg'
        window.document.body.style.background = '#b37914'
    } else {
        // Boa noite
        img.src = 'c.jpg'
        window.document.body.style.background = '#002c7d'
    }
}
