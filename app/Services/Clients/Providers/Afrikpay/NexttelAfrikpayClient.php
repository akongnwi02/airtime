<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/29/20
 * Time: 11:09 PM
 */

namespace App\Services\Clients\Providers\Afrikpay;


use App\Services\Clients\Providers\AFrikpayClient;
use App\Services\Objects\Airtime;

class NexttelAfrikpayClient extends AFrikpayClient
{
    /**
     * @param Airtime $airtime
     * @return string
     * @throws \App\Exceptions\GeneralException
     * @throws \App\Exceptions\BadRequestException
     */
    public function buy(Airtime $airtime): string
    {
        return parent::buy($airtime);
    }
    
    /**
     * @param $transaction
     * @return bool
     * @throws \App\Exceptions\GeneralException
     */
    public function status($transaction): bool
    {
        return parent::status($transaction);
    }
}