<?php

interface Publicacao // Interface
{
    public function abrir();
    public function fechar();
    public function folhear($p); // Botei o nome de parâmetro igual do livro, mas pode ser diferente e funciona
    public function avancarPag();
    public function voltarPag();
}
