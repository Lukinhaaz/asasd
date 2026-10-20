<?php
// Incluir o arquivo de autoload
require "../../autoload.php";

// Instanciar um obketo da classe usuario (bean)
$produto = new Produto();

//Definir os valores atributos a partir do form 
$produto->setNome($_POST['nome']);
$produto->setPreco($_POST['preco']);
$produto->setDescricao($_POST['descricao']);

//Instanciar um objeto da classe ClineteDAO
$dao = new ProdutoDAO();

//Invocar o metodo create
$dao->create($produto);

//Redirecionar para o index(COMENTAR CASO NAO FUNCIONE)
header('Location: index.php');