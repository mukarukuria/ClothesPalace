<?php
class Admin extends CI_Controller{
    // CONSTRUCT
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation'); // form validation library
        $this->load->library('cart'); // cart library 
        $this->load->model('ProductsModel'); //links to our model
    }

    // LINKS TO THE DASHBOARD IF ADMIN IS LOGGED IN

    function index(){
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        $data['user'] = $this->ProductsModel->getusers();
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();

        $this->load->view('dashboard/header',$notificationdata);
        $this->load->view('dashboard/index',$data);
        $this->load->view('dashboard/footer');
    }

    //UPLOAD IMAGE CONTROLLER FOR ADMIN

    function upload(){
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        //simple form validation
        $this->form_validation->set_rules('product_name', 'product Name', 'trim|required');
        $this->form_validation->set_rules('product_description', 'product description', 'trim|required');
        $this->form_validation->set_rules('product_price', 'product price', 'trim|required');
        $this->form_validation->set_rules('product_discount', 'product discount', 'trim|required');
        $this->form_validation->set_rules('product_quantity', 'product quantity', 'trim|required');
        $this->form_validation->set_rules('product_category', 'product category', 'trim|required');

        //if everything in form is correct image is checked
        if($this->form_validation->run()){
            $original_name =$_FILES['product_image']['name'];
            //gives the image a unique value just incase 
            $new_name =time(). "" . str_replace('','-',$original_name);
            // configure image specification
            $config =[
                'upload_path' => './assets/pictures/database/',
                'allowed_types'=> 'jpg|png|gif|jfif|gif',
                'file_name' =>$new_name
            ];
            // upload library helps with the upload 
            $this->load->library('upload',$config);
            echo '<pre>';
                print_r($config);
                echo '</pre>';
            
            if(! $this->upload->do_upload('product_image')){
                // displays error if image format is incorrect 
                $imageError =array('imageError'=> $this->upload->data());
                echo '<pre>';
                print_r($imageError);
                echo '</pre>';
            }else{
                echo '<pre>';
                print_r($this->upload->data());
                echo '</pre>';

                // if image is in correct stature it is saved in the database 
                // $product_name = $this->upload->data('file_name');
                // $data=[
                //     'product_name' =>$this->input->post('product_name'),
                //     'product_description' => $this->input->post('product_description'),
                //     'product_image'=> $product_name,
                //     'unit_price' =>$this->input->post('product_price'),
                //     'discounted_price' =>$this->input->post('product_discount'),
                //     'available_quantity' =>$this->input->post('product_quantity'),
                //     'subcategory_id' =>$this->input->post('product_category'),
                //     'added_by' => $_SESSION['id']
                // ];
                // $result = $this->ProductsModel->insertProduct($data);
                // if ($result) {
                //     // data is added as an api product under transactions
                //     $productdata = [
                //         'product_name' => 'transactions',
                //         'added_by' => $_SESSION['id'],
                //         'created_at' => date('Y-m-d H:m:s')
                //     ];
                //     $this->ProductsModel->apiproducts($productdata);
                // }
                // $this->session->set_flashdata('status','Product Inserted Successfully');
            }
        }
        $data['category'] = $this->ProductsModel->getcategories();
        $this->load->view('templates/header');
		$this->load->view('dashboard/products/uploadimage', $data);
		$this->load->view('templates/footer');
    }
    
    // CONTROLLER FOR ALL PRODUCTS IN DATABASE 

    function inventory(){
        // checks if user/admin is logged in
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        // gets all products which are not deleted from database to present in table
        $data['products'] = $this->ProductsModel->getProduct();
        $data['deleted'] = 'FALSE';
        $data['title'] = 'Inventory';
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();


        // displays data in inventory.php
        $this->load->view('dashboard/header',$notificationdata);
        $this->load->view('dashboard/products/inventory',$data);
        $this->load->view('dashboard/footer');
    }
    
    // CONTROLLER FOR ALL DELETED PRODUCTS IN DATABASE 

    function deletedproducts(){
        // checks if user is logged in or not
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        // gets all products from database which have been deleted  and presents them in a different table
        $data['products'] = $this->ProductsModel->getdeleted();
        $data['title'] = 'Deleted Inventory';
        $data['deleted'] = 'TRUE';
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();

        
        // displays data in inventory.php
        $this->load->view('dashboard/header',$notificationdata);
        $this->load->view('dashboard/products/inventory',$data);
        $this->load->view('dashboard/footer');
    }

    // CONTROLLER TO EDIT A PRODUCT IF NEED BE 
    
    function editimage($id){
        // checks if user is logged in or not 
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        //perfoms simple form validation
        $this->form_validation->set_rules('product_name', 'product Name', 'trim|required');
        $this->form_validation->set_rules('product_description', 'product description', 'trim|required');
        $this->form_validation->set_rules('product_price', 'product price', 'trim|required');
        $this->form_validation->set_rules('product_discount', 'product discount', 'trim|required');
        $this->form_validation->set_rules('product_quantity', 'product quantity', 'trim|required');
        $this->form_validation->set_rules('product_category', 'product category', 'trim|required');
        if ($this->form_validation->run()) {
            // takes in new data inserted in the form
            $data=[
                'product_name' =>$this->input->post('product_name'),
                'product_description' => $this->input->post('product_description'),
                'unit_price' =>$this->input->post('product_price'),
                'discounted_price' =>$this->input->post('product_discount'),
                'available_quantity' =>$this->input->post('product_quantity'),
                'updated_at' =>date("Y-m-d h:m:s"),
                'added_by' => $_SESSION['id']
            ];
            // updates the data given accordingly
            $result = $this->ProductsModel->updateproduct($id,$data);
            $this->session->set_flashdata('status','Product Updated Successfully');
            redirect('admin/gallery');
            
        }
        //gets the specific product to be edited and echos the original values 
        $data['product'] = $this->ProductsModel->getProduct($id);
        $data['category'] = $this->ProductsModel->getcategories();

        $this->load->view('templates/header');
		$this->load->view('dashboard/products/editimage',$data);
		$this->load->view('templates/footer');
    }
    
    // VIEW AND ADD CATEGORIES 

    function category(){
        // checks if user is logged in or not 
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }

        $data['title'] = 'Categories'; // gives page title 
        $data['categories'] = $this->ProductsModel->getcategories(); //gets categories and subcategories from database 
        //notifications
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();

        // sends userdata to userslist.php
        $this->load->view('dashboard/header',$notificationdata);
		$this->load->view('dashboard/products/newcategory',$data);
		$this->load->view('dashboard/footer');
    }
     
    // EDIT AND SAVE ANY NEW CATEGORIES 

    function newcategory(){
        $this->form_validation->set_rules('categoryname','Category','trim|required');
        $this->form_validation->set_rules('subcategoryname','Sub-Category','trim|required');

        if ($this->form_validation->run() == TRUE) {
            $data = [
                'category_name' => $this->input->post('categoryname'),
                'is_deleted' => 0
            ];
            $category = $this->ProductsModel->addcategory($data);
            if ($category) {
                $subdata = [
                    'subcategory_name' => $this->input->post('subcategoryname'),
                    'category' => $category,
                    'is_deleted' => 0
                ];
                $this->ProductsModel->addsubcategory($subdata);
                $this->session->set_flashdata('category', 'Category has been added');
                $this->category();
            }
        }
    }

    //DELETING A CATEGORY
     
    function deletecategory($id){
        $data = [
            'is_deleted' => 1
        ];
        $this->ProductsModel->deletecategory($id,$data);
        $this->session->set_flashdata('category', 'Category has been deleted');
        $this->category();
    }
    function editcategory($id){

        $data = [
            'category_name' => $this->input->post('categoryname'),
            'is_deleted' => 0
        ];
        $category = $this->ProductsModel->editcategory($id,$data);
    
        $this->session->set_flashdata('category', 'Category has been edited');
        $this->category();

    }

    // DELETING AND RESTORING A PRODUCT IN DATABASE 
    
    function deleteproduct($id){
        //deletes product by changing the is_deleted to 1
        $num = 1;
        $this->ProductsModel->removeproduct($id,$num);
        redirect('admin/gallery');
    }
    function restoreproduct($id){
        // restores a product by changing is_deleted back to 0
        $num = 0;
        $this->ProductsModel->removeproduct($id,$num);
        redirect('admin/deleted');
    }

    // CONTROLLER FOR ALL USERS SAVED IN THE DATABASE 

    function user(){ 
        // checks if admin is logged in
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        // gets users form the database 
        $data['user'] = $this->ProductsModel->getusers();
        $data['title'] = 'Users';
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();

        // sends userdata to userslist.php
        $this->load->view('dashboard/header',$notificationdata);
		$this->load->view('dashboard/users/userslist',$data);
		$this->load->view('dashboard/footer');
    }
    
    // DELETES A USER FROM DATABASE 

    function deleteuser($id){
        $this->ProductsModel->removeuser($id);
        redirect('admin/users');
    }

    // EDITS A USER'S INFORMATION

    function edituser($id){
        // checks if user is logged in or not 
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        //simple form validation
        $this->form_validation->set_rules('email','Email','trim|required');
        $this->form_validation->set_rules('password','Password','trim|required');

        if($this->form_validation->run()){
            // saves new data in array
            $data =[
                'first_name' => $this->input->post('first_name'),
                'last_name' => $this->input->post('last_name'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role'=>$this->input->post('role'),
                'updated_at' => date('Y-m-d H:m:s')
            ];
            // updates new data accordingly
            $this->ProductsModel->updateuser($id,$data);
            $this->session->set_flashdata('status','User Updated Successfully');
            redirect('admin/users');
        }
        //gets a specific user
        $data['user'] = $this->ProductsModel->getusers($id);

        $this->load->view('templates/header');
		$this->load->view('dashboard/users/edituser',$data);
		$this->load->view('templates/footer');
    }

    // GETS LOGIN DETAILS OF ALL USERS 

    function logindetails(){
        // checks if user is logged in or not 
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        //gets login details
        $data['logindetails'] =  $this->ProductsModel->getlogindetails();    
        $data['title'] = 'Login Details ';
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();

        // sends login details to loginf=details.php
        $this->load->view('dashboard/header',$notificationdata);
		$this->load->view('dashboard/users/logindetails',$data);
		$this->load->view('dashboard/footer');
    }

    //GETS LOGIN DETAILS OF A SPECIFIC USER 

    function logindetail($id){
        // checks if user is logged in or not 
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
         
        $data['logindetails'] = $this->ProductsModel->getlogindetails($id);    
        $data['title'] = 'Login Details';
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();


        $this->load->view('dashboard/header',$notificationdata);
		$this->load->view('dashboard/users/logindetails',$data);
		$this->load->view('dashboard/footer');
    }
    // GETS ALL ORDERS MADE BY ALL USERS 
    function orders(){
        // checks if user is logged in or not 
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }

        $data['orders'] = $this->ProductsModel->getorders();
        $data['title'] = 'Orders Made';
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();


        $this->load->view('dashboard/header',$notificationdata);
		$this->load->view('dashboard/users/orders',$data);
		$this->load->view('dashboard/footer');        
    }

    //GETS DETAILS OF ORDERS MADE BY A SPECIFIC USER 

    function orderdetail($id){
        // checks if user is logged in or not 
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }
        $newdata['orderdetails'] = $this->ProductsModel->getorders($id);
        $newdata['title'] = 'Order Detail';
        $notificationdata['results'] = $this->ProductsModel->getrequest();
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();


        $this->load->view('dashboard/header',$notificationdata);
		$this->load->view('dashboard/users/orderdetails',$newdata);
		$this->load->view('dashboard/footer');   
    }
    function agreerequest($id){
        $amount = $this->ProductsModel->walletamount($id);
        $data =[
            'amount_available' => $amount->amount_available + 1000,
            'updated_at' => date('Y-m-d H:m:s')
        ];
        $agreed= $this->ProductsModel->agreerequest($id,$data);
        if ($agreed) {
            $data=[
                'is_deleted'=> 1,
                'status' => 'Approved',
                'updated_at' => date('Y-m-d H:m:s')
            ];
            $this->ProductsModel->requestupdate($id,$data);
            $this->session->set_flashdata('request','Your Resquest was approved');
            $this->index();
        }
    }
    function denyrequest($id){
        $data=[
            'is_deleted'=> 1,
            'status' =>'Denied',
            'updated_at' => date('Y-m-d H:m:s')
        ];
        $this->ProductsModel->requestupdate($id,$data);
        $this->session->set_flashdata('request','Resquest was denied');
        $this->index();
    }

    // PAYMENT BY WALLET 

    function walletpay($id){
        //declares cart contents 
        $cartitems = $this->cart->contents();
        //saves details to the database 
        $data = [
            'customer_id' =>$id,
            'order_amount' => $this->cart->total(),
            'order_status' => 'pending',
            'created_at' => date('Y-m-d H:m:s'),
            'payment_type' => 87348,
            'updated_at' =>date('Y-m-d H:m:s')
        ];
        // payment is done but remains pending 
        $confirm =$this->ProductsModel->addorder($data);
        // if payment goes through all cart items on checkout are saved to the database 
        if($confirm){
            foreach ($cartitems as $items) {
                $orderdetails=[
                    'order_id' =>$confirm,
                    'product_id'=>$items['id'],
                    'product_price' =>$items['price'],
                    'order_quantity' =>$items['qty'],
                    'orderdetails_total' =>$items['subtotal'],
                    'created_at'=>date('Y-m-d H:m:s'),
                    'updated_at'=>date('Y-m-d H:m:s')
                ];
                $detailsconfirm =$this->ProductsModel->addorderdetails($orderdetails);
            }
            $amount = $this->ProductsModel->walletamount($id);
            $total = $this->cart->total(); //total amount to be paid
            if (($amount->amount_available) >= $total) {
                //money is deducted from wallet if and only if wallet amount is greater than total amount in cart 
                $wallet=[
                'amount_available' => (($amount->amount_available) - $total),
                'updated_at' => date('Y-m-d H:m:s')
                ];
                // new wallet data/ money is updated in database 
                $this->ProductsModel->updatewallet($id,$wallet);
                // payment is finally declared as paid 
                $this->ProductsModel->updatepayment($id);
                // data is added as an api product under transactions
                $productdata = [
                    'product_name' => 'transactions',
                    'added_by' => $_SESSION['id'],
                    'created_at' => date('Y-m-d H:m:s')
                ];
                $this->ProductsModel->apiproducts($productdata);
                // redirected to the receipt 
                redirect(base_url('products/receipt/'.$confirm));
            }else { // happens if user does not have enough money in their account
                $this->session->set_flashdata('broke', 'You do not have enough in your account please top up');
                redirect(base_url('products/checkout/'.$id));
            }
        }
    }

    // CONTROLLER FOR CREATING AN API USER 

    function createuser(){
        // checks if admin is logged in
        if (!isset($_SESSION['id'])) {
            redirect(base_url('user/login'));
        }

        $api_strings = '0123456789abcdefghijklmnopqrstuvwxyz'; // random strings for an api key

        // form validation rules 
        $this->form_validation->set_rules('apiusername','Username','required');
        $this->form_validation->set_rules('apiemail','Email','required');
        // code runs if form validation is true 
        if ($this->form_validation->run() == TRUE) {
            $userdata= [
                'username' => $this->input->post('apiusername'), // data from the form
                'key' => 'user_'.substr(str_shuffle($api_strings), 0, 10),//shuffles the strings provided to create a random code as the api
                'created_at' => date('Y-m-d H:m:s'),
                'added_by' => $_SESSION['id'],
                'updated_at' => date('Y-m-d H:m:s'),
                'is_deleted' => 0
            ];// saves the data given and sends it in the database 
            $confirmed = $this->ProductsModel->apiusers($userdata);
            if ($confirmed) {
                // gives api user a token that expires the next day at midnight 
                $expiry = new DateTime('tomorrow');
                $tokendata= [
                    'api_userid' => $confirmed,
                    'api_productid' => 245571,
                    'api_token' => 'token'.substr(str_shuffle($api_strings), 0, 10),
                    'created_at' => date('Y-m-d H:m:s'),
                    'expires_on' => $expiry->format('Y-m-d H:m:s')
                ];
                $tokenid = $this->ProductsModel->apitokens($tokendata);// saves token in database and returns token id 
                $this->session->set_flashdata('confirmation', 'has been added');
                $_SESSION['tokenid'] = $tokenid;
            }
        }else {
            $this->session->set_flashdata('confirmation', validation_errors());
        }
        
        
        $notificationdata['results'] = $this->ProductsModel->getrequest();// results for any available notification 
        $notificationdata['notifications'] = $this->ProductsModel->getrequestnum();// all notifications 
        $data['tokens'] = $this->ProductsModel->gettokens($_SESSION['tokenid']); 
 
        //outputs the display with all nessesary data
        $this->load->view('dashboard/header',$notificationdata);
        $this->load->view('dashboard/api/apiuser',$data);
        $this->load->view('dashboard/footer');
    }

}
?>
