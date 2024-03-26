<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerName;
use Laravel\Sanctum\PersonalAccessToken;

class CustomerController extends Controller
{
    public function download(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $laboratory = $token->tokenable->profile->laboratory_id;

        $data = Customer::with('address')->where('laboratory_id',$laboratory)->get();
        return $data;
    }

    public function upload(Request $request){
        $success = []; $failed = [];
        $customers = $request->customers;
        $laboratory = $request->laboratory_id;

        foreach($customers as $customer){
            $sub = array_splice($customer,15);
            unset($customer['id']);
            unset($customer['is_synced']);
            $address = $sub['address'];
            unset($address['id']);
            unset($address['is_synced']);
            $name = $sub['customer_name'];
            unset($name['id']);


            $code = $customer['code'];
            $customer_data = Customer::where('code',$code)->exists();
            if($customer_data){
                array_push($failed,$code);
            }else{

                $check = CustomerName::where('name',$name['name'])->exists();
                if($check){
                    $new_name = CustomerName::where('name',$name['name'])->first();
                    $new_customer = Customer::create(array_merge($customer,['name_id' => $new_name->id,'laboratory_id' => $laboratory]));
                    $new_customer->address()->create($address);
                }else{
                    $new_name = CustomerName::create($name);
                    $new_customer = Customer::create(array_merge($customer,['name_id' => $new_name->id,'laboratory_id' => $laboratory]));
                    $new_customer->address()->create($address);
                }

                if($new_customer){
                    array_push($success,$code);
                }else{
                    array_push($failed,$code);
                }
            }
        }

        $array = [
            'success' => $success,
            'failed' => $failed
        ];

        return response()->json($array);
    }

    public function names(){
        $names = CustomerName::all();
        return $names;
    }
}
