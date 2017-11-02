<?php

namespace Vannut\Donate\Models;

use Model;

class Donation extends Model
{

    protected $table = 'vannut_donation';
    protected $fillable = ['uuid', 'trid', 'amount','name','email','remarks','goal_id'];

    public $hasMany = [
        'status' => [
            'Vannut\Donate\Models\DonationStatus',
            'order'     => 'created_at desc',
            'key'       => 'trid',
            'otherKey'  => 'trid'
        ],
    ];

    public $belongsTo = [
        'goal' => [
            'Vannut\Donate\Models\Goal',
            'key' => 'goal_id',
            'otherKey' => 'id',
            // 'default' => ['title' => 'No Goal set']
        ]
    ];


    /**
     *
     */
    public function lastStatus()
    {
        return $this->status->first();

    }
}
