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
    
}