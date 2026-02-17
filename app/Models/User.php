<?php

    namespace App\Models;

    class User {
        private $id;
        private $id_role;
        private $username;
        private $email;
        private $password;
        private $role;

        public function __construct($valeurs = [])
        {
            if (!empty($valeurs))
                $this->hydrate($valeurs);
        }
        public function hydrate(array $donnees) {
            foreach ($donnees as $key => $value) {
                $method = 'set'.ucfirst($key);
                if (method_exists($this, $method)) {
                    $this->$method($value);
                } else {
                    echo $method." introuvable";
                }
            }
        }
        public function getId_user() {
            return $this->id;
        }
        public function setId_user($id) {
            $this->id = $id;
        }
        public function getId_role() {
            return $this->id_role;
        }
        public function setId_role($id_role) {
            $this->id_role = $id_role;
        }
        public function getUsername() {
            return $this->username;
        }
        public function setUsername($username) {
            $this->username = $username;
        }
        public function getEmail() {
            return $this->email;
        }
        public function setEmail($email) {
            $this->email = $email;
        }
        public function getPassword() {
            return $this->password;
        }
        public function setPassword($password) {
            $this->password = $password;
        }
        public function getRole() {
            return $this->role;
        }
        public function setRole($role) {
            $this->role = $role;
        }
    }