<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Latest News') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">News from NEWS_API_ORG</h3>
                    
                    @if (!empty($newsData['NEWS_API_ORG']->articles))
                        @forelse ($newsData['NEWS_API_ORG']->articles as $article)
                            <div class="mt-4">
                                <!-- Показване на статиите както по-рано -->
                                <div class="text-xl font-semibold">{{ $article->title }}</div>
                                <div class="text-gray-600">Author: {{ $article->author ?? 'Unknown' }}</div>
                                <div class="text-gray-600">Published at: {{ $article->publishedAt ?? 'Unknown' }}</div>
                                <a href="{{ $article->url }}" class="text-blue-500 hover:text-blue-700" target="_blank">Read more...</a>
                            </div>
                        @empty
                            <p>No news available for NEWS_API_ORG.</p>
                        @endforelse
                    @else
                        <p>No news downloaded from NEWS_API_ORG.</p>
                    @endif
                    
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">News from NEWS_DATA_IO</h3>
                    
                    @if (!empty($newsData['NEWS_DATA_IO']->results))
                        @forelse ($newsData['NEWS_DATA_IO']->results as $result)
                            <div class="mt-4 flex">
                                <!-- Показване на статиите както по-рано -->
                                @if ($result->image_url)
                                    <div class="mr-4 flex-shrink-0">
                                        <img src="{{ $result->image_url }}" alt="News image" style="width: 100px; height: auto;">
                                    </div>
                                @endif
                                <div>
                                    <div class="text-xl font-semibold">{{ $result->title }}</div>
                                    <div class="text-gray-600">Author: {{ $result->creator[0] ?? 'Unknown' }}</div>
                                    <div class="text-gray-600">Published at: {{ $result->pubDate ?? 'Unknown' }}</div>
                                    <div class="mt-2 text-gray-600">{{ $result->description }}</div>
                                    <a href="{{ $result->link }}" class="text-blue-500 hover:text-blue-700" target="_blank">Read more at {{ $result->source_id }}</a>
                                </div>
                            </div>
                        @empty
                            <p>No news available for NEWS_DATA_IO.</p>
                        @endforelse
                    @else
                        <p>No news downloaded from NEWS_DATA_IO.</p>
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</x-app-layout>