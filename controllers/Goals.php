<?php

namespace Vannut\Donate\Controllers;

use Backend\Classes\Controller;
use BackendMenu;
use Vannut\Donate\Models\Goal;

class Goals extends Controller
{

    public $requiredPermissions = ['vannut.donate.*'];

    public $implement = [
        'Backend.Behaviors.ListController',
        'Backend.Behaviors.FormController',
    ];
    public $listConfig = 'config_list.yaml';
    public $formConfig = 'config_form.yaml';


    /**
     * Constructor.
     */
    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Vannut.Donate', 'donate', 'goals');
        $this->makeLists();
    }

    public function index()
    {
        $this->pageTitle = 'Goals ';
    }

    public function update($id)
    {
        $event = Goal::where('id', $id)
            ->firstOrFail();

        $this->pageTitle = 'Update: '.$event->title.' - DeGroeneBoot';
        $this->initForm($event);

    }



}
