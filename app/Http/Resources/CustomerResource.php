<?php

namespace App\Http\Resources;

use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CustomerResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        $hashids = new Hashids('krad',10);
        $code = $hashids->encode($this->id);

        return [
            'code' => $code,
            'id' => $this->id,
            'email' => $this->email,
            'contact_no' => $this->contact_no,
            'name' => $this->name,
            'customer' => ($this->is_main) ? $this->customer_name->name :  $this->customer_name->name.' - '.$this->name,
            'is_main' => $this->is_main,
            'is_active' => $this->is_active,
            'customer_name' => $this->customer_name->name,
            'bussiness' => $this->bussiness,
            'classification' => $this->classification,
            'industry' => $this->industry,
            'address' => new AddressResource($this->address),
        ];
    }
}
