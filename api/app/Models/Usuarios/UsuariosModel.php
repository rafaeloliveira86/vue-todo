<?php
namespace App\Models\Usuarios;

use CodeIgniter\Model;
use App\Entities\Usuarios\UsuariosEntity;
use Exception;

class UsuariosModel extends Model {
    protected $DBGroup = 'default';
    protected $table = 'tbl_usuarios';
    protected $primaryKey = 'id';
    protected $useAutoIncrement = true;
    protected $insertID = 0;    
    //protected $returnType = 'array';
    protected $returnType = UsuariosEntity::class;
    protected $useSoftDelete = false;
    protected $protectFields = true;
    protected $allowedFields = [
        'id',
        'avatar',
        'nome', 
        'sobrenome',
        'genero',
        'email',
        'senha',
        'id_permissao',
        'id_status',
		'id_usuario_criado',
		'id_usuario_atualizado',
		'id_usuario_excluido',
		'criado_em',
		'atualizado_em',
		'excluido_em'
    ];

    //Dates
    protected $useTimestamps = true;
    protected $dateFormat = 'datetime';
    protected $createdField = 'criado_em';
    protected $updatedField = 'atualizado_em';
    protected $deletedField = 'excluido_em';

    //Validations
    protected $validationRules = [
        'nome' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'O campo (Nome) é obrigatório.',
                'min_length' => 'O campo (Nome) deve ter no mínimo 3 caracteres.',
                'max_length' => 'O campo (Nome) deve ter no máximo 100 caracteres.'
            ]
        ],
        'sobrenome' => [
            'rules' => 'required|min_length[3]|max_length[100]',
            'errors' => [
                'required' => 'O campo (Sobrenome) é obrigatório.',
                'min_length' => 'O campo (Sobrenome) deve ter no mínimo 3 caracteres.',
                'max_length' => 'O campo (Sobrenome) deve ter no máximo 100 caracteres.'
            ]
        ],
        'genero' => [
            'rules' => 'required',
            'errors' => [
                'required' => 'O campo (Sexo) é obrigatório.'
            ]
        ],
        'email' => [
            'rules' => 'required|min_length[3]|max_length[100]|valid_email|is_unique[usuarios.email]',
            'errors' => [
                'required' => 'O campo (E-mail) é obrigatório.',
                'min_length' => 'O campo (E-mail) deve ter no mínimo 3 caracteres.',
                'max_length' => 'O campo (E-mail) deve ter no máximo 100 caracteres.',
                'valid_email' => 'Por favor, verifique o campo (E-mail). O E-mail informado não é válido.',
                'is_unique' => 'O E-mail informado já existe na base de dados. Por favor, informe outro E-mail válido.'
            ]
        ],
        'senha' => [
            'rules' => 'required|min_length[8]|max_length[14]',
            'errors' => [
                'required' => 'O campo (Senha) é obrigatório.',
                'min_length' => 'O campo (Senha) deve ter no mínimo 8 caracteres.',
                'max_length' => 'O campo (Senha) deve ter no máximo 14 caracteres.',
            ]
        ],
        'confirmar_senha' => [
            'rules' => 'matches[senha]',
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

        if (isset($data['nome'])) {
            $rules = [
                'nome' => [
                    'rules' => 'min_length[3]|max_length[100]',
                    'errors' => [
                        'min_length' => 'O campo (Nome) deve ter no mínimo 3 caracteres.',
                        'max_length' => 'O campo (Nome) deve ter no máximo 100 caracteres.'
                    ]
                ]
            ];
        }

        if (isset($data['sobrenome'])) {
            $rules = [
                'sobrenome' => [
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

        if (isset($data['senha'])) {
            $rules = [
                'senha' => [
                    'rules' => 'min_length[8]|max_length[14]',
                    'errors' => [
                        'min_length' => 'O campo (Senha) deve ter no mínimo 8 caracteres.',
                        'max_length' => 'O campo (Senha) deve ter no máximo 14 caracteres.',
                    ]
                ]
            ];
        }

        if (isset($data['confirmar_senha'])) {
            $rules = [
                'confirmar_senha' => [
                    'rules' => 'matches[senha]',
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
        if (isset($data['data']['senha'])) {
            $data['data']['senha'] = password_hash($data['data']['senha'], PASSWORD_DEFAULT);
        }
        return $data;
    }

    protected $assignRole;

    protected function addRole($data) {
        $data['data']['id_role'] = $this->assignRole;
        return $data;
    }

    public function withRole(string $role) {
        $row = $this->db->table('permissoes')->where('role_name', $role)->get()->getFirstRow();

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