<?php

function listaCategorias($conexao) {
    $categorias = array();
    $query = "select * from categorias";
    $resultado = pg_query($conexao, $query);
    while($categoria = pg_fetch_assoc($resultado)) {
        array_push($categorias, $categoria);
    }
    return $categorias;
}
