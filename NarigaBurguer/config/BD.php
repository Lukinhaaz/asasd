<?php
    class BD{
        public static function getconexao() {
            $conn = new PDO(
            "mysql:host=localhost;dbname=narigaburguer",
            "root",
            "root"
            );
            
            return $conn;
         }
    }