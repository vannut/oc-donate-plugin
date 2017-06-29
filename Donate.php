<?php

namespace Vannut\Donate;

use Vannut\Donate\Models\Settings;
use Vannut\Donate\Models\Donation;
use Vannut\Donate\Models\DonationStatus;

class Donate
{

    /**
     * [createDonationRequest description]
     * @param  [type] $in [description]
     * @return [type]     [description]
     */
    public function createDonationRequest($in)
    {
        // validate and create parameters
        $amount = filter_var($in['amount'], FILTER_VALIDATE_FLOAT);
        $hash = $this->hash();
        $redirectUrl = str_replace(
            ['[uid]', '[hash]', '[uuid]'],
            $hash,
            Settings::get('redirect_url')
        );

        $params = [
            'amount' => $amount,
            'description' => Settings::get('payment_description'),
            'redirectUrl' => $redirectUrl,
            'webhookUrl' => Settings::get('webhook_url'),
            'metadata' => [
                'uid'=> $hash
            ]
        ];

        // Request payment from Mollie
        $mollie = new \Mollie_API_Client;
        $mollie->setApiKey(Settings::get('mollie_api_key'));

        $payment = $mollie->payments->create($params);

        // store payment_id/transaction ID with the corresponding hash...
        Donation::create([
            'uuid' => $hash,
            'trid' => $payment->id
        ]);
        DonationStatus::create([
            'trid' => $payment->id,
            'status' => 'open'
        ]);

        return redirect()->to($payment->links->paymentUrl);

    }

    private function hash()
    {
        return bin2hex(random_bytes(16));
    }
}
