<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 6/29/20
 * Time: 10:44 PM
 */

namespace App\Services\Clients\Providers;


use App\Exceptions\BadRequestException;
use App\Exceptions\GeneralException;
use App\Models\Transaction;
use App\Services\Clients\AbstractClient;
use App\Services\Objects\Airtime;

class AFrikpayClient extends AbstractClient
{
    /**
     * @param Airtime $meter
     * @return string
     * @throws BadRequestException
     * @throws GeneralException
     */
    public function buy(Airtime $meter): string
    {
        // TODO: Implement buy() method.
    }
    
    /**
     * @param $transaction
     * @return Transaction
     */
    public function status($transaction): string
    {
        // TODO: Implement status() method.
    }
    
}