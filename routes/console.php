<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Http;

Artisan::command('test', function () {

    // $response = Http::asForm()->post( 'http://passport-app.test/oauth/token', [
    //     // verizonapi
    //     'grant_type' => 'client_credentials',
    //     'client_id' => '97309a83-1b65-4a67-aed1-966ca7503011',
    //     'client_secret' => 'jWFh6qO08iCwBctpXU5nz7Pjuh43HOGSYdK5yHQD',
    //     'scope' => '',
    // ]);
    $o = json_decode( file_get_contents( base_path( 'storage/access_token' ) ) );
    //
    $accessToken = $o->access_token . 'x';
    $response = Http::withHeaders([
            'Accept' => 'application/json',
                'Authorization' => 'Bearer '.$accessToken,
    ])->get('http://passport-app.test/api/user');
    // $i = file_put_contents( base_path( 'storage/access_token' ), $response->body() );

    $this->comment( json_encode(  [  $response->status(), $response->body() ] ));
    // return $response->json()['access_token'];
})->purpose('Display an inspiring quote');
