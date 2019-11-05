<?php
defined('BASEPATH') OR exit('No direct script allowed');


class Api extends CI_Controller {

    /*----------------------------------------CONSTRUCTOR----------------------------------------*/
    function __construct(){

        parent::__construct();
    }

    public function loginUsuario($USU_Usuario = "", $USU_Clave = "", $USU_Empresa ="")
    {

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');

        // request
        $postdata   = file_get_contents("php://input");
        $request    = json_decode( $postdata );

        if($USU_Usuario == ""){
            $USU_Usuario = $request->USU_Usuario;
        }
        if($USU_Clave == ""){
            $USU_Clave = $request->USU_Clave;
        }
        if($USU_Empresa == ""){
            $USU_Empresa = $request->USU_Empresa;
        }


        try {

            $this->load->model('Usuario_model');

            $model  = new Usuario_model();
            $datos  = $model->loginUsuario($USU_Usuario, $USU_Clave, $USU_Empresa);

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

    public function getDatosInforme($INF_Id = "", $INF_Empresa = "", $PARAM1 ="")
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');


        // request
        $postdata   = file_get_contents("php://input");
        $request    = json_decode( $postdata );

        if($INF_Id == ""){
            $INF_Id = $request->INF_Id;
        }
        if($INF_Empresa == ""){
            $INF_Empresa = $request->INF_Empresa;
        }
        if($PARAM1 == ""){
            $PARAM1 = $request->PARAM1;
        }


        try {

            $this->load->model('Informe_model');

            $model  = new Informe_model();

            /*
            $datos  = $model->getDatosInforme($INF_Id, $INF_Empresa, $PARAM1);

            if($datos != null){
                echo json_encode(array('result' => 'success','data' => $datos));
            } else {
                echo json_encode(array('result' => 'error'));
            }

            */

            echo json_encode(array($INF_Id, $INF_Empresa, $PARAM1));

        }
        catch( Exception $error ) {
            echo 'error';
        }

    }


    public function informesUsuario($USU_Id = "", $USU_Empresa = "")
    {
        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');

        // request
         $postdata   = file_get_contents("php://input");
         $request    = json_decode( $postdata );

        if($USU_Id == ""){
            $USU_Id         = $request->USU_Id;
        }
        if($USU_Empresa == ""){
            $USU_Empresa    = $request->USU_Empresa;
        }

        try {
            $this->load->model('Usuario_model');

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