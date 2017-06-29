<?php

namespace Vannut\Donate\Components;

use Vannut\Donate\Models\Donation;
use Vannut\Donate\Models\DonationStatus as DonationStatusModel;

class DonationStatus extends \Cms\Classes\ComponentBase
{


    public function componentDetails()
    {
        return [
            'name' => 'Donation Status',
            'description' => 'Shows the transaction status and overview of this donation.'
        ];
    }

    public function statusOverview()
    {
        $donation = Donation::where('uuid', $this->param('uuid'))
            ->first();

        if (!$donation) {
            return [
                'error' => 'Donation not found'
            ];
        };


        $status = DonationStatusModel::where('trid', $donation->trid)
            ->orderBy('created_at')
            ->get();

        return $status;

    }

    public function currentStatus()
    {
        $status = $this->statusOverview();

        if (isset($status['error'])) {
            return 'Not Found';
        };

        return $status
            ->sortByDesc('created_at')
            ->first();

    }

}
