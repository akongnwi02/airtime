<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/29/20
 * Time: 10:52 PM
 */

namespace App\Services\Clients\Providers;


use App\Services\Objects\Airtime;

class MtnAfrikpayClient extends AFrikpayClient
{
    /**
     * @param Airtime $airtime
     * @return string
     * @throws \App\Exceptions\GeneralException
     */
    public function buy(Airtime $airtime): string
    {
        return parent::buy($airtime);
    }
    
    public function status($transaction): string
    {
        return parent::status($transaction);
    }
}