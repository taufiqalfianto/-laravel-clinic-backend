<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Satusehat\Integration\OAuth2Client;

class SatuSehatTokenController extends Controller
{
    public function token()
    {
        $client = new OAuth2Client;
        $token = $client->token();

        return response()->json(['token' => $token], 200);
    }
}
