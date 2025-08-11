<?php
    class AddminController{
        public $product;
        public $category;
        public $user;
        public function __construct(){
            $this-> product=new Products();
            $this-> category=new Categoty();
            $this-> user=new User();
        }
        public function index(){
            $data=$this->product->getAll();
            $view='addmin/list';
            require_once PATH_VIEW . 'main.php'; 
        }
        public function user(){
        // Lấy danh sách tất cả user
        $users = $this->user->getAll();

        $view = 'addmin/userlist';
        require_once PATH_VIEW . 'main.php';  
    }
        function delete(){
        if(isset($_GET['id'])){
            $data=$this->product->delete($_GET['id']);
            header('Location:' .BASE_URL_ADDMIN);
        }
    }
    function edit(){
        if(isset($_GET['id'])){
            $product=$this->product->get($_GET['id']);
            $view='addmin/update';
            require_once PATH_VIEW . 'main.php'; 
        }
    }
    function create(){
            // echo'123'; die; 
            $data=$this->category->getAll();
            $view='addmin/create';
            require_once PATH_VIEW . 'main.php';  
        }
        function add(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data= $_POST+$_FILES;
            if($data['thumbnail']['size']>0){
                $data['thumbnail']=upload_file('img_ao',$data['thumbnail']);
            }else{
                $data['thumbnail']='img_ao/1.jpg';
            }
            $this->product->add($data); 
        }
         header('Location:' .BASE_URL_ADDMIN);
    }
    function update(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data= $_POST+$_FILES;
            $product=$this->product->get($_POST['id']);

            if($data['thumbnail']['size']>0){
                $data['thumbnail']=upload_file('product',$data['thumbnail']);
            }else{
                $data['thumbnail']=$product['thumbnail'];
            }
            $row=$this->product->update($data);
            if($row>0 && file_exists($product['thumbnail'])){
                unlink($product['thumbnail']);
            }
        }
        header('Location:' .BASE_URL_ADDMIN);
        exit;
    }
    function deleteUser(){
        $this->user->delete($_GET['id']);
        header('Location:' . BASE_URL_ADDMIN . '&action=user');
        exit;
    }
    function detail(){
        if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // Lấy sản phẩm theo id
        $product = $this->product->get($id);

        // Nếu sản phẩm không tồn tại thì chuyển hướng
        if (!$product) {
            header('Location: ' . BASE_URL_ADDMIN);
            exit;
        }
         $v = $product;
        // Load view hiển thị chi tiết
        $view = 'addmin/detail';
        require_once PATH_VIEW . 'main.php';
    } else {
        // Không có id thì quay về trang danh sách
        header('Location: ' . BASE_URL_ADDMIN);
        exit;
    }
    }
    }
    
?>