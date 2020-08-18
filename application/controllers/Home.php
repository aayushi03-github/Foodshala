<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();		
		$this->load->helper('url');
		$this->load->library('session');
		$this->load->model('Common_model');
	}

	public function index()
	{
		
		$sql ="SELECT * FROM items INNER JOIN restaurant_register ON items.rid = restaurant_register.id";
		$data['itemData'] =$this->Common_model->executeSql($sql,'result_array');
		$this->load->view('menu',$data);
	}

	public function signup()
	{
		$this->load->view('signup');
	}

	public function restaurant_signup()
	{
		$this->load->library('form_validation');
		if($this->input->post('submit')=='Save'){

			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[restaurant_register.email]',
					array(
						'required'      => 'Email must have @ and.com',
						'is_unique'     => 'This Email already exists.',
						)
					);
			$data = array(
				"restaurant_name" => $this->input->post('restaurant_name'),
				"restaurant_type" => $this->input->post('restaurant_type'),
				"address" => $this->input->post('address'),
				"email" =>  $this->input->post('email'),
				"password" => md5($this->input->post('password')),
				);
			if($this->form_validation->run() !== false)
				{
			$add = $this->Common_model->insert('restaurant_register',$data);
			if($add == TRUE){
						redirect('login');
					}
				}
		else {
				$this->session->set_userdata('msg', 'Something went Wrong......');
			}
			$this->session->set_flashdata('item', 'form submitted successfully');
		}
		$this->load->view('restaurant_signup');
	}
	public function customer_signup()
	{
		$this->load->library('form_validation');
		if($this->input->post('submit')=='Submit'){
			$data = array(
				"customer_name" => $this->input->post('customer_name'),
				"phone" => $this->input->post('phone'),
				"address" => $this->input->post('address'),
				"email" =>  $this->input->post('email'),
				"password" => md5($this->input->post('password')),
				);
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[customer_register.email]',
					array(
						'required'      => 'Email must have @ and.com',
						'is_unique'     => 'This Email already exists.',
						)
					);
			$this->form_validation->set_rules(
					'phone', 'Mobile',
					'required|min_length[10]|max_length[10]|is_unique[customer_register.phone]',
					array(
						'required'      => 'Enter 10 digits number',
						'is_unique'     => 'This mobile number already exists.'
						)
					);
			if($this->form_validation->run() !== false)
				{
			$add = $this->Common_model->insert('customer_register',$data);
			if($add == TRUE){
						redirect('login');
					}
				}
		else {
				$this->session->set_userdata('msg', 'Something went Wrong......');
			}
			$this->session->set_flashdata('item', 'form submitted successfully');
		}
		$this->load->view('customer_signup');
	}

	public function login()
	{
		if($this->input->post('submit')=='login'){
			$data = array(
				"type" => $this->input->post('type'),
				"email" =>  $this->input->post('email'),
				"password" => md5($this->input->post('password')),
				);
			if($data['type']==1){
				$user = $this->Common_model->login("customer_register",$data);
				if(!empty($user)){
					$session =array(
						'logged_in' => true,
						'user_id' => $user[0]['id'],
						'user_type' => $user[0]['type'],
						'user_email' => $user[0]['email'],
						);
					$this->session->set_userdata('UserAdmin',$session);
					redirect(base_url());
				}else{ 
				$this->session->set_userdata('msg','Invalid Email And Password'); 
				}
			}else if($data['type']==2){
				$user = $this->Common_model->login("restaurant_register",$data);
				//print_r($user[0]['id']);die;
				if(!empty($user)){
					$session =array(
						'logged_in' => true,
						'user_id' => $user[0]['id'],
						'user_type' => $user[0]['type'],
						'user_email' => $user[0]['email'],
						);
					$this->session->set_userdata('RestaurantAdmin',$session);
					redirect('dashboard');
				}
				else{
					$this->session->set_userdata('msg', 'Invalid Email And Password');
				}
			}			
		}	
		$this->load->view('login');	
	}
	public function dashboard()
	{
		if(!$this->session->userdata('RestaurantAdmin')['logged_in']){
			redirect('login');
		}
		$this->load->view('admin/dashboard');
	}

	public function add_item()
	{
		if(!$this->session->userdata('RestaurantAdmin')['logged_in']){
			redirect('login');
		}
		$user_id=$this->session->userdata('RestaurantAdmin')['user_id'];
		if($this->input->post('submit')=='Save')
		{
			$image = $this->Common_model->upload_image(@$_FILES["userfile"],1,'assets/uploads/');
			$data =array(
				"rid" =>$user_id,
				"item_name" =>$this->input->post('item_name'),
				"price" => $this->input->post('price'),
				"image" => $image,
				"category"=>$this->input->post('category'),
				"other" =>$this->input->post('other'),
				);
			    
			$add = $this->Common_model->insert('items',$data);
			if(!empty($add)){
				$this->session->set_userdata('msg', 'Item Added successfully');
			}else {
				$this->session->set_userdata('msg', 'Something Went Wrong!!');
			}
		}
			$this->load->view('admin/add_item');
	
	}

	public function order()
	{
		if(!$this->session->userdata('UserAdmin')['logged_in']){
			redirect('login');
		}
		$user_id=$this->session->userdata('UserAdmin')['user_id'];
		$id = $this->uri->segment(2);
		$sql ="SELECT * FROM items INNER JOIN restaurant_register ON items.rid = restaurant_register.id where items.item_id=$id ";
		$orderData =$this->Common_model->executeSql($sql,'result_array');
		if($this->input->post('submit') == 'Checkout'){
			$data = array(
				"cid" => $user_id,
				"item_id" => $id
				);
			//print_r($data);die;
			$addOrder = $this->Common_model->insert('customer_order',$data);
			if(!empty($addOrder)){
				$this->session->set_flashdata('msg', 'Order Placed successfully');
			}else {
				$this->session->set_userdata('msg','Something went wrong');
			}
		}
		$this->load->view('order',array('orderData'=>$orderData));
	}
	public function view_order()
	{
		if(!$this->session->userdata('RestaurantAdmin')['logged_in']){
			redirect('login');
		}
		$user_id=$this->session->userdata('RestaurantAdmin')['user_id'];
		$sql ="SELECT * FROM `customer_order` INNER JOIN 
		items  on customer_order.item_id= items.item_id 
		INNER JOIN customer_register 
		ON customer_order.cid = customer_register.id
		where items.rid = $user_id";
		$data['viewData'] = $this->Common_model->executeSql($sql,'result_array');
		$this->load->view('admin/view_order',$data);
	}

	public function myorder()
	{
		if(!$this->session->userdata('UserAdmin')['logged_in']){
			redirect('login');
		}
		$user_id=$this->session->userdata('UserAdmin')['user_id'];
		$where =array('cid'=>$user_id);
		$data['orderData'] = $this->Common_model->getDataWhere('customer_order','*',$where);
		$this->load->view('myorder',$data);
	}

	public function myitems()
	{
		if(!$this->session->userdata('RestaurantAdmin')['logged_in']){
			redirect('login');
		}
		$user_id=$this->session->userdata('RestaurantAdmin')['user_id'];
		$where = array('rid'=>$user_id);
		//print_r($where);die;
		$data['itemList'] = $this->Common_model->executeSql("SELECT * from items where rid= $user_id",'result_array');
		//print_r($data);die;
		$this->load->view('admin/myitems',$data);
	}
	public function delete_item()
	{
		$con=array('item_id'=>$this->uri->segment(2));
		$res=$this->Common_model->deleteData('items',$con);
		if($res)
		{
			$this->session->set_userdata('msg', 'Item delete successfully!');
			redirect('myitems');
		}
		else
		{
			$this->session->set_userdata('msg', 'Something went Wrong......');
			redirect('myitems');
		}
	}

	public function signout()
	{
		if(session_destroy())
		{
			$this->session->unset_userdata('logged_in');
			$this->session->sess_destroy();
			redirect(base_url());
		}
	}
}
