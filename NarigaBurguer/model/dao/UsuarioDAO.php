<?php
    class UsuarioDAO {
    public function create($usuario){
        try {
            $query = BD::getConexao()->prepare(

                "INSERT INTO usuario(nome, email, telefone) 
                VALUES (:n, :e, :t)"
            );
            $query->bindValue(':n', $usuario->getNome(),PDO::PARAM_STR);
            $query->bindValue(':e', $usuario->getEmail(),PDO::PARAM_STR);
            $query->bindValue(':t', $usuario->getTelefone(),PDO::PARAM_STR);



         

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
                $query = BD::getConexao()->prepare("SELECT * FROM usuario");
              
                if(!$query->execute()) {
                    print_r($query->errorInfo());
                }

                $listausuarios = array();
                foreach($query->fetchAll(PDO::FETCH_ASSOC) as $linha) {
                    $usuario = new Usuario(); //Classe bean
                    $usuario->setId($linha['id_usuario']);
                    $usuario->setNome($linha['nome']);
                    $usuario->setEmail($linha['email']);
                    $usuario->setTelefone($linha['telefone']);
                   

                    array_push($listausuarios, $usuario);
                  
                }

                return $listausuarios;

                
            }  
                catch(PDOException $e) {
                echo "Erro #1: " . $e->egtMessage();
            }
       

        }

    }