<?php
namespace App\Models\Articles;

use CodeIgniter\Model;
use Exception;

class ArticlesModel extends Model {
    protected $DBGroup              = 'default';
    protected $table                = 'tbl_articles';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'id',
        'image',
		'article_name',
        'slug',
        'text',
        'total_access',
		'id_subcategorie',
		'id_status',
		'id_user_created',
		'id_user_updated',
		'id_user_deleted',
		'created_at',
		'updated_at',
		'deleted_at'
    ];

    // Dates
    protected $useTimestamps        = true;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];

    //SubQuery (NÃO EXCLUIR - MÉTODO FUNCIONA!!!)
    // public function getArticlesBySubcategorieID(int $id_subcategorie) {
	// 	try {
    //         $query = $this->query("
    //             SELECT 
    //             a.*,
    //             (SELECT s.slug FROM tbl_subcategories AS s WHERE a.id_subcategorie = s.id) AS subcategorie_slug
    //             FROM tbl_articles AS a
    //             WHERE 
    //             a.id_subcategorie = $id_subcategorie AND 
    //             a.id_status <> 3
    //         ");
			
    //         return $query->getResult();
    //     } catch (Exception $e) {
    //         die($e->getMessage());
    //     }
	// }

    //InnerJoin
    public function getArticlesBySubcategorieID(int $id_subcategorie) {
		try {
            $query = $this->query("
                SELECT 
                a.*,
                s.slug AS subcategorie_slug
                FROM tbl_articles AS a
                INNER JOIN tbl_subcategories AS s ON (a.id_subcategorie = s.id)
                WHERE 
                a.id_subcategorie = $id_subcategorie AND 
                a.id_status <> 3
            ");
			
            return $query->getResult();
        } catch (Exception $e) {
            die($e->getMessage());
        }
	}

    public function getArticlesBySubcategorieSlug(string $subcategorie_slug) {
        try {
            $this->select('
                a.*,
                s.slug AS subcategorie_slug
            ');
            $this->from('tbl_articles AS a');
            $this->join('tbl_subcategories AS s', 'a.id_subcategorie = s.id');
            $this->where('s.slug', $subcategorie_slug);
            $this->where('a.id_status <>', 3);
            return $this->asObject()->findAll();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}