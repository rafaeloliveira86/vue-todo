<?php
namespace App\Validation;

use App\Models\Users\UsersModel;

class UsersRules {
    public function userCheckout(string $str, string $fields, array $data) {
        $userModel = new UsersModel();

        $user = $userModel->where('email', $data["email"])->first();

        if (!$user) {
            return false;
        }

        return password_verify($data['password'], $user['password']);
    }
}