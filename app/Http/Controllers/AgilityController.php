<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AgilityController extends Controller
{
    public function methodGet(){
        $response = Http::get('https://eagle-backend-staging.devops.somosagility.com.br/getTeste');
        $users = $response['user'];
        return view('user', ['users' => $users, 'pageName' => 'Desafio Agility - Método GET']);
    }

    public function methodPost(){
        $response = Http::post('https://eagle-backend-staging.devops.somosagility.com.br/postTeste', [
            'key' => env('API_KEY')
        ]);
        $users = $response['user']['entries'];
        return view('user', ['users' => $users, 'pageName' => 'Desafio Agility - Método POST']);
    }
}
