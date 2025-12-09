<?php

namespace App\Helpers;

class ResponseHelper
{
    /**
     * Kiolvassa a választ az API válaszából.
     *
     * @param \Illuminate\Http\Client\Response $response
     * @return mixed
     */
    public static function getData($response)
    {
        if ($response->successful()) {
            // Feltételezve, hogy a válaszban a 'data' kulcs tartalmazza az adatokat.
            return $response->json('data');
        } elseif ($response->clientError()) {
            // Kliensehhiba kezelése (pl. 400 Bad Request)
            throw new \Exception('A kérés hibás volt. Kérlek próbáld újra.');
        } elseif ($response->serverError()) {
            // Szerverhiba kezelése (pl. 500 Internal Server Error)
            throw new \Exception('Szerver hiba történt. Kérlek próbáld újra később.');
        } else {
            // Alapértelmezett hibakezelés
            throw new \Exception('Ismeretlen hiba történt a lekérdezés során.');
        }
    }
}