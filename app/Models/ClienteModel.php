<?php namespace App\Models;

use CodeIgniter\Model;

class ClienteModel extends Model
{
    protected $table ='cliente';
    protected $primaryKey = 'id';

    protected $returntype = 'array';
    protected $allwedFields =['nombre', 'apellidop', 'apellim', 'telefono'];

    protected $useTimestamps = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    protected $validationRules = [
        'nombre' => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellidop' => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellidom' => 'required|alpha_space|min_length[3]|max_length[75]',
        

    ]; 

    protected $validationMassages =
[

    'telefono' =>    [
    'valid_telefono' => 'Estimado usuario,debe ingresar un numero de telefono valido'
     ]
   ];     

   protected $skipValidation = false; 
}