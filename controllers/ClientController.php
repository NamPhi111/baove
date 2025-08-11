<?php

class ClientController {
    public $user;
    public $products;
    public $addmin;
    public $comment;
    function __construct(){
        $this->user = new User();
        $this->products = new Products();
        $this->addmin = new Addmin();
        $this->comment = new Comment();
    }


    function login(){
        $message= "hãy đăng ký";
        $view='client/login';
        require_once PATH_VIEW . 'main.php';        
    }
    public function add() 
    {
        if($_SERVER['REQUEST_METHOD']){
            $this->user->add($_POST);
            $message= "bạn đã đăng nhập thành công";
            header('Location:'.BASE_URL);
        }
    }
    function regester(){
        $message= "hãy đăng nhap";
        $view='client/regester';
        require_once PATH_VIEW . 'main.php';  
    }
    public function check() 
    { 
        if($_SERVER['REQUEST_METHOD']){
            $data=$this->products->getAll();
            $user=$this->user->check($_POST['username'],$_POST['password']);
            if(!empty($user)){
                $_SESSION['user'] = $user;
                $_SESSION['regester'] = true;
                $_SESSION['id']=$user['id'];
                $message= "<h1 style='color: green;'>bạn đã đăng nhập thành công</h1>";
                $title="trang chủ";
                $view='client/home';
                require_once PATH_VIEW . 'main.php';
            }else{
                $message= "<h1 style='color: red;'>bạn đã đăng nhập thất bại</h1>";
                $view='client/regester';
                require_once PATH_VIEW . 'main.php';           
            }
        }
    }
    public function check_addmin(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
            $data=$_POST;
            $addmin=$this->addmin->check($data);
            if(empty($addmin)){
                $_SESSION['msg']='ban dang nhap that bai';
            }else{
                // $_SESSION['addmin']=$addmin;
                // $login=true;
                $_SESSION['msg']='ban da dang nhap thanh cong';
            }
            header('Location: ' .BASE_URL.'?mode=addmin');
        }
    }
    public function into_addmin(){
        $view='client/addmin';
        require_once PATH_VIEW . 'main.php';   
    }
    public function logout(){
        session_destroy();
        header('Location: ' . BASE_URL );
        exit;
    }
    public function lienhe(){
        $title = "Liên hệ";
        $view = 'client/lienhe';
        require_once PATH_VIEW . 'main.php';
    }
    public function addComment(){
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_SESSION['user'])) {
        $product_id = $_POST['product_id'];
        $user_id = $_SESSION['user']['id'];
        $content = $_POST['content'];

        $this->comment->add($product_id, $user_id, $content);
    }
    header("Location: " . BASE_URL . "?mode=detail&id=" . $_POST['product_id']);
    exit;
}
    public function checkout(){
        if(isset($_SESSION['user'])){
            if(isset($_GET['id'])){
                $products=$this->products->get($_GET['id']);
                $_SESSION['msg']='Đăng kí khóa học thành công';
                $_SESSION['status']=true;     
                $view='client/checkout';
                require_once PATH_VIEW . 'main.php'; 
            }
        }else{
            $_SESSION['msg']='Đăng kí khóa học thất bại';
            $_SESSION['status']=false;
            header('Location: ' . BASE_URL );
        }

    }
    }




?>