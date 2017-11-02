<?php

namespace Vannut\Donate\Components;

use Vannut\Donate\Models\Goal;

class GoalProgress extends \Cms\Classes\ComponentBase
{


    public function componentDetails()
    {
        return [
            'name' => 'Goal Progress',
            'description' => 'Displays an progress indicator for a selected goal.'
        ];
    }

    public function defineProperties()
    {
        return [
            'goal' => [
                 'title'             => 'Goal',
                 'description'       => 'Which goal?',
                 'required'         => true,
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

    public function goal()
    {
        $goal = Goal::where('id', $this->property('goal'))->first();

        return $goal;
    }

}
