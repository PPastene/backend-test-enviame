<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Envio;

class EnvioController extends Controller
{
    public function guardar()
    {
        $body = <<<EOT
{
    "shipping_order": {
        "n_packages": "1",
        "content_description": "ORDEN 255826267",
        "imported_id": "255826267",
        "order_price": "24509.0",
        "weight": "0.98",
        "volume": "1.0",
        "type": "delivery"
    },
    "shipping_origin": {
        "warehouse_code": "401"
    },
    "shipping_destination": {
        "customer": {
            "name": "Bernardita Tapia Riquelme",
            "email": "b.tapia@outlook.com",
            "phone": "977623070"
        },
        "delivery_address": {
            "home_address": {
                "place": "Puente Alto",
                "full_address": "SAN HUGO 01324, Puente Alto, Puente Alto"
            }
        }
    },
    "carrier": {
        "carrier_code": "BLX",
        "tracking_number": ""
    }
}
EOT;
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
            'Accept' => 'application/json',
            'api-key' => 'ea670047974b650bbcba5dd759baf1ed'
        ])->withBody($body, 'application/json')->post('https://stage.api.enviame.io/api/s2/v2/companies/401/deliveries')->json();

        $envio = new Envio();
        $envio->imported_id = $response['data']['imported_id'];
        $envio->tracking_number = $response['data']['tracking_number'];
        $envio->status = $response['data']['status'];
        $envio->customer = $response['data']['customer'];
        $envio->shipping_address = $response['data']['shipping_address'];
        $envio->country = $response['data']['country'];
        $envio->carrier = $response['data']['carrier'];
        $envio->service = $response['data']['service'];
        $envio->label = $response['data']['label'];
        $envio->deadline_at = $response['data']['deadline_at'];
        $envio->links = $response['data']['links'];

        $envio->save();

        return response()->json([
            'status' => 'OK',
            'mensaje' => 'El envio se registró correctamente',
            'data' => $envio
        ], 201);
    }

}
