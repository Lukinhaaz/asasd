<?php
    class Pagamento {
        // Atributos
        private $id;
        private $tipo;
        private $status;

        // Métodos de encapsulamento (getters e setters)
        public function getId() {
            return $this->id;
        }

        public function setId($id) {
            $this->id = $id;
        }

        public function getTipo() {
            return $this->tipo;
        }

        public function setTipo($tipo) {
            $this->tipo = $tipo;
        }

        public function getStatus() {
            return $this->status;
        }

        public function setStatus($status) {
            $this->status = $status;
        }

    }