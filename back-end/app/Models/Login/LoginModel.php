<?php
namespace App\Models\Login;

use CodeIgniter\Model;

class LoginModel extends Model {
    protected $DBGroup = 'default';
    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;    
    protected $returnType = 'array';
    protected $useSoftDelete = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'email',
        'password'
    ];

    //Validations
    protected $validationRules = [
        'email' => [
            'rules' => 'required|min_length[3]|max_length[100]|valid_email',
            'errors' => [
                'required' => 'O campo (E-mail) é obrigatório.',
                'min_length' => 'O campo (E-mail) deve ter no mínimo 3 caracteres.',
                'max_length' => 'O campo (E-mail) deve ter no máximo 100 caracteres.',
                'valid_email' => 'Por favor, verifique o campo (E-mail). O E-mail informado não é válido.'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]|max_length[14]',
            //'rules' => 'required|min_length[8]|max_length[14]|userCheckout[email, password]',
            'errors' => [
                'required' => 'O campo (Senha) é obrigatório.',
                'min_length' => 'O campo (Senha) deve ter no mínimo 8 caracteres.',
                'max_length' => 'O campo (Senha) deve ter no máximo 14 caracteres.',
                //'userCheckout' => 'Usuário ou Senha incorretos.'
            ]
        ]
    ];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
	protected $allowCallbacks = true;
    protected $beforeInsert = ['beforeInsert'];
    protected $afterInsert = [];
    protected $beforeUpdate = ['beforeUpdate'];
    protected $afterUpdate = [];
	protected $beforeFind = [];
	protected $afterFind = [];
	protected $beforeDelete = [];
	protected $afterDelete = [];
}