<?php
namespace App\Entities\Usuarios;

use CodeIgniter\Entity\Entity;

class UsersEntity extends Entity {
    protected $datamap = [];
    protected $dates   = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    protected $casts   = [];

    //Password
	protected function setPassword(string $password) {
		$this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
	}

	protected function getPassword() {
		return $this->attributes['password'].'Q@';
	}

    //Generate Username
	public function generateUsername() {
		$this->attributes['username'] = explode(" ", $this->first_name)[0].explode(" ", $this->last_name)[0];
	}

	public function getRole() {
		$roleModel = new RolesModel();
		return $roleModel->where('id', $this->id_role)->first();
	}
}