<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Informe_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getDatosInforme($id_usuario,$id_empresa)
    {
        $this->load->database('default');

        $sql = "";

        $query       =   $this->db->query($sql);
        $informes    =   $query->result();

        return (sizeof($informes) > 0) ? $informes : null;
    }

}