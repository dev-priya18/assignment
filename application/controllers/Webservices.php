<?php if( ! defined('BASEPATH')) exit('No direct script access allowed');
require APPPATH.'libraries/REST_Controller.php';
class Webservices extends REST_Controller 
{
	public function __construct()
	{
	    parent::__construct();
	    clear_cache();
	    $this->load->model('common_model');
	    if(isset($_SERVER["CONTENT_TYPE"]) && strpos($_SERVER["CONTENT_TYPE"], "application/json") !== false) {
		    $_POST = array_merge($_POST, (array) json_decode(trim(file_get_contents('php://input')), true));
		}
	}
	/*Get all type of question*/
	public function getType_get($id='')
  	{
  		$this->response_array['response_code'] = 500;
		$this->response_array['message'] = "Invalid Form Request";	
		$data = array();
  		$detail = $this->common_model->get_result('type',array('status'=>1),array('type_id','type'));
  		if(!empty($detail))
  		{
  			$data['detail'] = $detail;
  			$this->response_array['response_code'] = 200;				
			$this->response_array['message'] = "Data Get successfully .";
			$this->response_array['data'] = $data;		
  		}
  		$this->api_response();
  	}
  	/*Insert question & answer*/
    public function assignmentForm_post()
	{
       
        if (isset($_POST) && !empty($_POST))  
        {
  	    	foreach($_POST as $assignment)
  	    	{
				if(empty($assignment['type']))
				{
					$assignment['type'] = 0;
				}
				if(empty($assignment['type']))
				{
					$assignment['assignment_type'] = 0;
				}
				$ass_data = array(
				 					'question' => $assignment['title'],
				 					'parent_id'=> 0,
				 					'type'=> $assignment['type'],
				 					'answer'=> $assignment['assignment_type']
				 			);

				$id=$this->common_model->insert('assignment',$ass_data);

				if(!empty($assignment['nodes']))
				{
					$this->recursion_insert($assignment['nodes'],$id);
				}
					
			}	
			$this->response_array['response_code'] = 200;				
			$this->response_array['message'] = "Assignment submit successfully.";	
		} 
		else
		{
		 	$this->response_array['response_code'] = 500;
			$this->response_array['message'] = "Invalid Details, Please try again";	
			$this->response_array['error'] =  'Please fill correct value';
			
		}
	  	$this->api_response();
	    	 
	}
	private function recursion_insert($nodeValue='',$parent_id=''){
		if(!empty($nodeValue))
		{
			foreach($nodeValue as $nodeVal)
		    {
    			if(empty($nodeVal['type']))
				{
					$nodeVal['type'] = 0;
				}
				if(empty($nodeVal['type']))
				{
					$nodeVal['assignment_type'] = 0;
				}
    			$ass_data = array(
							'question' => $nodeVal['title'],
							'parent_id'=> $parent_id,
							'type'=> $nodeVal['type'],
							'answer'=> $nodeVal['assignment_type']
					);
				$id=$this->common_model->insert('assignment',$ass_data);
				if(!empty($nodeVal['nodes']))
				{
					if($nodeVal['type'] == 3)
						$this->recursion_insert($nodeVal['nodes'],$id);
					else
						$this->recursion_insert($nodeVal['nodes'],$id);
				}
			}
		}else{
			return false;
		}	
	}



 }
