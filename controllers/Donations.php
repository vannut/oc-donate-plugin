<?php

namespace Vannut\Donate\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Donations extends Controller
{

    public $requiredPermissions = ['vannut.donate.*'];

    public $implement = ['Backend.Behaviors.ListController'];
    public $listConfig = 'config_list.yaml';


    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Vannut.Donate', 'donate', 'donations');
        $this->makeLists();
    }

    public function index()
    {
        $this->pageTitle = 'Donations ';
    }


}
