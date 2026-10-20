<?php
    class PagamentoDAO {
        public function read() {
            try {
                $query = BD::getConexao()->prepare("SELECT * FROM pagamento");
              
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listaPagamento = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $pagamento = new pagamento(); //Classe bean
                    $pagamento->setId($linha['id_pagamento']);
                    $pagamento->settipo($linha['tipo']);
                    $pagamento->setStatus($linha['status']);

                    array_push($listaPagamento, $pagamento);
                  
                }

                return $listaPagamento;

                
            }  catch(PDOException $e) {
                echo "Erro #2: " . $e->egtMessage();
            }

        }

    }