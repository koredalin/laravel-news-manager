<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest News') }}
        </h2>
        <div class="provider-links">
            Providers: 
            <a href="{{ route('category.index', ['id' => $category->id,]) }}" class="provider-link">NEWS API ORG</a> |
            <a href="{{ route('category.index', ['id' => $category->id, 'provider' => 'news_data_io']) }}" class="provider-link">NEWS DATA IO</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                @if ($provider !== 'NEWS_DATA_IO')
                    <div class="p-6 bg-white border-b border-gray-200">

                        <h3 class="text-lg font-normal leading-6 text-gray-900">News from <strong>NEWS API ORG</strong></h3>
                        <h4 class="text-base font-normal leading-6 text-gray-900">Category <strong>{{ strtoupper($category->name) }}</strong></h4>
                        
                        @forelse ($newsData->articles as $article)
                            <div class="mt-4">
                                <div class="text-xl font-semibold">{{ $article->title }}</div>
                                <div class="text-gray-600">Author: {{ $article->author ?? 'Unknown' }}</div>
                                <div class="text-gray-600">Published at: {{ $article->publishedAt ?? 'Unknown' }}</div>
                                <a href="{{ $article->url }}" class="text-blue-500 hover:text-blue-700" target="_blank">Read more...</a>
                            </div>
                        @empty
                            <p>No news available for NEWS API ORG.</p>
                        @endforelse
                        
                        <div class="pagination-links">
                            @if ($pageNum > 1)
                            <a href="{{ route('category.index', ['id' => $category->id, 'page' => $pageNum - 1]) }}">Previous Page</a> |
                            @endif
                            <a href="{{ route('category.index', ['id' => $category->id, 'page' => $pageNum > 0 ? $pageNum + 1 : 2]) }}">Next Page</a>
                        </div>
                    </div>
                @endif
                
                @if ($provider === 'NEWS_DATA_IO')
                    <div class="p-6 bg-white border-b border-gray-200">

                      <h3 class="text-lg font-normal leading-6 text-gray-900">News from <strong>NEWS DATA IO</strong></h3>
                        <h4 class="text-base font-normal leading-6 text-gray-900">Category <strong>{{ strtoupper($category->name) }}</strong></h4>
                        @forelse ($newsData->results as $result)
                            <div class="mt-4 flex">
                                @if ($result->image_url)
                                    <div class="mr-4 flex-shrink-0">
                                        <img src="{{ $result->image_url }}" alt="News image" style="width: 100px; height: auto;">
                                    </div>
                                @endif
                                <div>
                                    <div class="text-xl font-semibold">{{ $result->title }}</div>
                                    <div class="text-gray-600">Author: {{ $result->creator[0] ?? 'Unknown' }}</div>
                                    <div class="text-gray-600">Published at: {{ $result->pubDate ?? 'Unknown' }}</div>
                                    <div class="mt-2 text-gray-600">{{ strip_tags($result->description, '<a><p><br>') }}</div>
                                    <a href="{{ $result->link }}" class="text-blue-500 hover:text-blue-700" target="_blank">Read more at {{ $result->source_id }}</a>
                                </div>
                            </div>
                        @empty
                            <p>No news available for NEWS DATA IO.</p>
                        @endforelse
                    
                        
                        <div class="pagination-links">
                            @if ($pageNum)
                            <a href="{{ route('category.index', ['id' => $category->id, 'page' => $pageNum - 1]) }}">Previous Page</a> |
                            @endif
                            <a href="{{ route('category.index', ['id' => $category->id, 'page' => $newsData->nextPage]) }}">Next Page</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>