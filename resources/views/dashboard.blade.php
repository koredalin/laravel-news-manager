<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <!--<div class="news-container" style="height: 500px; overflow: scroll; padding: 20px;">-->
                        @forelse ($dbCategoryNames as $catId => $catName)
                            <div class="news-article">
                                <a href="{{ route('category.index', ['id' => $catId,]) }}">{{ ucfirst($catName) }}</a>
                            </div>
                        @empty
                        <p>No categories chosen yet.</p>
                        <p>Please, go to <a href="/user_preference"><b>Your Categories</b></a>.</p>
                        @endforelse

                        <div class="links-vertical-space"></div>
                        
                        <div class="news-article">
                            <a href="/user_preference">Your Categories</a>
                        </div>
                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
