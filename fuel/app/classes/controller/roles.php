<?php 

use \Firebase\JWT\JWT;

class Controller_Roles extends Controller_Rest
{
    private $key = "juf3dhu3hufdchv3xui3ucxj";

    private $getEmail = "";

                                    //Crear usuario
    public function post_create()
    {
        try {
            if ( ! isset($_POST['tipo']) ) 
            {
                $json = $this->response(array(
                    'code' => 400,
                    'message' => 'Error en las credenciales, prueba otra vez',
                    'data' => []
                ));

                return $json;
            }
            $input = $_POST;
            
                $roles = new Model_Roles();
                $roles->tipo= $input['tipo'];
               
            if ($roles->tipo == "" )
                {
                    $json = $this->response(array(
                        'code' => 400,
                        'message' => 'Se necesita introducir todos los parametros',
                        'data' => []
                    ));
                }
                else
                {


                    $roles->save();
                    
                    

                    $json = $this->response(array(
                        'code' => 200,
                        'message' => 'Rol creado correctamente',
                        'data' => $roles
                    ));

                    return $json;
                }
            
            
        } 
        catch (Exception $e) 
        {
           
                $json = $this->response(array(
                    'code' => 500,
                    'message' => $e->getMessage(),
                    'data' => []
                ));

                return $json;

            
        }        
    }
}    
