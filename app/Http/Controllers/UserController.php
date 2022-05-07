<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function getProfile($id) {
        $array = ['error' => ''];

        if($id) {
            $array['user'] = User::find($id);
        }else {
            $array['error'] = 'ID Inexistente';
            return $array;
        }

        return $array;
    }

    public function update(Request $request) {
        $array = ['error' => ''];
            $validator = Validator::make($request->all(), [
                'id' =>'required'
            ]);

            if(!$validator->fails()) {
                $name = $request->input('name');
                $email = $request->input('email');
                $cpf = $request->input('cpf');
                $id = $request->input('id');


                $newUser = User::find($id);
                $newUser->name = $name;
                $newUser->email = $email;
                $newUser->cpf = $cpf;
                $newUser->save();


                $array['user'] = User::find($id);

            }else {
                $array['error'] = $validator->errors()->first();
                return $array;
            }
        return $array;
    }
}
