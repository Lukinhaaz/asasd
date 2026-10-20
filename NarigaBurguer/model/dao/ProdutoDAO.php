<?php
    class ProdutoDAO {
    public function create($produto){
        try {
            $query = BD::getConexao()->prepare(

                "INSERT INTO produto(nome, preco, descricao) 
                VALUES (:n, :p, :d)"
            );
            $query->bindValue(':n', $produto->getNome(),PDO::PARAM_STR);
            $query->bindValue(':p', $produto->getPreco(),PDO::PARAM_STR);
            $query->bindValue(':d', $produto->getDescrisao(),PDO::PARAM_STR);



         

            if(!$query->execute()) {
                    print_r($query->errorInfo());
             
        } 
        } 
        
                    catch(PDOException $e) {
                echo "Erro #1: " . $e->egtMessage();
            }
        }
        
        

    
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM produto");
              
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaproduto = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $produto = new Produto(); //Classe bean
                    $produto->setId($linha['id_produto']);
                    $produto->setNome($linha['nome']);
                    $produto->setPreco($linha['preco']);
                    $produto->setDescricao($linha['descricao']);
                   

                    array_push($listaproduto, $produto);
                  
                }

                return $listaproduto;

                
            }  
                catch(PDOException $e) {
                echo "Erro #1: " . $e->egtMessage();
            }
       

        }

    }