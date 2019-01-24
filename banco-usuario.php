<?php
	function buscaUsuarios($conexao, $email, $senha){
		$senhaMd5 = md5($senha);
		$query = "select * from usuarios where email='{$email}' and senha='{$senhaMd5}'";
		$resultado = pg_query($conexao, $query);
		$usuario = pg_fetch_assoc($resultado);
		return $usuario;
	}