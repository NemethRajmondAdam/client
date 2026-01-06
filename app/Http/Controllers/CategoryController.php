<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Helpers\ResponseHelper;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $needle = $request->get('needle');

        try {
            $url = $needle ? "categories?needle=" . urlencode($needle) : "categories";

            $response = Http::api()->get($url);

            if ($response->failed()) {
                $message = $response->json('message') ?? 'Ismeretlen hiba történt.';
                return redirect()
                    ->route('categories.index')
                    ->with('error', "Hiba történt a lekérdezés során: $message");
            }

            $entities = ResponseHelper::getData($response,'categories');
            /*var_dump($entities);
            die;*/

            return view('categories.index', ['categories' => $entities, 'isAuthenticated' => $this->isAuthenticated()]);

        } catch (\Exception $e) {
            return redirect()
                ->route('categories.index')
                ->with('error', "Nem sikerült betölteni a megyéket: " . $e->getMessage());
        }
    }


    public function show($id)
    {
        try {
            $response = Http::api()->get("/categories/$id");

            if ($response->failed()) {
                $message = $response->json('message') ?? 'A film nem található vagy hiba történt.';
                return redirect()
                    ->route('categories.index')
                    ->with('error', "Hiba: $message");
            }

            $body = $response->json();
            $entity = $body['category'] ?? null;

            if (!$entity) {
                return redirect()
                    ->route('categories.index')
                    ->with('error', "A megye adatai nem érhetők el.");
            }

            return view('categories.show', ['entity' => $entity]);

        } catch (\Exception $e) {
            return redirect()
                ->route('categories.index')
                ->with('error', "Nem sikerült betölteni a megye adatait: " . $e->getMessage());
        }
    }

    public function create()
    {
        return view('categories.create');
    }
	

    public function store(CategoryRequest $request)
    {
        $name = $request->get('name');

        try {
            $response = Http::api()
                ->withToken($this->token)
                ->post('/categories', ['name' => $name]);

            if ($response->failed()) {
                // Ha az API válaszolt, de hibás státuszkóddal (pl. 422, 403, 500)
                $message = $response->json('message') ?? 'Nem sikerült létrehozni a megyét.';
                return redirect()
                    ->route('categories.index')
                    ->with('error', "Hiba: $message");
            }

            return redirect()
                ->route('categories.index')
                ->with('success', "$name megye sikeresen létrehozva!");

        } catch (\Exception $e) {
            // Hálózati vagy JSON dekódolási hiba
            return redirect()
                ->route('categories.index')
                ->with('error', "Nem sikerült kommunikálni az API-val: " . $e->getMessage());
        }

    }

	public function edit($id)
    {
        try {
            $response = Http::api()->get("/categories/$id");

            if ($response->failed()) {
                $message = $response->json('message') ?? 'A megye nem található vagy hiba történt.';
                return redirect()
                    ->route('categories.index')
                    ->with('error', "Hiba: $message");
            }

            $body = $response->json();
            $entity = $body['category'] ?? null;

            if (!$entity) {
                return redirect()
                    ->route('categories.index')
                    ->with('error', "A megye adatai nem érhetők el.");
            }

            return view('categories.edit', ['entity' => $entity]);

        } catch (\Exception $e) {
            return redirect()
                ->route('categories.index')
                ->with('error', "Nem sikerült betölteni a megye szerkesztő nézetét: " . $e->getMessage());
        }
    }


    public function update(CategoryRequest $request, $id)
    {
        $name = $request->get('name');

        try {
            $response = Http::api()
                ->withToken($this->token)
                ->put("/categories/$id", ['name' => $name]);

            if ($response->successful()) {
                return redirect()
                    ->route('categories.index')
                    ->with('success', "$name megye sikeresen frissítve!");
            }

            // Ha nem sikeres, de nem dobott kivételt (pl. 422)
            $errorMessage = $response->json('message') ?? 'Ismeretlen hiba történt.';
            return redirect()
                ->route('categories.index')
                ->with('error', "Hiba történt: $errorMessage");

        } catch (\Exception $e) {
            // Hálózati vagy egyéb kivétel
            return redirect()
                ->route('categories.index')
                ->with('error', "Nem sikerült frissíteni: " . $e->getMessage());
        }
    }


    public function destroy($id)
    {
        try {
            $response = Http::api()
                ->withToken($this->token)
                ->delete("/categories/$id", ['id' => $id]);

            if ($response->failed()) {
                $message = $response->json('message') ?? 'Nem sikerült törölni a megyét.';
                return redirect()
                    ->route('categories.index')
                    ->with('error', "Hiba: $message");
            }

            $body = $response->json();
            $name = $body['name'] ?? 'Ismeretlen';

            return redirect()
                ->route('categories.index')
                ->with('success', "$name megye sikeresen törölve!");

        } catch (\Exception $e) {
            return redirect()
                ->route('categories.index')
                ->with('error', "Nem sikerült kommunikálni az API-val: " . $e->getMessage());
        }
    }
}
