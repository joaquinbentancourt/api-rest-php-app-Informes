<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }


    public function loginUsuario($user,$pass,$empresa){
        $this->load->database('default');

        $sql = "SELECT  usuario.*
                FROM  usuario
                JOIN empresa ON EMP_Id = USU_Empresa
                WHERE USU_Empresa   = ".$empresa."
                AND   USU_Usuario   = '".$user."'
                AND   USU_Clave     = '".trim($pass)."'
                AND   USU_Estado    = 1
                AND   EMP_Estado    = 1 ";

        $query       =   $this->db->query($sql);
        $usuario     =   $query->result();

        return (sizeof($usuario) > 0) ? $usuario[0] : null;
    }
    public function getInformesUsuario($id_usuario,$id_empresa)
    {
        $this->load->database('default');

        $sql = "SELECT informe.*, categoria.*
                FROM usuario
                JOIN empresa ON EMP_Id = USU_Empresa
                JOIN usuario_rol ON USR_USU_Id = USU_Id AND USR_USU_Empresa = EMP_Id
                JOIN rol ON ROL_Id = USR_ROL_Id AND ROL_Empresa = USR_USU_Empresa
                JOIN informe_rol ON INR_ROL_Id = ROL_Id AND INR_Empresa = ROL_Empresa
                JOIN informe ON INF_Id = INR_INF_Id AND INF_Empresa = INR_Empresa
                LEFT JOIN informe_categoria ON INC_INF_Id = INF_Id AND INC_INF_Empresa = INF_Empresa
                LEFT JOIN categoria ON CAT_Id = INC_CAT_Id AND  CAT_Empresa = INC_INF_Empresa

                WHERE USU_Empresa   = ".$id_empresa."
                AND   USU_Id        = ".$id_usuario."
                AND   USU_Estado    = 1
                AND   INF_Estado    = 1
                AND   EMP_Estado    = 1 ";

        $query       =   $this->db->query($sql);
        $informes    =   $query->result();

        return (sizeof($informes) > 0) ? $informes : null;
    }

}