<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Member;
use App\Models\Laboratory;
use App\Models\ListName;
use App\Models\ListRole;
use App\Models\ListMethod;
use App\Models\ListDropdown;
use App\Models\ListStatus;
use App\Models\ListDiscount;
use App\Models\LocationRegion;
use App\Models\LocationProvince;
use App\Models\LocationMunicipality;
use App\Models\LocationBarangay;
use Laravel\Sanctum\PersonalAccessToken;

class IndexController extends Controller
{
    public function locations(Request $request,$type){
        if($type == 'count'){
            $array = [
                'Regions' => LocationRegion::count(),
                'Provinces' => LocationProvince::count(),
                'Municipalities' => LocationMunicipality::count(),
                'Barangays' => LocationBarangay::count()
            ];
            return $array;
        }else{
            switch($type){
                case 'regions' :
                    $data = LocationRegion::get();
                break;
                case 'provinces' :
                    $data = LocationProvince::get();
                break;
                case 'municipalities' :
                    $data = LocationMunicipality::get();
                break;
                case 'barangays' :
                    $data = LocationBarangay::get();
                break;
            }
            return $data;
        }
    }

    public function lists(Request $request,$type){
        if($type == 'count'){
            $array = [
                'Dropdowns' => ListDropdown::count(),
                'Names' => ListName::count(),
                'Methods' => ListMethod::count(),
                'Roles' => ListRole::count(),
                'Discounts' => ListDiscount::count(),
                'Statuses' => ListStatus::count()
            ];
            return $array;
        }else{
            switch($type){
                case 'dropdowns' :
                    $data = ListDropdown::get();
                break;
                case 'names' :
                    $data = ListName::get();
                break;
                case 'methods' :
                    $data = ListMethod::get();
                break;
                case 'roles' :
                    $data = ListRole::get();
                break;
                case 'discounts' :
                    $data = ListDiscount::get();
                break;
                case 'statuses' :
                    $data = ListStatus::get();
                break;
            }
            return $data;
        }
    }

    public function laboratories(Request $request,$type){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $laboratory = $token->tokenable->profile->laboratory->id;
        if($type == 'count'){
            $in = Laboratory::count();
            $array = [
                'Inside' => $in,
            ];
            return $array;
        }else if($type == 'download'){
            $data = Member::with('laboratories.address')->get();
            return $data;
        }else{
            $data = Member::with('laboratories.address')->get();
            return $data;
        }
    }

    public function user(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        if($token){
            return response()->json(['status' => true], 200);
        }else{
            return response()->json(['status' => 'Unauthorized'], 401);
        }
    }
}
