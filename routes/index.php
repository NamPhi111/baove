<?php
if(isset($_GET['mode']) && $_GET['mode']=='addmin'){
    $action = $_GET['action'] ?? '/';
    match($action){
        '/'         => (new AddminController)->index(),
        'create'         => (new AddminController)->create(),
        'add'         => (new AddminController)->add(),
        'delete'         => (new AddminController)->delete(),
        'edit'         => (new AddminController)->edit(),
        'user'         => (new AddminController)->user(),
        'deleteUser'         => (new AddminController)->deleteUser(),

    };
}else{
    $action = $_GET['action'] ?? '/';

    match ($action) {
        '/'         => (new HomeController)->index(),
        'regester'         => (new ClientController)->regester(),
        'check'         => (new ClientController)->check(),
        'login'         => (new ClientController)->login(),
        'add'         => (new ClientController)->add(),
        'detail'         => (new HomeController)->get(),
        'category'         => (new HomeController)->index(),
        'logout'         => (new ClientController)->logout(),
        'into_addmin'         => (new ClientController)->into_addmin(),
        'addmin'         => (new ClientController)->check_addmin(),
        'lienhe'         => (new ClientController)->lienhe(),
        'checkout'         => (new ClientController)->checkout(),
    };
}

