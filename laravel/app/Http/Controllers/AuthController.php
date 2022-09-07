<?php

namespace App\Http\Controllers;

use App\Http\Requests\YandexAuthRequest;
use App\Models\User;
use GuzzleHttp\Client;
use GuzzleHttp\RequestOptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //get access token from url
    public function auth()
    {
        return view('users.auth');
    }

    //get access token from yandex oauth and parse user email
    public function yauth(Request $request)
    {
        $client = new Client();
        $params = [
            'format' => 'json',
            'jwt_secret' => env('YANDEX_CLIENT_SECRET'),
        ];

        $response = $client->request('GET', 'https://login.yandex.ru/info', [
            RequestOptions::HEADERS => [
                'Authorization' => 'OAuth '.$request->input('access_token'),
            ],
            RequestOptions::QUERY => $params,
        ]);
        $user = json_decode($response->getBody()->getContents(), true);

        $user = User::query()->firstOrCreate([
            'name' => $user['login'],
            'email' => $user['default_email'],
            'password' => '123890'
        ]);
        Auth::loginUsingId($user->id, true);
        echo '<script>window.close()</script>';
    }
}
