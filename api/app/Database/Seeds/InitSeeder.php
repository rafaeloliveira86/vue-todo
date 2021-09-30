<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InitSeeder extends Seeder {
    public function run() {
        $this->call('CategoriasSeeder');
		$this->call('StatusSeeder');
        $this->call('UnidadesSeeder');
    }
}