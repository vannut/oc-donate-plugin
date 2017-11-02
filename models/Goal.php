<?php

namespace Vannut\Donate\Models;

use Model;

class Goal extends Model
{
    use \October\Rain\Database\Traits\Validation;
    public $rules = [
        'title'                  => 'required',
        'target'                 => 'required'

    ];

    protected $table = 'vannut_goals';
    protected $fillable = ['target', 'title', 'description'];

    public $hasMany = [
        'donations' => [
            'Vannut\Donate\Models\Donation',
            'order'     => 'created_at desc',
            'key'       => 'goal_id',
            'otherKey'  => 'id'
        ],
    ];


    public function nofPaidDonations()
    {
        // checken of de status paid is...
        $paid = $this->donations->filter(function ($item) {
            return $item->lastStatus() && $item->lastStatus()->status === 'paid';
        });
        return $paid->count();
    }

    public function totalDonated()
    {
        $paid = $this->donations->filter(function ($item) {
            return $item->lastStatus() && $item->lastStatus()->status === 'paid';
        })->sum('amount');

        return $paid;
    }

    public function progress($precision = 2)
    {
        return round(($this->totalDonated() / $this->target ) * 100, $precision);


    }

}
