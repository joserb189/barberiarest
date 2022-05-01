<?php namespace App\Models;

use CodeIgniter\Model;

class BarberiaModel extends Model
{
    protected $table ='barberia';
    protected $primaryKey = 'id';

    protected $returntype = 'array';
    protected $allwedFields =['descripcion', 'direccion', 'telefono'];

    protected $useTimestamps = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    protected $validationRules = [
        'barberia' => 'required',
        'cliente_id' => 'required|integer|is_:valid_cuenta',

    ]; 


   protected $skipValidation = false; 
}