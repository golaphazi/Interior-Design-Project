<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Design extends CI_Controller {
	public $userID;
	
	PUBLIC function  __construct(){
		 parent::__construct();
		 $this->userID     = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 0;
	}
	
	public function tem(){
		$data = array();
		
		$data['design_name'] = 'Home design template';
		$data['ipda'] = 4;
		$data['total_amount'] = 446363;
		
		$this->load->view('mail/mail-tem', $data);
	}
	
	public function search_design(){
		
		$data_1 = isset($_GET['data_1']) ? $_GET['data_1'] : '0';
		$data_2 = isset($_GET['data_2']) ? $_GET['data_2'] : '0';
		$data_3 = isset($_GET['data_3']) ? $_GET['data_3'] : '0';
		$data_4 = isset($_GET['data_4']) ? $_GET['data_4'] : '0';
		$data_5 = isset($_GET['data_5']) ? $_GET['data_5'] : '0';
		$data_6 = isset($_GET['data_6']) ? $_GET['data_6'] : '0';
		$data_7 = isset($_GET['data_7']) ? $_GET['data_7'] : '0';
		$data_8 = isset($_GET['data_8']) ? $_GET['data_8'] : '0';
		$data_9 = isset($_GET['data_9']) ? $_GET['data_9'] : '0';
		$data_10 = isset($_GET['data_10']) ? $_GET['data_10'] : '0';
		$data_11 = isset($_GET['data_11']) ? $_GET['data_11'] : '0';
		$data_12 = isset($_GET['data_12']) ? $_GET['data_12'] : '0';
		$data_13 = isset($_GET['data_13']) ? $_GET['data_13'] : '0';
		
		$dataArray = array();
		if($data_1 > 0){
			$dataArray['MODEL_D__12'] = $data_1;
		}
		if($data_2 > 0){
			$dataArray['MODEL_D__2'] = $data_2;
		}
		if($data_3 > 0){
			$dataArray['MODEL_D__3'] = $data_3;
		}
		if($data_4 > 0){
			$dataArray['MODEL_D__4'] = $data_4;
		}
		
		if($data_5 > 0){
			$dataArray['MODEL_D__5'] = $data_5;
		}
		if($data_6 > 0){
			$dataArray['MODEL_D__6'] = $data_6;
		}
		if($data_7 > 0){
			$dataArray['MODEL_D__7'] = $data_7;
		}
		if($data_8 > 0){
			$dataArray['MODEL_D__8'] = $data_8;
		}
		if($data_9 > 0){
			$dataArray['MODEL_D__9'] = $data_9;
		}
		if($data_10 > 0){
			$dataArray['MODEL_D__10'] = $data_10;
		}
		if($data_11 > 0){
			$dataArray['MODEL_D__11'] = $data_11;
		}
		$dataArray['DESIGN_UP_STATUS'] = 'Active';
		
		$this->db->select(array('IMAGE_URL', 'DESIGN_NAME_UP', 'DESIGN_UP_ID'));
		$this->db->where($dataArray);
		$results = $this->db->get('design_upload')->result_array();
		$output = '';
		if(is_array($results) AND sizeof($results) > 0){
			$li = 1;
			foreach($results AS $dataList){
				$classActive = '';
				$output .= '<div class="col-md-5 col-sm-3 col-xs-5 box-div-for-items" id="div" onclick="image_preview('.$dataList['DESIGN_UP_ID'].');" >	
							<img src="'.SITE_URL.'assets/img/demo/'.$dataList['IMAGE_URL'].'" id="myImg__'.$dataList['DESIGN_UP_ID'].'"  class="img-responsive width-fixed" alt="'.$dataList['DESIGN_NAME_UP'].'"> 
							<p class="lead">'.$dataList['DESIGN_NAME_UP'].' <br/> </p>
							<input type="hidden" value="'.$dataList['DESIGN_UP_ID'].'" name="choose_design">
						</div>';	
			}
			echo $output; exit;
		} else{
			echo 0;exit;
		}
	}
	
	public function sendEmail($to, $subject='Gelio Laft', $message='', $from='euitsols.suprt@gmail.com') {
        //$headers = '';
		$headers = "From: Gelio Laft <". strip_tags($from) . "> " . "\r\n";
        $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\nX-Mailer: PHP/" . phpversion();
		
        if(@mail($to, $subject, $message, $headers)){
			//$headers1  = '';
			$headers1 = "From: Gelio Laft ". strip_tags($to) . "" . "\r\n";
			$headers1 .= "Reply-To: ". strip_tags($to) . "\r\n";
			$headers1 .= "MIME-Version: 1.0\r\n";
			$headers1 .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
            
			@mail($from, $subject, $message, $headers1);
			
			return true;
        }else{
            return false;
        }
	}
	
	public function index()
	{
		
		$data = array();
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$data['ipda'] = 0;
		$data['total_amount'] = 0;
		$data['user'] = 0;
		$data['design_name'] = '';
							
		$modelQuery = $this->db->query("SELECT * FROM model_type WHERE `MODEL_STATUS` = 'Active' ORDER BY ORDER_BY ASC");
		$data['model_list'] = $modelQuery->result_array();
		
		$modelQuery = $this->db->query("SELECT * FROM design_upload WHERE `DESIGN_UP_STATUS` = 'Active'");
		$data['design_list'] = $modelQuery->result_array();
		
		$ip = $this->input->ip_address();
		
		$checkGetIdQuery = $this->db->query("SELECT `DESIGN_NAME`, `DESIGN_ID`, `USER_ID`, `TOTAL_AMOUNT`, `CHOOSE_DESIGN` FROM save_design WHERE `DESIGN_ID` = '".$id."' AND `IP` = '".$ip."' AND `DESIGN_STATUS` = 'Active'");
		$checkGetId = $checkGetIdQuery->result_array();
		if(is_array($checkGetId) AND sizeof($checkGetId) > 0){
			$data['ipda'] = $checkGetId[0]['DESIGN_ID'];
			$data['design_name'] = $checkGetId[0]['DESIGN_NAME'];
			$data['total_amount'] = $checkGetId[0]['TOTAL_AMOUNT'];
			$data['user'] = $checkGetId[0]['USER_ID'];
			$CHOOSE_DESIGN = $checkGetId[0]['CHOOSE_DESIGN'];
			
			$modelQuery = $this->db->query("SELECT * FROM design_upload WHERE `DESIGN_UP_ID` = '".$CHOOSE_DESIGN."' AND `DESIGN_UP_STATUS` = 'Active'");
			$data['design_list'] = $modelQuery->result_array();
		
		}
		
		if(isset($_POST['save_design'])){
			$design = array();
			$price = $this->input->post('cost_id');
			$totalSum = 0;
			if(is_array($price) AND sizeof($price) > 0){
				$totalSum = array_sum($price);
			}
			if($totalSum > 0){
				$design['DESIGN_NAME'] 	= isset($_POST['design-name']) ? $_POST['design-name'] : '';
				$design['TOTAL_AMOUNT'] = $totalSum;
				$design['LOAN_PAY'] 	= $totalSum;
				
				
				if($data['ipda'] > 0){
					
					$design['CHOOSE_DESIGN'] = isset($_POST['choose_design']) ? $_POST['choose_design'] : '0';
					
					$userD = array();
					$userD['USER_NAME'] = $this->input->post('name');
					$userD['USER_EMAIL'] = $this->input->post('email');
					$userD['USER_PHONE'] = $this->input->post('phone');
					$userD['MESSAGE'] = $this->input->post('message');
					if($this->userID == 0){
						
						$this->db->insert('user_info', $userD);
						$userID = $this->db->insert_id();
						$design['USER_ID'] 		= $userID;
						$newdata = array(
                                    'user_id' => $userID,
                                    'logged_in' => TRUE
                                );
						$this->session->set_userdata($newdata);
						
					}else{
						$this->db->update('user_info', $userD, array('USER_ID' => $this->userID));
						$design['USER_ID'] 		= $this->userID;
					}
					
					if($this->db->update('save_design', $design, array('DESIGN_ID' => $data['ipda'], 'IP' => $ip, 'USER_ID' => $this->userID))){
						if(is_array($price) AND sizeof($price) > 0){
							$model = $this->input->post('model_type_id');
							$items = $this->input->post('model_id');
							
							foreach($price AS $key=>$value):
								if($value > 0){
									$partten = array();
									$partten['DESIGN_ID'] = $data['ipda'];
									$partten['MODEL_ID'] = $model[$key];
									$partten['ITEMS_ID'] = $items[$key];
									$partten['PRICE_ITEMS'] = $value;
									$partten['DESIGN_STATUS'] = 'Active';
									
									$num = $this->db->query("SELECT * FROM design_partten WHERE DESIGN_ID = '".$data['ipda']."' AND MODEL_ID = '".$model[$key]."'");
									
									if($num->num_rows() == 0){
										$this->db->insert('design_partten', $partten);
									}else{
										$this->db->update('design_partten', $partten, array('DESIGN_ID' => $data['ipda'], 'MODEL_ID' => $model[$key]));
									}	
								}
							endforeach;
							
							$userEmailS = $userD['USER_EMAIL'];
							$subjectCloase = ''.$design['DESIGN_NAME'].' - Gelio Laft';
							
							$massege = array();
							$massege['design_name'] = $design['DESIGN_NAME'];
							$massege['ipda'] = $data['ipda'];
							$massege['total_amount'] = $totalSum;
							
							$messageBody = $this->load->view('mail/mail_tem', $massege, true);
							
							$this->sendEmail($userEmailS, $subjectCloase, $messageBody);
							
							$newdata = array('msg' => 'Takk for reservasjonen. Vi kontakter deg snart.');
							$this->session->set_userdata($newdata);
							
							
							redirect(SITE_URL . 'design');
						}
					}
				}else{
					$design['USER_ID'] 		= $this->userID;
					$design['IP'] 			= $ip;
					$design['DATE_TIME'] 	= date("Y-m-d H:i:s");
					$design['CHOOSE_DESIGN'] = isset($_POST['choose_design']) ? $_POST['choose_design'] : '0';
					$design['DESIGN_STATUS'] 	= 'Active';
					
					if($this->db->insert('save_design', $design)){
						$iid = $this->db->insert_id();
						if(is_array($price) AND sizeof($price) > 0){
							$model = $this->input->post('model_type_id');
							$items = $this->input->post('model_id');
							foreach($price AS $key=>$value):
								if($value > 0){
									$partten = array();
									$partten['DESIGN_ID'] = $iid;
									$partten['MODEL_ID'] = $model[$key];
									$partten['ITEMS_ID'] = $items[$key];
									$partten['PRICE_ITEMS'] = $value;
									$partten['DESIGN_STATUS'] = 'Active';
									$this->db->insert('design_partten', $partten);
								}
							endforeach;
						}
						redirect(SITE_URL . 'design/submit?id='.$iid);
					}
				}
			}
			
		}
		
		$this->load->view('home_content', $data);
	}
	
	
	public function submit(){
		$data = array();
		$id = isset($_GET['id']) ? $_GET['id'] : 0;
		$data['ipda'] = 0;
		$data['total_amount'] = 0;
		$data['user'] = 0;
		$data['design_name'] = '';
		$data['design_list'] = '';					
		$modelQuery = $this->db->query("SELECT * FROM model_type WHERE `MODEL_STATUS` = 'Active'");
		$data['model_list'] = $modelQuery->result_array();
		$ip = $this->input->ip_address();
		
		$checkGetIdQuery = $this->db->query("SELECT `DESIGN_NAME`, `DESIGN_ID`, `USER_ID`, `TOTAL_AMOUNT`, `CHOOSE_DESIGN` FROM save_design WHERE `DESIGN_ID` = '".$id."' AND `IP` = '".$ip."' AND `DESIGN_STATUS` = 'Active'");
		$checkGetId = $checkGetIdQuery->result_array();
		if(is_array($checkGetId) AND sizeof($checkGetId) > 0){
			$data['ipda'] = $checkGetId[0]['DESIGN_ID'];
			$data['design_name'] = $checkGetId[0]['DESIGN_NAME'];
			$data['total_amount'] = $checkGetId[0]['TOTAL_AMOUNT'];
			$data['user'] = $checkGetId[0]['USER_ID'];
			$CHOOSE_DESIGN = $checkGetId[0]['CHOOSE_DESIGN'];
			
			$modelQuery = $this->db->query("SELECT * FROM design_upload WHERE `DESIGN_UP_ID` = '".$CHOOSE_DESIGN."' AND `DESIGN_UP_STATUS` = 'Active'");
			$data['design_list'] = $modelQuery->result_array();
		}
		
		if(isset($_POST['save_design'])){
			$design = array();
			$design['DESIGN_NAME'] 	= isset($_POST['design-name']) ? $_POST['design-name'] : '';
				
			if($data['ipda'] > 0){	
				$userD = array();
				$userD['USER_NAME'] = $this->input->post('name');
				$userD['USER_EMAIL'] = $this->input->post('email');
				$userD['USER_PHONE'] = $this->input->post('phone');
				$userD['MESSAGE'] = $this->input->post('message');
				if($this->userID == 0){
					
					$this->db->insert('user_info', $userD);
					$userID = $this->db->insert_id();
					$design['USER_ID'] 		= $userID;
					$newdata = array(
								'user_id' => $userID,
								'logged_in' => TRUE
							);
					$this->session->set_userdata($newdata);
					
				}else{
					$this->db->update('user_info', $userD, array('USER_ID' => $this->userID));
					$design['USER_ID'] 		= $this->userID;
				}
				
				if($this->db->update('save_design', $design, array('DESIGN_ID' => $data['ipda'], 'IP' => $ip, 'USER_ID' => $this->userID))){
					
					$userEmailS = $userD['USER_EMAIL'];
					$subjectCloase = ''.$design['DESIGN_NAME'].' - Gelio Laft';
					
					$massege = array();
					$massege['design_name'] 	= $design['DESIGN_NAME'];
					$massege['ipda'] 			= $data['ipda'];
					$massege['total_amount'] 	= $data['total_amount'];
					
					$messageBody = $this->load->view('mail/mail_tem', $massege, true);
					
					$this->sendEmail($userEmailS, $subjectCloase, $messageBody);
					
					$newdata = array('msg' => 'Takk for reservasjonen. Vi kontakter deg snart.');
					$this->session->set_userdata($newdata);
					
					
					redirect(SITE_URL . 'design');
				}
			}
				
				
		}
		
		$this->load->view('home_content_submit', $data);
	}
	
	
	
}
