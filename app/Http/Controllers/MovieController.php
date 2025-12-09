<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\ResponseHelper;


class MovieController extends Controller
{

    public function index(Request $request)
    {
        $needle = $request->get('needle');

        try {
            $url = $needle ? "movies?needle=" . urlencode($needle) : "movies";

            $response = Http::api()->get($url);

            if ($response->failed()) {
                $message = $response->json('message') ?? 'Ismeretlen hiba történt.';
                return redirect()
                    ->route('movies.index')
                    ->with('error', "Hiba történt a lekérdezés során: $message");
            }

            $entities = ResponseHelper::getData($response);

            return view('movies.index', ['entities' => $entities, 'isAuthenticated' => $this->isAuthenticated()]);

        } catch (\Exception $e) {
            return redirect()
                ->route('movies.index')
                ->with('error', "Nem sikerült betölteni a megyéket: " . $e->getMessage());
        }

    }

    public function show($id)
    {
        try {
            $response = Http::api()->get("/movies/$id");

            if ($response->failed()) {
                $message = $response->json('message') ?? 'A megye nem található vagy hiba történt.';
                return redirect()
                    ->route('movies.index')
                    ->with('error', "Hiba: $message");
            }

            $body = $response->json();
            $entity = $body['movie'] ?? null;

            if (!$entity) {
                return redirect()
                    ->route('movies.index')
                    ->with('error', "A megye adatai nem érhetők el.");
            }

            return view('movies.show', ['entity' => $entity]);

        } catch (\Exception $e) {
            return redirect()
                ->route('movies.index')
                ->with('error', "Nem sikerült betölteni a megye adatait: " . $e->getMessage());
        }
    }

    public function create()
    {
        return view('movies.create');
    }
	

    public function store(MovieRequest $request)
    {
        $name = $request->get('name');

        try {
            $response = Http::api()
                ->withToken($this->token)
                ->post('/movies', ['name' => $name]);

            if ($response->failed()) {
                // Ha az API válaszolt, de hibás státuszkóddal (pl. 422, 403, 500)
                $message = $response->json('message') ?? 'Nem sikerült létrehozni a megyét.';
                return redirect()
                    ->route('movies.index')
                    ->with('error', "Hiba: $message");
            }

            return redirect()
                ->route('movies.index')
                ->with('success', "$name megye sikeresen létrehozva!");

        } catch (\Exception $e) {
            // Hálózati vagy JSON dekódolási hiba
            return redirect()
                ->route('movies.index')
                ->with('error', "Nem sikerült kommunikálni az API-val: " . $e->getMessage());
        }

    }

	public function edit($id)
    {
        try {
            $response = Http::api()->get("/movies/$id");

            if ($response->failed()) {
                $message = $response->json('message') ?? 'A megye nem található vagy hiba történt.';
                return redirect()
                    ->route('movies.index')
                    ->with('error', "Hiba: $message");
            }

            $body = $response->json();
            $entity = $body['movie'] ?? null;

            if (!$entity) {
                return redirect()
                    ->route('movies.index')
                    ->with('error', "A megye adatai nem érhetők el.");
            }

            return view('movies.edit', ['entity' => $entity]);

        } catch (\Exception $e) {
            return redirect()
                ->route('movies.index')
                ->with('error', "Nem sikerült betölteni a megye szerkesztő nézetét: " . $e->getMessage());
        }
    }


    public function update(MovieRequest $request, $id)
    {
        $name = $request->get('name');

        try {
            $response = Http::api()
                ->withToken($this->token)
                ->put("/movies/$id", ['name' => $name]);

            if ($response->successful()) {
                return redirect()
                    ->route('movies.index')
                    ->with('success', "$name megye sikeresen frissítve!");
            }

            // Ha nem sikeres, de nem dobott kivételt (pl. 422)
            $errorMessage = $response->json('message') ?? 'Ismeretlen hiba történt.';
            return redirect()
                ->route('movies.index')
                ->with('error', "Hiba történt: $errorMessage");

        } catch (\Exception $e) {
            // Hálózati vagy egyéb kivétel
            return redirect()
                ->route('movies.index')
                ->with('error', "Nem sikerült frissíteni: " . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $response = Http::api()
                ->withToken($this->token)
                ->delete("/movies/$id", ['id' => $id]);

            if ($response->failed()) {
                $message = $response->json('message') ?? 'Nem sikerült törölni a megyét.';
                return redirect()
                    ->route('movies.index')
                    ->with('error', "Hiba: $message");
            }

            $body = $response->json();
            $name = $body['name'] ?? 'Ismeretlen';

            return redirect()
                ->route('movies.index')
                ->with('success', "$name megye sikeresen törölve!");

        } catch (\Exception $e) {
            return redirect()
                ->route('movies.index')
                ->with('error', "Nem sikerült kommunikálni az API-val: " . $e->getMessage());
        }
    }

}
