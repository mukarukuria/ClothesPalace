<?php
 class ProductsModel extends CI_Model{
    // INSERTS DATA TO REGISTER A USER 
    public function registerUser($data)
    {
        $this->db->insert('tbl_users',$data);
        /* INSERT INTO `tbl_users` (`first_name`, `last_name`, `email`, `password`, `gender`, `role`) 
        VALUES ($data)*/


        return $this->db->insert_id(); // returns most recent user id
    }
    // ADDS DATA IN WALLET ONCE USER IS REGISTERED
    public function addwallet($data)
    {
        $this->db->insert('tbl_wallet',$data);
    }
    // CHECKS DATABASE FOR LOGIN DETAILS ACORDING TO DATA PROVIDED AND RETURNS ONE VALUE
    public function loginUser($data)
    {
        $this->db->select('*');
        $this->db->where('email',$data['email']);
        $this->db->where('password',$data['password']);
        $this->db->where('is_deleted',0);
        $this->db->from('tbl_users');
        $this->db->limit(1);
        $query =$this->db->get();
        // SELECT * FROM `tbl_uers` WHERE `email` = 'data['email']' AND `password` = '$data['email' AND `is_deleted` = 0 LIMIT 1
        if($query->num_rows() == 1){
            return $query->row();
        }else{
            return false;
        }
    }
    public function updateprofile($id,$data)
    {
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users',$data);
    }
    public function getusers($id=""){
        if ($id) {
            
            $this->db->select('*');
            $this->db->where('user_id', $id);
            $this->db->where('is_deleted', 0);
            $this->db->from('tbl_users');

            $query =$this->db->get();
            return $query->result();
        }else {
            $this->db->select('tbl_users.user_id');
            $this->db->select('tbl_users.first_name');
            $this->db->select('tbl_users.last_name'); 
            $this->db->select('tbl_users.email');
            $this->db->select('tbl_users.gender');
            $this->db->select('tbl_users.password');
            $this->db->select('tbl_roles.role_name');
            $this->db->from('tbl_users');
            $this->db->join('tbl_roles', 'tbl_users.role = tbl_roles.role_id');
            $this->db->where('tbl_users.is_deleted', 0);

            $query =$this->db->get();
            return $query->result();
        }
    }
    public function insertProduct($data)
    {
        return $this->db->insert('tbl_product',$data);
    }
    public function getproduct($id="")
    {
        $this->db->select('*');
        $this->db->where('tbl_product.is_deleted', 0);
        $this->db->from('tbl_product');
        if($id){
            $this->db->join('tbl_subcategories' , 'tbl_subcategories.subcategories_id = tbl_product.subcategory_id');
            $this->db->where('product_id', $id);
            $query =$this->db->get();
            return $query->result();
        }else{
            $this->db->join('tbl_subcategories' , 'tbl_subcategories.subcategories_id = tbl_product.subcategory_id');
            $this->db->join('tbl_categories' , 'tbl_subcategories.category = tbl_categories.category_id');
            $query = $this->db->get();
            return $query->result();
        }
    }
    public function getdeleted()
    {
        $this->db->select('*');
            $this->db->where('is_deleted', 1);
            $this->db->from('tbl_product');
            $query = $this->db->get();
            return $query->result();
    }
    public function removeproduct($id,$num){
        $data = [
            'is_deleted' => $num,
            'updated_at' => date('Y-m-d H:m:s')
        ];
        $this->db->where('product_id',$id);
        $this->db->update('tbl_product',$data);
    }
    public function updateproduct($id,$data)
    {
        $this->db->where('product_id', $id);
        $this->db->update('tbl_product',$data);
    }
    public function removeuser($id)
    {
        $data = [
            'is_deleted' => 1,
            'updated_at' => date('Y-m-d H:m:s')
        ];
        $this->db->where('user_id',$id);
        $this->db->update('tbl_users',$data);
    }
    public function updateuser($id,$data)
    {
        $this->db->where('user_id', $id);
        $this->db->update('tbl_users',$data);
    }
    public function loggedin($data){
        return $this->db->insert('tbl_userlogin',$data);
    }
    public function loggedout($id,$data)
    {
        $this->db->where('user_id', $id);
        return $this->db->update('tbl_userlogin',$data);
    }
    public function getlogindetails($id='')
    { 
        $this->db->select('tbl_users.user_id');
        $this->db->select('tbl_users.first_name');
        $this->db->select('tbl_users.last_name'); 
        $this->db->select('tbl_users.email');
        $this->db->select('tbl_userlogin.login_time');
        $this->db->select('tbl_userlogin.logout_time');
        $this->db->from('tbl_userlogin');
        $this->db->join('tbl_users','tbl_users.user_id = tbl_userlogin.user_id');
        if ($id){
            $this->db->where('tbl_userlogin.is_deleted', 0);
            $this->db->where('tbl_userlogin.user_id', $id);
            $query = $this->db->get();
            return $query->result(); 
        }else {
            $this->db->where('tbl_userlogin.is_deleted', 0);
            $query = $this->db->get();
            return $query->result(); 
        }
    }
    public function getorders($id="",$limit="")
    {
        $this->db->select('tbl_order.order_id');
        $this->db->select('tbl_order.customer_id');
        $this->db->select('tbl_users.first_name');
        $this->db->select('tbl_users.last_name');
        $this->db->select('tbl_users.email');
        $this->db->select('tbl_users.gender');
        $this->db->select('tbl_users.password');
        $this->db->select('tbl_order.order_amount');
        $this->db->select('tbl_order.order_status');
        $this->db->select('tbl_order.updated_at');
        $this->db->select('tbl_product.product_name');
        $this->db->select('tbl_product.product_id');
        $this->db->select('tbl_product.unit_price');
        $this->db->select('tbl_orderdetails.product_price');
        $this->db->select('tbl_orderdetails.order_quantity');
        $this->db->select('tbl_orderdetails.orderdetails_total');
        $this->db->select('tbl_paymenttypes.paymenttype_name');
        $this->db->select('tbl_roles.role_name');
        $this->db->from('tbl_order');
        $this->db->join('tbl_users', 'tbl_users.user_id = tbl_order.customer_id');
        $this->db->join('tbl_roles', 'tbl_users.role = tbl_roles.role_id');
        $this->db->join('tbl_orderdetails', 'tbl_orderdetails.order_id = tbl_order.order_id');
        $this->db->join('tbl_product', 'tbl_product.product_id = tbl_orderdetails.product_id');
        $this->db->join('tbl_paymenttypes', 'tbl_paymenttypes.paymenttypes_id = tbl_order.payment_type');
        $this->db->where('tbl_order.is_deleted',0);
        if ($limit) {
            $this->db->limit($limit);
            $query = $this->db->get();
            return $query->result();
        }else if ($id) {
            $this->db->where('tbl_order.customer_id', $id);
            $query = $this->db->get();
            return $query->result();
        }else {
            $query = $this->db->get();
            return $query->result();
        }
        
    }
    public function showfilters($columnName,$tableName)
    {
        $this->db->select($columnName);
        $this->db->from($tableName);
        $query = $this->db->get();
        return $query->result();
    }
    public function showWallet($id)
    {
        $this->db->select('*');
        $this->db->where('is_deleted', 0);
        $this->db->where('customer_id', $id);
        $this->db->from('tbl_wallet');
        $query = $this->db->get();
        return $query->result();
    }
    public function updatewallet($id,$data)
    {
        $this->db->where('customer_id', $id);
        $this->db->update('tbl_wallet', $data);
    }
    public function addorder($data)
    {
        $this->db->insert('tbl_order', $data);
        return $this->db->insert_id();
    }
    public function addorderdetails($data)
    {
        return $this->db->insert('tbl_orderdetails', $data);
    }
    public function request($data)
    {
        return $this->db->insert('tbl_requests', $data);
    }
    public function getcategories()
    {
        $this->db->select('tbl_categories.category_name');
        $this->db->select('tbl_categories.category_id');
        $this->db->select('tbl_subcategories.subcategories_id');
        $this->db->select('tbl_subcategories.subcategory_name');
        $this->db->where('tbl_categories.is_deleted', 0);
        $this->db->order_by('tbl_categories.category_id', 'DESC');
        $this->db->from('tbl_categories');
        $this->db->join('tbl_subcategories', 'tbl_categories.category_id = tbl_subcategories.category');
        $query = $this->db->get();
        return $query->result();
    }
    public function updatepayment($id)
    {
        $data= [ 
            'order_status' => 'paid',
            'updated_at' => date('Y-m-d H:m:s')
        ];
        $this->db->where('customer_id', $id);
        $this->db->update('tbl_order', $data);
    }
    public function getrequest()
    {
        $this->db->select('*');
        $this->db->where('is_deleted',0);
        $this->db->from('tbl_requests');
        $query = $this->db->get();
        return $query->result();
    }
    public function getrequestnum()
    {
        $this->db->where('is_deleted',0);
        $this->db->from('tbl_requests');
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function apiusers($data)
    {
        $this->db->insert('tbl_apiusers', $data);
        return $this->db->insert_id();
    }
    public function apitokens($data)
    {
        $this->db->insert('tbl_apitokens',$data);
        return $this->db->insert_id();
    }
    public function apiproducts($data)
    {
        $this->db->insert('tbl_apiproducts',$data);
    }
    public function gettokens($id)
    {
        // $this->db->select('tbl_apitokens.api_userid');
        $this->db->select('tbl_apitokens.api_token');
        $this->db->select('tbl_apitokens.expires_on');
        $this->db->where('apitoken_id' , $id);
        $this->db->from('tbl_apitokens');
        $this->db->select('tbl_apiusers.username');
        $this->db->join('tbl_apiusers', 'tbl_apitokens.api_userid = tbl_apiusers.apiusers_id');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
        //SELECT *, `username` FROM `tbl_apitokens` JOIN `tbl_apiusers` ON `tbl_apitokens.apiuser_id` = `tbl_apiusers`.`apiusers_id` WHERE `apitoken_id` = 35667 LIMIT 1
    }
    public function addcategory($data)
    {
        $this->db->insert('tbl_categories', $data);
        return $this->db->insert_id();
    }
    public function addsubcategory($data)
    {
        $this->db->insert('tbl_subcategories', $data);
    }
    public function deletecategory($id,$data)
    {
        $this->db->where('category_id', $id);
        $this->db->update('tbl_categories', $data);
    }
    public function editcategory($id,$data)
    {
        $this->db->where('category_id', $id);
        $this->db->update('tbl_categories', $data);
    }
    public function walletamount($id)
    {
        $this->db->select('amount_available');
        $this->db->where('customer_id', $id);
        $this->db->from('tbl_wallet');
        $query = $this->db->get();
        return $query->row();
    }
    public function agreerequest($id,$data)
    {
        $this->db->where('customer_id', $id);
        return $this->db->update('tbl_wallet', $data);
    }
    public function requestupdate($id,$data)
    {
        
        $this->db->where('user_id', $id);
        $this->db->update('tbl_requests',$data);
    }

}
?>