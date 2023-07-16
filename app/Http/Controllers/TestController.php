<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController
{
    public function index(Request $request)
    {
        $fullNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
        $solidityNode = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');
        $eventServer = new \IEXBase\TronAPI\Provider\HttpProvider('https://api.trongrid.io');

        try {
            $tron = new \IEXBase\TronAPI\Tron($fullNode, $solidityNode, $eventServer);
        } catch (\IEXBase\TronAPI\Exception\TronException $e) {
            exit($e->getMessage());
        }


//        $tron->setAddress('TSDkrYw5ok5nRosZhVtEkkB8B1KAUUHtUT');
        $balance = $tron->getBalance(null, true);

        dd($balance);
    }

}
