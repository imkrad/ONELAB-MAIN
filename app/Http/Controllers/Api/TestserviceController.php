<?php

namespace App\Http\Controllers\Api;

use App\Models\ListName;
use App\Models\ListMethod;
use App\Models\ListTestservice;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\DefaultResource;
use Laravel\Sanctum\PersonalAccessToken;

class TestserviceController extends Controller
{
    public function names(){
        return $data = ListName::get();
    }

    public function methods(){
        return $data = ListMethod::get();
    }

    public function testservices(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $laboratory = $token->tokenable->profile->laboratory->id;

        return $data = ListTestservice::where('laboratory_id',$laboratory)->get();
    }

    public function list_names(Request $request){
        $keyword = $request->keyword;
        $type = $request->type;
        $laboratory = $request->laboratory_type;

        $data = ListName::where('name', 'LIKE', "%{$keyword}%")->where('type_id',$type)->where('laboratory_type',$laboratory)->get()->map(function ($item) {
            return [
                'value' => $item->id,
                'name' => $item->name,
            ];
        });
        return $data;
    }

    public function list_methods(Request $request){
        $laboratory = $request->laboratory_type;
        $keyword = $request->keyword;
      
        $data = DefaultResource::collection(
            ListMethod::query()
            ->withWhereHas('method', function ($query) use ($keyword){
                $query->select('id','name');
               
                $query->when($keyword, function ($query, $keyword) {
                    $query->where('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->withWhereHas('reference', function ($query) use ($keyword){
                $query->select('id','name');
                $query->when($keyword, function ($query, $keyword) {
                    $query->orWhere('name', 'LIKE', "%{$keyword}%");
                });
            })
            ->where('laboratory_type',$laboratory)
            ->paginate($request->count)
        );
        return $data;
    }

    public function store_testservices(Request $request){
        $bearer = $request->bearerToken();
        $token = PersonalAccessToken::findToken($bearer);
        $laboratory = $token->tokenable->profile->laboratory->id;

        $testservice = ListTestservice::create($request->all());
       return $testservice;
    }

    public function store_names(Request $request){
        $name = ListName::create($request->all());
        return $name;
    }

    public function store_methods(Request $request){
        $method = ListMethod::create($request->all());
        return $method;
    }
}
