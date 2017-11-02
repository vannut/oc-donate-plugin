<?php

namespace Vannut\Donate\Controllers;

use Backend\Classes\Controller;
use BackendMenu;

class Index extends Controller
{

    public $requiredPermissions = ['vannut.donate.*'];

    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Vannut.Donate', 'donate');
    }

    public function index()
    {
        $this->pageTitle = 'Donate ';
    }


}
