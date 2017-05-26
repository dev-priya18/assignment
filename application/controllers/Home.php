<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

header("Access-Control-Allow-Origin: *");
 class Home extends MY_Controller 
 {
	public function __construct()
	{
        parent::__construct(); 
    }
    public function index()
    {    	
		$data['template']='home/index';
		$this->load->view('templates/frontend_template',$data);
	}	
	public function template($folder, $file_name)
	{
		$this->load->view( $folder.'/'. $file_name);
	}

	public function  lang_data($key_name)
	{
		
		$data = $this->lang->line($key_name);

		echo json_encode($data);

	}

	public function _404()
	{
		$data['template']='home/error_404';
		$this->load->view('templates/frontend_template',$data);
	}

	public function error_404()
	{
		$data['template']='home/error_404';
		$this->load->view('templates/frontend_template',$data);
	} 
	 
}