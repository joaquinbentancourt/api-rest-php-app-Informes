<?php
defined('BASEPATH') OR exit('No direct script allowed');

/*----------------------------------------REQUIRE THIS PLUGIN----------------------------------------*/
require APPPATH . '/libraries/REST_Controller.php';
//use Restserver\Libraries\REST_Controller;

class Usuarios extends REST_Controller{
	/*----------------------------------------CONSTRUCTOR----------------------------------------*/
	function __construct($config = 'rest'){

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        header("Access-Control-Allow-Headers: Content-Type, Content-Length, Accept-Encoding");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');

        parent::__construct();

        $this->load->helper('url');
        $this->load->model('User_model');
    }

	/*----------------------------------------GET KONTAK----------------------------------------*/

}
?>