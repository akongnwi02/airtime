<?php
/**
 * Created by PhpStorm.
 * User: devert
 * Date: 3/16/20
 * Time: 5:12 PM
 */

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AirtimeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'phone_number' => $this->phone,
            'amount'       => $this->amount,
            'address'      => $this->address,
            'name'         => $this->name,
        ];
    }
}