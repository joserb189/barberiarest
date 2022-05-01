<?php namespace App\Models;

use CodeIgniter\Model;

class CitaModel extends Model
{
    protected $table ='cita';
    protected $primaryKey = 'id';

    protected $returntype = 'array';
    protected $allwedFields =['nombre', 'apellidop', 'apellidom', 'cita_id'];

    protected $useTimestamps = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    protected $validationRules = [
        'nombre' => 'required|alpha_space|min_lenght[3]|max_length[3]',
        'apellidop' => 'required|numeric',
        'apellidom' => 'required|numeric',
        'cita_id' => 'required|integer|is_valid_cita|is_allow_cita',
       
    ];     

    protected $validationMassages =
[

    'cita_id' =>    [
    'is_valid_cliente' => 'Estimado usuario, debe ingresar un cliente valido',
    'is_allow_cliente' => 'Estimado usuario, debe ingresar un cliente de la lista permitida'
     ]
   ];  

   protected $skipValidation = false; 
}