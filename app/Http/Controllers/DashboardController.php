<?php

namespace App\Http\Controllers;

use App\Models\UserPreference;
use App\Models\Category;
use App\Services\NewsLoaderService;

class DashboardController extends Controller
{
    public function __construct(
        protected NewsLoaderService $newsLoader
    ) {}

    public function index()
    {
        if (!auth()->check()) {
            return Response::denyWithStatus(403);
        }

        $categoryIds = UserPreference::getUserCategories(auth()->id());
        $dbCategoryNames = Category::getNamesByCategoryIds($categoryIds);
        
//        echo '<pre>';
//        print_r($categoryIds);
//        print_r($dbCategoryNames);
//        echo '<pre>';

        return view('dashboard', compact('dbCategoryNames'));
    }
}
