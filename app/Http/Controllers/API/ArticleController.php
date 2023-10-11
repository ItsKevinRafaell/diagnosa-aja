<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class ArticleController extends Controller {
    function article() {
        $apiKey = 'f481cde4c777493d90d261d0a593cde8';
        $country = 'id';
        $category = 'health';

        $response = Http::get("https://newsapi.org/v2/top-headlines", [
            'country' => $country,
            'category' => $category,
            'apiKey' => $apiKey,
        ]);

        $data = $response->json();
        $articles = $data['articles'];
        $perPage = 20;

        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = array_slice($articles, ($currentPage - 1) * $perPage, $perPage);
        $paginatedData = new LengthAwarePaginator($currentItems, count($articles), $perPage);

        $paginatedData->appends(['country' => $country, 'category' => $category]);

        return view('article.index', compact('paginatedData'));
    }
}
