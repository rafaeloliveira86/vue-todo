<?php
namespace App\Models\Users;

use CodeIgniter\Model;
use App\Entities\Users\UsersEntity;
use Exception;

class UsersModel extends Model {
    protected $DBGroup = 'default';
    protected $table = 'tbl_users';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;    
    //protected $returnType = 'array';
    protected $returnType = UsersEntity::class;
    protected $useSoftDelete = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id',
        'avatar',
        'first_name', 
        'last_name',
        'gender',
        'email',
        'password',
        'id_role',
        'id_status',
		'id_user_created',
		'id_user_updated',
		'id_user_deleted',
		'created_at',
		'updated_at',
		'deleted_at'
    ];

    //Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    //Validations
    protected $validationRules = [
        'first_name' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'O campo (Nome) é obrigatório.',
                'min_length' => 'O campo (Nome) deve ter no mínimo 3 caracteres.',
                'max_length' => 'O campo (Nome) deve ter no máximo 100 caracteres.'
            ]
        ],
        'last_name' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'O campo (Sobrenome) é obrigatório.',
                'min_length' => 'O campo (Sobrenome) deve ter no mínimo 3 caracteres.',
                'max_length' => 'O campo (Sobrenome) deve ter no máximo 100 caracteres.'
            ]
        ],
        'gender' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'O campo (Sexo) é obrigatório.'
            ]
        ],
        'email' => [
            'rules' => 'required|min_length[3]|max_length[100]|valid_email|is_unique[users.email]',
            'errors' => [
                'required' => 'O campo (E-mail) é obrigatório.',
                'min_length' => 'O campo (E-mail) deve ter no mínimo 3 caracteres.',
                'max_length' => 'O campo (E-mail) deve ter no máximo 100 caracteres.',
                'valid_email' => 'Por favor, verifique o campo (E-mail). O E-mail informado não é válido.',
                'is_unique' => 'O E-mail informado já existe na base de dados. Por favor, informe outro E-mail válido.'
            ]
        ],
        'password' => [
            'rules' => 'required|min_length[8]|max_length[14]',
            'errors' => [
                'required' => 'O campo (Senha) é obrigatório.',
                'min_length' => 'O campo (Senha) deve ter no mínimo 8 caracteres.',
                'max_length' => 'O campo (Senha) deve ter no máximo 14 caracteres.',
            ]
        ],
        'password_confirm' => [
            'rules' => 'matches[password]',
            'errors' => [
                'required' => 'O campo (Confirmar Senha) é obrigatório.',
                'matches' => 'Os campos (Senha e Confirmar Senha) não conferem.'
            ]
        ],
        'id_status' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'O campo (Status) é obrigatório.'
            ]
        ],
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

    /**
     * Set Validation Rules to Updates
     * 
     * @param array $data The input data
     */
    public function setUpdateRules($data) {
        $rules = [];

        if (isset($data['first_name'])) {
            $rules = [
                'first_name' => [
                    'rules' => 'min_length[3]|max_length[100]',
                    'errors' => [
                        'min_length' => 'O campo (Nome) deve ter no mínimo 3 caracteres.',
                        'max_length' => 'O campo (Nome) deve ter no máximo 100 caracteres.'
                    ]
                ]
            ];
        }

        if (isset($data['last_name'])) {
            $rules = [
                'last_name' => [
                    'rules' => 'min_length[3]|max_length[100]',
                    'errors' => [
                        'min_length' => 'O campo (Sobrenome) deve ter no mínimo 3 caracteres.',
                        'max_length' => 'O campo (Sobrenome) deve ter no máximo 100 caracteres.'
                    ]
                ]
            ];
        }

        if (isset($data['email'])) {
            $rules = [
                'email' => [
                    'rules' => 'min_length[3]|max_length[100]|valid_email|is_unique[users.email]',
                    'errors' => [
                        'min_length' => 'O campo (E-mail) deve ter no mínimo 3 caracteres.',
                        'max_length' => 'O campo (E-mail) deve ter no máximo 100 caracteres.',
                        'valid_email' => 'Por favor, verifique o campo (E-mail). O E-mail informado não é válido.',
                        'is_unique' => 'O E-mail informado já existe na base de dados. Por favor, informe outro E-mail válido.'
                    ]
                ]
            ];
        }

        if (isset($data['password'])) {
            $rules = [
                'password' => [
                    'rules' => 'min_length[8]|max_length[14]',
                    'errors' => [
                        'min_length' => 'O campo (Senha) deve ter no mínimo 8 caracteres.',
                        'max_length' => 'O campo (Senha) deve ter no máximo 14 caracteres.',
                    ]
                ]
            ];
        }

        if (isset($data['password_confirm'])) {
            $rules = [
                'password_confirm' => [
                    'rules' => 'matches[password]',
                    'errors' => [
                        'required' => 'O campo (Confirmar Senha) é obrigatório.',
                        'matches' => 'Os campos (Senha e Confirmar Senha) não conferem.'
                    ]
                ]
            ];
        }

        $this->validationRules = $rules;
    }

    protected function beforeInsert(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function beforeUpdate(array $data) {
        $data = $this->passwordHash($data);
        return $data;
    }

    protected function passwordHash(array $data) {
        if (isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    protected $assignRole;

    protected function addRole($data) {
        $data['data']['id_role'] = $this->assignRole;
        return $data;
    }

    public function withRole(string $role) {
        $row = $this->db->table('tbl_roles')->where('role_name', $role)->get()->getFirstRow();

        if ($row !== null) {
            $this->assignRole = $row->id;
        }
    }

    public function getUserBy(string $column, string $value) {
        return $this->where($column, $value)->first();
    }

    public function recoveryUserID() {
        try {
            $this->select('id');
            $this->orderBy('id', 'desc');
            $this->limit(1);
            return $this->asObject()->first();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}