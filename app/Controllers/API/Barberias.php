<?php namespace App\Controllers\API;
use App\Models\BarberiaModel;
use CodeIgniter\RESTful\ResourceController;

class Barberia extends ResourceController
{

    public function __construct(){
        $this->model = $this->setModel(new BarberiasModel());

    }
    public function index()
    {
        $barberias = $this->model->findAll();
       return $this->respond($clientes);
    
    }

    public function create()
    {
        try {

            $barberia = $this->request->getJSON();
            if($this->model->insert($barberia)):
                $barberia->id = $this->model->insert($barberia);
                return $this->respondCreated($barberia);
                else:
                    return $this->faiValidationError($this->model->validation->listErrors());
            endif;

        }catch (\Exception $e){
            return $this->faiServerError('ha ocurrido un error en el servidor');
        }

    }

    public function edit($id = null)
    {
        try {

            if($id == null)
                return $this->failValidationError('No se ha pasado un Id valido');
            
                $barberia = $this->model->find($id);

            if($barberia ==null)
            return $this->failNotFound('No se ha encontrado un cliente con el id:'.$id);

            return $this->respond($barberia);


        }catch (\Exception $e){
            return $this->faiServerError('ha ocurrido un error en el servidor');
        }
    }

    public function update($id = null)
    {
        try {

            if($id == null)
                return $this->failValidationError('No se ha pasado un Id valido');
            
                $clienteVerificado = $this->model->find($id);

            if($clienteVerificado == null)
            return $this->failNotFound('No se ha encontrado un cliente con el id:'.$id);

            $cliente = $this->request->getJSON();

            if($this->model->update($id, $cliente)):
                $cliente->id = $id;
                return $this->respondUpdate($cliente);
                else:
                    return $this->failValidationError($this->model->validation->listErrors());
            endif;


        }catch (\Exception $e){
            return $this->faiServerError('ha ocurrido un error en el servidor');
        }
    } 

    public function delete($id = null)
    {
        try {

            if($id == null)
                return $this->failValidationError('No se ha pasado un Id valido');
            
                $clienteVerificado = $this->model->find($id);

            if($clienteVerificado == null)
            return $this->failNotFound('No se ha encontrado un cliente con el id:'.$id);


            if($this->model->delete($id)):
                return $this->respondDelated($clienteVerificado);
                else:
                    return $this->failServerError('No se ha podido eliminar el registro');
            endif;


        }catch (\Exception $e){
            return $this->faiServerError('Ha ocurrido un error en el servidor');
        }
    }
}