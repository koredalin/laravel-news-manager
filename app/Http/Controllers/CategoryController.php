<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Provider;
use App\Services\NewsLoaderService;

class CategoryController extends Controller
{
    public function __construct(
        protected NewsLoaderService $newsLoader
    ) {}

    public function index(Request $request, int $id)
    {
        if (!auth()->check()) {
            return Response::denyWithStatus(403);
        }
        $provider = strtoupper($request->get('provider', 'news_api_org'));
        if (!in_array($provider, Provider::API_NAMES, true)) {
            $provider = Provider::NEWS_API_ORG;
        }
        
        $category = Category::with('providers')->findOrFail($id);

        $pageNum = (int) $request->get('page', 0);
        if ($pageNum === 0) {
            $pageNum = null;
        }

        if ($provider === Provider::NEWS_DATA_IO) {
            $newsData = $this->newsLoader->getNewsDataCategoryNews($category, $pageNum);
        } else {
            $newsData = $this->newsLoader->getNewsApiCategoryNews($category, $pageNum);
        }
        
//        $newsData = config('secret.newsData');
//        echo '<pre>';
//        print_r($newsData);
//        echo '<pre>';
        

        return view('categories.index', compact('category', 'provider', 'newsData'));
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
