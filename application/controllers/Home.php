<?php
class Home extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->library('form_validation');
        $this->load->library('Pdf');
        $this->load->library('email');
        $this->load->model('ProductsModel');
    }
    
    // CONTROLLER FOR INDEX PAGE 

    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('pages/homepage');
        $this->load->view('templates/footer');
    }
    
    // CONTROLLER FOR THE REGISTRATION PAGE 
    public function register()
    {
        // form validation done upon submit 
        $this->form_validation->set_rules('email','Email','trim|valid_email|is_unique[tbl_users.email]');
        $this->form_validation->set_rules('password','Password','trim');
        $this->form_validation->set_rules('confirm_password','Confirm Password','trim|matches[password]');

        if($this->form_validation->run()){
            // data stored in an array if form_validation is true
            $data =[
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'gender' => $this->input->post('gender'),
                'role'=>$this->input->post('role')
            ];
            // user is registered in database 
            $confirm = $this->ProductsModel->registerUser($data);
            if ($confirm) {
                // when user is registered they are given a wallet automatically with 1000 at first 
                $data =[
                    'customer_id' =>$confirm,
                    'amount_available' => 1000,
                    'created_at'  => date('Y-m-d H:m:s'),
                    'updated_at'  => date('Y-m-d H:m:s')
                ];
                $this->ProductsModel->addwallet($data);
                // user gets success message and redirected to login
                $this->session->set_flashdata('status', 'Registered Successfully');
                redirect(base_url('user/login'));
            }
        }
        $this->load->view('templates/header');
        $this->load->view('user/register');
        $this->load->view('templates/footer');
    }

    // CONTROLLER FOR LOGIN PAGE 
    
    public function login()
    {
        // form validation
        $this->form_validation->set_rules('email','Email','trim|valid_email');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()){
            //data is stored and checked if it matches with data in the database 
            $data =[
                'email'=>$this->input->post('email'),
                'password' => $this->input->post('password')
            ];
            $result = $this->ProductsModel->loginUser($data);
            if ($result) {
                // first name, last name and id is stored in a session once user is logged in
                $_SESSION['name'] = $result->first_name." ".$result->last_name;
                $_SESSION['fname'] = $result->first_name;
                $_SESSION['id'] = $result->user_id;
                $_SESSION['email'] =$result->email;
                // time and location of logged in user is saved in the database 
                $logindata=[
                    'user_id' => $_SESSION['id'],
                    'user_ip' => $_SERVER['REMOTE_ADDR'],
                    'login_time' => date('Y-m-d H:m:s'),
                    'logout_time' => ""
                ];
                $this->ProductsModel->loggedin($logindata);
                // customers are directed to the products page 
                if ($result->role == 532419) {
                    redirect(base_url("products/".$_SESSION['id']));
                //admins are directed to the dashboard 
                }else {
                    redirect(base_url('Admin/index'));
                }
            }
        }
        $this->load->view('templates/header');
		$this->load->view('user/login');
		$this->load->view('templates/footer');
    }

    //  USER PROFILE 

    public function profile($id)
    {
        if(!isset($_SESSION['name'])) {
            $this->session->set_flashdata('status', 'Please Login First');
            redirect(base_url('user/login'));
        }
        $data['userdata'] = $this->ProductsModel->getorders($id,1);

        $this->load->view('templates/header');
		$this->load->view('user/profile', $data);
		$this->load->view('templates/footer');
    }
    public function updateprofile($id)
    {
        if(!isset($_SESSION['name'])) {
            $this->session->set_flashdata('status', 'Please Login First');
            redirect(base_url('user/login'));
        }
        $this->form_validation->set_rules('password','Password','trim');
        $this->form_validation->set_rules('confirm','Confirm Password','trim|matches[password]');
        if ($this->form_validation->run()) {
            $data=[
                'first_name' => $this->input->post('firstname'),
                'last_name' => $this->input->post('lastname'),
                'password' => $this->input->post('password'),
            ];
            $this->ProductsModel->updateprofile($id,$data);
            redirect(base_url('user/profile/'.$id));
        }else {
            $this->profile($id);
        }
        
    }
    public function orderhistory($id)
    {
        if(!isset($_SESSION['name'])) {
            $this->session->set_flashdata('status', 'Please Login First');
            redirect(base_url('user/login'));
        }
        $data['userdata'] = $this->ProductsModel->getorders($id);
        $data['products'] = $this->ProductsModel->getProduct($id);

        $this->load->view('templates/header');
		$this->load->view('user/history', $data);
		$this->load->view('templates/footer');
    }

    // LOG OUT INFORMATION

    public function logout($id)
    {
        // log out time is stored 
        $data = [
            'logout_time' => date('Y-m-d H-m-s')
        ];
        $this->ProductsModel->loggedout($id,$data);
        // all sessions are unset and the cart is emptied 
        unset(
            $_SESSION['name'],
            $_SESSION['id'],
            $_SESSION['tokenid']
        );
        $this->cart->destroy();
        // user is given a success message and redirected to the homepage 
        $this->session->set_flashdata('status', 'Logged Out Successfully');
        redirect(base_url('user/login'));
    }

    // WALLET CONTROLLER 

    public function wallet($id)
    {
        //checks if user is logged in or not 
        if(!isset($_SESSION['name'])) {
            $this->session->set_flashdata('status', 'Please Login First');
            redirect(base_url('user/login'));
        }
        //retrieves wallet information for a specific user
        $data['wallet'] = $this->ProductsModel->showWallet($id);
        // sends information to wallet.php
        $this->load->view('templates/header');
		$this->load->view('user/wallet' ,$data);
		$this->load->view('templates/footer');
    }

    // USER CAN REQUEST CREDITS FROM ADMIN

    public function requestwallet()
    {
        $data = [
            'name' => $_SESSION['name'],
            'user_id' => $_SESSION['id'],
            'reason' =>$this->input->post('requestmessage'),
            'created_at' => date('Y-m-d H:m:s')
        ];
        $confirmation = $this->ProductsModel->request($data);
        if ($confirmation) {
            $this->session->set_flashdata('request','Resquest has been sent successfully');
            $this->wallet($_SESSION['id']);
        }
        
    }

    //PRODUCTS PAGE CONTROLLER

    public function products(){
        //checks if user is logged in or not
        if(!isset($_SESSION['name'])) {
            $this->session->set_flashdata('status', 'Please Login First');
            redirect(base_url('user/login'));
        }
        // shows products information 
        $data['products'] = $this->ProductsModel->getProduct();
        $data['categoryfilter'] = $this->ProductsModel->showfilters('category_name','tbl_categories');
        $data['subcategoryfilter'] = $this->ProductsModel->showfilters('subcategory_name','tbl_subcategories');

		$this->load->view('templates/header');
		$this->load->view('products/gallery', $data);
		$this->load->view('templates/footer');
    }

    // CHANGING OF FILTERS ACCORDINGLY
    public function applyfilters()
    {
        echo $this->input->post('categoryv');
        // if ($this->input->post('date')) {
        //     $data['created_at'] =$this->input->post('date');
        // }else if ($this->input->post('price')) {
        //     $data['unit_price'] =$this->input->post('price');
        //     $this->ProductsModel->applyfilters('','unit_price');
        // }else{
        //     $this->products();
        // }

        // $this->load->view('templates/header');
		// $this->load->view('products/gallery');
		// $this->load->view('templates/footer');
    }

    // CART PRODUCTS CONTROLLER 

    public function cart()
    {
        //checks if user is signed in 
        if(!isset($_SESSION['name'])) {
            $this->session->set_flashdata('status', 'Please Login First');
            redirect(base_url('user/login'));
        }
        //gets the cart contents that have been added 
        $data['cartitems'] = $this->cart->contents();
        // sends cart data to cart.php
        $this->load->view('templates/header');
		$this->load->view('products/cart', $data);
		$this->load->view('templates/footer');
    }
    
    // ADDING DATA IN CART 

    public function addtocart($id){
        $product = $this->db->where('product_id', $id)->get('tbl_product')->row();
        // adding data to the cart
        $cartdata = [
            'id' => $product->product_id,
            'qty' =>1,
            'price' => $product->unit_price,
            'name' => $product->product_name,
            'image' =>$product->product_image,
            'desc' =>$product->product_description
        ];
        $this->cart->insert($cartdata); // inserts data in cart from cart library
        $this->session->set_flashdata('cart', 'Item added to Cart'); // sends confirm message 
        $this->products();
    }

    // REMOVING DATA IN CART 

    public function removecart($rowid)
    {
        $data = array(
            'rowid' => $rowid, // codeigniter given cart library row id
            'qty'   => 0
        );
        
        $this->cart->update($data); // updates cart data with quantity being 0 hence removing it from the cart  
        redirect(base_url('products/cart/'.$_SESSION['id']));
    }

    // CONTROLLER FOR THE CHECKOUT PAGE 

    public function checkout($id)
    {
        //checks if user is logged in
        if(!isset($_SESSION['name'])) {
            $this->session->set_flashdata('status', 'Please Login First');
            redirect(base_url('user/login'));
        }
        //gets data from the database
        $data['wallet'] = $this->ProductsModel->showWallet($id); // wallet info and amount 
        $data['cartitems'] = $this->cart->contents(); // cart details
        $data['users'] = $this->ProductsModel->getusers($id); //specific user details
        //sends all that data to checkout.php
        $this->load->view('templates/header');
		$this->load->view('products/checkout',$data);
		$this->load->view('templates/footer');
    }
       
    // WHERE THE USER GETS THE RECEIPT AND IS ABLE TO DOWNLOAD IT AS A PDF

    function receipt($id){

        //checks if user is logged in
        if(!isset($_SESSION['name'])) {
            $this->session->set_flashdata('status', 'Please Login First');
            redirect(base_url('user/login'));
        }
        $data['details'] = $this->ProductsModel->getorders($id,1);// gets specific user data 
        $data['cartitems'] = $this->cart->contents(); // cart details

        
        $this->load->view('templates/header');
        $this->load->view('products/receipt',$data);
        $this->load->view('templates/footer');
    }

    // MAKES IT POSSIBLE TO GET AND DOWNLOAD RECEIPT AS A PDF

    function receiptpdf($id)
    {
        $data['userdetails'] = $this->ProductsModel->getorders($id,1);
        $data['cartitems'] = $this->cart->contents();

        $this->load->library('pdf');
        $html = $this->load->view('products/receiptpdf',$data,true);
        $this->pdf->createPDF($html, ''.$_SESSION['name'].' Receipt',true);
    }
    
}
?>