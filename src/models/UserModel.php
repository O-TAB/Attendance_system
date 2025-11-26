<?php

namespace App\models;


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
    
}