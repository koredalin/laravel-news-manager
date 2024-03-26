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
                  ХХХХХХХХХХХХХХХХХХХ
                  <br>
                  {!! $news !!}
<?php /*                    <div class="news-container" style="height: 500px; overflow: scroll; padding: 20px;">
                        @forelse ($news as $article)
                            <div class="news-article" style="margin-bottom: 20px; padding: 10px; background-color: #f9f9f9; border-radius: 5px;">
                                <h2>{{ $article->title }}</h2>
                                <p>{{ $article->summary }}</p>
                                <a href="{{ $article->url }}" target="_blank">Read more</a>
                            </div>
                        @empty
                            <p>No news to show.</p>
                        @endforelse
                    </div>
 * 
 */ ?>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
