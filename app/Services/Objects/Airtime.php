<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/16/20
 * Time: 5:14 PM
 */

namespace App\Services\Objects;


/**
 * Class PrepaidMeter
 * @package App\Services\Objects
 */
class Airtime
{
    /**
     * @var
     */
    public $int_id;

    /**
     * @var
     */
    public $service_code;
    
    /**
     * @var
     */
    public $address;
    
    /**
     * @var
     */
    public $phone;
    
    /**
     * @var
     */
    public $name;
    
    /**
     * @var
     */
    public $amount;
    
    /**
     * @var
     */
    public $item;
    
    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }
    
    /**
     * @param mixed $address
     * @return Airtime
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }
    
    /**
     * @param mixed $name
     * @return Airtime
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }
    
    /**
     * @param mixed $amount
     * @return Airtime
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getIntId()
    {
        return $this->int_id;
    }
    
    /**
     * @param $int_id
     * @return Airtime
     */
    public function setIntId($int_id)
    {
        $this->int_id = $int_id;
        return $this;
        
    }
    
    /**
     * @param mixed $service_code
     * @return Airtime
     */
    public function setServiceCode($service_code)
    {
        $this->service_code = $service_code;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getServiceCode()
    {
        return $this->service_code;
    }
    
    /**
     * @param mixed $phone
     * @return Airtime
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }
    
    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }
    
    /**
     * @return mixed
     */
    public function getItem()
    {
        return $this->item;
    }
    
    /**
     * @param mixed $item
     * @return Airtime
     */
    public function setItem($item)
    {
        $this->item = $item;
        return $this;
    }
}