<?php

namespace Vannut\Donate\Components;


class BasicButton extends \Cms\Classes\ComponentBase
{



    public function onRun()
    {

    }

    public function componentDetails()
    {
        return [
            'name' => 'Basic Button (fixed amount)',
            'description' => 'Donate a fixed amount, by hitting a button'
        ];
    }

    public function defineProperties()
    {
        return [
            'amount' => [
                 'title'             => 'Amount',
                 'description'       => 'What\'s the amount',
                 'default'           => 10,
                 'type'              => 'string',
                 'required'         => true,
                 //'validationPattern' => '^[0-9]+$',
                 'validationMessage' => 'Please specify the amount!'
            ],
            'button_label' => [
                 'title'             => 'Button label',
                 'description'       => 'What should be the label of the button?',
                 'default'           => 'Donate',
                 'type'              => 'string',                 
            ]
        ];
    }


    //
}
