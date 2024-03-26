<?php

namespace App\Services\Testservices;

class SaveService
{
    public function create($request){
        if($request->customer['value'] === $request->customer['name']){
            $name = new CustomerName;
            $name->name = $request->customer['value'];
            $name->has_branches = 1;
            if($name->save()){
                $request['name_id'] = $name->id;
            }
        }else{
            $request['name_id'] = $request->customer['value'];
        }
        $code = $this->generateCode($request->region_code);
        $customer = Customer::create(array_merge($request->all(),['code' => $code, 'laboratory_id' => 14]));
        $customer->address()->create($request->except(['name','is_main','email','bussiness_id','industry_id','classification_id','contact_no','name_id','customer','has_branches']));

        return [
            'data' => $customer,
            'message' => 'Customer creation was successful!', 
            'info' => "You've successfully created the new customer."
        ];
    }

}
