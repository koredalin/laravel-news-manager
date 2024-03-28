<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Category;
use App\Models\CategoryProvider;
use App\Services\NewsLoaderService;

class CategoryController extends Controller
{
    public function __construct(
        protected NewsLoaderService $newsLoader
    ) {}

    public function index(int $id)
    {
        if (!auth()->check()) {
            return Response::denyWithStatus(403);
        }
        
        $category = Category::with('providers')->findOrFail($id);

//        $newsData = $this->newsLoader->downloadCategoryNews($category);
        
        $newsData = config('secret.newsData');
//        echo '<pre>';
//////        print_r($dbCategoryUrls);
////        var_export($categoryUrls);
//        print_r($newsData);
//        echo '<pre>';
        

        return view('categories.index', compact('newsData'));
    }

    public function list()
    {
        $user = auth()->user();

        $selectedCategories = json_decode($user->userPreferences->categories ?? '[]', true);

        $categories = Category::all();
        return view('categories.list', compact('categories', 'selectedCategories'));
    }

    public function updatePreferences(Request $request)
    {
        $user = auth()->user();

        $validatedData = $this->getUserPreferencesValidatedData($request);

        $userPreferences = $user->userPreferences()->firstOrCreate([
            'user_id' => $user->id,
        ]);

        $userPreferences->categories = json_encode($validatedData['categories']);
        $userPreferences->save();

        return redirect()->route('category.list')->with('success', 'Your preferences have been updated successfully.');
    }
    
    private function getUserPreferencesValidatedData(Request $request): array
    {
        return $request->validate([
            'categories' => 'required|array',
            'categories.*' => 'exists:categories,id',
        ]);
    }
}
