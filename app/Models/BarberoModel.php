<?php namespace App\Models;

use CodeIgniter\Model;

class BarberoModel extends Model
{
    protected $table ='barbero';
    protected $primaryKey = 'id';

    protected $returntype = 'array';
    protected $allwedFields =['nombre', 'apellidop', 'apellidom','barberia_id', 'barbero_id', 'cita_id'];

    protected $useTimestamps = true;
    protected $createdField   = 'created_at';
    protected $updatedField   = 'updated_at';

    protected $validationRules = [

        'nombre' => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellidop' => 'required|alpha_space|min_length[3]|max_length[75]',
        'apellidom' => 'required|alpha_space|min_length[3]|max_length[75]',
        'direccion' => 'required|alpha_space|min_length[3]|max_length[75]',
        'barberia' => 'required|alpha_space|min_length[3]|max_length[75]',
        'cita_id' => 'required|integer|is_:valid_cuenta',




        
    ]; 

    protected $validationMassages =
[
    'barberia_id' =>[
        'is_valid_cuenta' => 'Estimado usuario, debe ingresar una cuenta valida'

    ],
    'barberia_id' =>[
        'is_valid_tipo_transaccion' => 'Estimado ususario, debe ingresar un tipo de transaccion valida'
    ]
   ];     

   protected $skipValidation = false; 

   public function TransaccionesPorCliente($clienteId = null) 
   {
     $builder = $this->db->table($this->table);
     $builder->select('barberia_id AS Cliente, cliente.nombre, cliente.apellidop, cliente.apellidom, telefono');
    
     
     $builder->select( 'barberia_id = cita_id');
     $builder->join('cliente', 'cita.cliente_id = cliente.id');
     $builder->where('cliente.id', $clienteId);
     
     $query = $builder->get();
     return $query->getResult();
   }
}