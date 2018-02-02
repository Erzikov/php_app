<?php 
namespace components; 

class AdminBaseController
{   
    public $view;

    public function __construct()
    {
        if (isset($_SESSION['user']) && $_SESSION['user']['admin']) {
            $this->view = new View('admin/main');
        } else {
            echo "Недостаточно прав";
            exit;
        }
    }
}