<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->get('q', '');
        
        if (strlen($query) < 2) {
            return response()->json([]);
        }

        $animeData = collect(require app_path('Data/animeData.php'));

        $results = $animeData
            ->filter(function ($anime) use ($query) {
                return str_contains(strtolower($anime['title']), strtolower($query)) ||
                       str_contains(strtolower($query), strtolower($anime['title']));
            })
            ->map(function ($anime) {
                return [
                    'id' => $anime['id'],
                    'title' => $anime['title'],
                    'image' => $anime['image'],
                    'year' => $anime['year'],
                    'type' => $anime['type'],
                    'rating' => $anime['rating'],
                ];
            })
            ->values()
            ->take(10);

        return response()->json($results);
    }
}