
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documents') }}
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('documents.index', ['category' => $category]) }}">{{ $category->name }} {{ count($category->document) }}</a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="grid grid-cols-3 gap-4">
                        @foreach($documents as $document)
                        <div>
                            <div class="col-1">
                                {{ $document->id }}
                            </div>
                            <div class="col-3">
                                {{ $document->name }}
                            </div>
                                {{ $document->category->name }}
                            <div class="col-2">
                                {{ $document->status }}
                            </div>
                        </div>
                        @endforeach
                    </div>
                    {{ $documents->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>