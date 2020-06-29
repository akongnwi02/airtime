<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/14/20
 * Time: 7:27 PM
 */

namespace App\Services\Clients;

use App\Exceptions\BadRequestException;
use App\Exceptions\GeneralException;
use App\Models\Transaction;
use App\Services\Objects\Airtime;

abstract class AbstractClient
{
    
    public $config;
    
    public function __construct($config)
    {
        $this->config = $config;
    }
    
    /**
     * @param Airtime $meter
     * @return string
     * @throws BadRequestException
     * @throws GeneralException
     */
    public abstract function buy(Airtime $meter): string;
    
    /**
     * @param $transaction
     * @return Transaction
     */
    public abstract function status($transaction): string;
    
    /**
     * @return string
     */
    public function getClientName() {
        return class_basename($this);
    }
}