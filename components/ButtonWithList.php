<?php

namespace Vannut\Donate\Components;

use Vannut\Donate\Models\Goal;

class ButtonWithList extends \Cms\Classes\ComponentBase
{


    public function componentDetails()
    {
        return [
            'name' => 'Button with predefined list',
            'description' => 'Donate button with a predefined list with amounts to donate.'
        ];
    }

    public function defineProperties()
    {
        return [
            'amounts' => [
                 'title'             => 'Amounts',
                 'description'       => 'Comma separated list of amounts',
                 'default'           => '5,10,25,50',
                 'type'              => 'string',
                 'required'         => true,
                 'validationMessage' => 'Please specify the amount!'
            ],
            'button_label' => [
                 'title'             => 'Button label',
                 'description'       => 'What should be the label of the button?',
                 'default'           => 'Donate',
                 'type'              => 'string',
            ],
            'goal' => [
                 'title'             => 'Goal',
                 'description'       => 'For which goal?',
                 'placeholder'       => 'Leave blank for no-goal',
                 'type'              => 'dropdown',
            ],
        ];
    }

    public function getGoalOptions()
    {
        $goals = Goal::orderBy('title', 'desc')->get();


        $ret = $goals->keyBy('id')
            ->transform(function ($item) {
                return $item->title;
            })
            ->toArray();

        return $ret;
        dd($ret);
        return $ret;


    }


    public function amounts()
    {
        return explode(',', $this->property('amounts'));
    }

    //
}
