<?php
defined('BASEPATH') OR exit('No direct script allowed');

/*----------------------------------------REQUIRE THIS PLUGIN----------------------------------------*/
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class RestApi extends REST_Controller{
    /*----------------------------------------CONSTRUCTOR----------------------------------------*/
    function __construct($config = 'rest'){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('Usuario_model');
    }

    /*----------------------------------------GET KONTAK----------------------------------------*/


    public function informes_usuario_get($USU_Id = "",$USU_Empresa = "")
    {
        // request
        // $postdata   = file_get_contents("php://input");
        // $request    = json_decode( $postdata );

        try {
            $model  = new Usuario_model();
            $datos  = $model->getInformesUsuario($USU_Id,$USU_Empresa);

            if($datos != null){
                echo json_encode(array('result' => 'success','data' => $datos));
            } else {
                echo json_encode(array('result' => 'error'));
            }
        }
        catch( Exception $error ) {
            echo 'error';
        }

    }

}


?>