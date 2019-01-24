<?php

function listaProdutos($conexao) {
    $produtos = array();
    $resultado = pg_query($conexao, "select p.*, c.nome as categoria_nome from produtos as p join categorias as c on p.categoria_id = c.id");

    while($produto = pg_fetch_assoc($resultado)) {
        array_push($produtos, $produto);
    }

    return $produtos;
}

function insereProduto($conexao, $nome, $preco, $descricao, $categoria_id, $usado) {
    $query = "insert into produtos (nome, preco, descricao, categoria_id, usado)
        values ('{$nome}', {$preco}, '{$descricao}', {$categoria_id}, {$usado})";
    return pg_query($conexao, $query);
}

function alteraProduto($conexao, $id, $nome, $preco, $descricao, $categoria_id, $usado) {
    $query = "update produtos set nome = '{$nome}', preco = {$preco}, descricao = '{$descricao}',
        categoria_id= {$categoria_id}, usado = {$usado} where id = '{$id}'";
    return pg_query($conexao, $query);
}

function removeProduto($conexao, $id) {
    $query = "delete from produtos where id = {$id}";
    return pg_query($conexao, $query);
}

function buscaProduto($conexao, $id) {
    $query = "select * from produtos where id = {$id}";
    $resultado = pg_query($conexao, $query);
    return pg_fetch_assoc($resultado);
}
