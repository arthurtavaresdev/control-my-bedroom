<?php

namespace App\Clients\Tuya;

use tuyapiphp\TuyaApi;

class Devices
{
    public static function getDevices(): \tuyapiphp\Devices
    {
        $tuyaApi = app(TuyaApi::class);
        $accessToken = $tuyaApi->token->get_new()->result->access_token;

        return $tuyaApi->devices($accessToken);
    }
}
