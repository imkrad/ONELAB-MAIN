<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\CustomerName;
use Laravel\Sanctum\PersonalAccessToken;

class CustomerController extends Controller
{
    public function customers(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $laboratory = $token->tokenable->profile->laboratory_id;

        $data = Customer::with('address')->where('laboratory_id',$laboratory)->get();
        return $data;
        
    }

    public function names(){
        $names = CustomerName::all();
        return $names;
    }
}
