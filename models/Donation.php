<?php

namespace Vannut\Donate\Models;

use Model;

class Donation extends Model
{

    protected $table = 'vannut_donation';
    protected $fillable = ['uuid', 'trid'];

    public $hasMany = [
        'status' => ['Vannut\Donate\Models\DonationStatus'],
    ];
}
