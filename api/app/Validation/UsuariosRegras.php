<?php
namespace App\Validation;

use App\Models\Usuarios\UsuariosModel;

class UsuariosRegras {
    public function userCheckout(string $str, string $fields, array $data) {
        $usuarioModel = new UsuariosModel();

        $usuario = $usuarioModel->where('email', $data["email"])->first();

        if (!$usuario) {
            return false;
        }

        return password_verify($data['senha'], $usuario['senha']);
    }
}