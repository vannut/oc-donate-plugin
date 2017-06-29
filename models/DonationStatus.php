<?php

namespace Vannut\Donate\Models;

use Model;

class DonationStatus extends Model
{

    protected $table = 'vannut_donation_status';
    protected $fillable = ['status', 'trid'];

}
