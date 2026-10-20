<?php
// Incluir o arquivo de autoload
require "../../autoload.php";

// Instanciar um obketo da classe usuario (bean)
$usuario = new Usuario();

//Definir os valores atributos a partir do form 
$usuario->setNome($_POST['nome']);
$usuario->setEmail($_POST['email']);
$usuario->setTelefone($_POST['telefone']);

//Instanciar um objeto da classe ClineteDAO
$dao = new UsuarioDAO();

//Invocar o metodo create
$dao->create($usuario);

//Redirecionar para o index(COMENTAR CASO NAO FUNCIONE)
header('Location: index.php');