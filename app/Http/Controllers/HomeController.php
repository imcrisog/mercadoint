<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use MercadoPago\MercadoPagoConfig;
use MercadoPago\Client\Preference\PreferenceClient;

class HomeController extends Controller
{

    public function artist()
    {
        return view('artist');
    }

    public function sello()
    {
        return view('sello');
    }

    public function store_artist()
    {
        if (request('payment') == "mp") {
            return $this->mp_store_artist();
        }

        return dd("Not found method");
    }

    public function store_sello()
    {
        if (request('payment') == "mp") {
            return $this->mp_store_sello();
        }

        return dd("Not found method");
    }

    private function mp_store_artist()
    {
        MercadoPagoConfig::setAccessToken(config('services.mp.token'));

        $client = new PreferenceClient();
        $preference = $client->create([
            "items" => [[
                "title" => "Plan artista", 
                "description" => "Plan artista de IbeinMusic",
                "quantity" => 1,
                "category_id" => "LLC",
                "currency_id" => "ARS",
                "unit_price" => 200
            ]],
            "back_urls" => [
                'success' => 'http://ibein.test/mp/success',
                'pending' => 'http://ibein.test/mp/pending',
                'failure' => 'http://ibein.test/mp/failure'
            ]
        ]);

        return redirect($preference->sandbox_init_point);
    }

    private function mp_store_sello()
    {
        MercadoPagoConfig::setAccessToken(config('services.mp.token'));

        $client = new PreferenceClient();
        $preference = $client->create([
            "items" => [[
                "title" => "Plan sello", 
                "description" => "Plan sello discografico de IbeinMusic",
                "quantity" => 1,
                "category_id" => "LLC",
                "currency_id" => "ARS",
                "unit_price" => 500
            ]],
            "back_urls" => [
                'success' => 'http://ibein.test/mp/success',
                'pending' => 'http://ibein.test/mp/pending',
                'failure' => 'http://ibein.test/mp/failure'
            ]
        ]);   

        return redirect($preference->sandbox_init_point);
    }
}
