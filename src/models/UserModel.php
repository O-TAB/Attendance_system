<?php

namespace App\models;

use Exception;
use InvalidArgumentException;

use Core\Model;


class UserModel extends Model {

    public int    $id_usuario;
    public string $email;
    public string $senha;
    public string $nome;
    public string $telefone;
    public string $tipo_usuario;

    public function save(){
        $sql = "INSERT INTO usuarios (nome, email, senha, telefone, tipo_usuario) VALUES (:nome, :email, :senha, :telefone, :tipo_usuario)";

        $table = [
            ':nome' => $this->nome, 
            ':email'=> $this->email, 
            ':senha'=> $this->senha, 
            ':telefone'=> $this->telefone, 
            ':tipo_usuario'=> $this->tipo_usuario
        ];
        
        $this->repoinstance->execute_sql($sql, $table);  
    }

    public function verify(){
        
        if (str_word_count($this->nome) < 2) {
            throw new InvalidArgumentException("$this->nome -nome completo deve conter pelo menos um nome e um sobrenome.");
        }
        // Remove tudo que não for número
        $telefoneLimpo = preg_replace('/\D/', '', $this->telefone);

        // Verifica se tem 10 ou 11 dígitos (com DDD)
        if (strlen($telefoneLimpo) < 10 || strlen($telefoneLimpo) > 11) {
            throw new InvalidArgumentException("$telefoneLimpo - numero deve conter 10 ou 11 dígitos.");
        }
        // Se for celular (11 dígitos), verifica se o 3º dígito é 9
        if (strlen($telefoneLimpo) === 11 && $telefoneLimpo[2] !== '9') {
            throw new InvalidArgumentException("$telefoneLimpo - números celulares devem começar com 9.");
        }
        if($this->repoinstance->findby('email', $this->email)){
            throw new InvalidArgumentException("$this->email - O email já existe!");
        }

    }



    
}