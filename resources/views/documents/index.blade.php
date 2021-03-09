
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Documents') }}
        </h2>
    </x-slot>

    <x-slot name="sidebar">
        <div class="py-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        @foreach($categories as $category)
                        <li>
                            <a href="{{ route('documents.index', ['category' => $category]) }}">{{ $category->name }} <span class="float-right">{{ count($category->document) }}</span></a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="py-6">

        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="grid grid-cols-3 gap-4">
                    @foreach($documents as $document)
                    <div>
                        <div class="col-1">
                            ID: {{ $document->id }}
                        </div>
                        <div class="col-3">
                            Name: {{ $document->name }}
                        </div>
                        <div>
                            Category: {{ $document->category->name }}
                        </div>
                        <div class="col-2">
                            Status: {{ $document->status }}
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $documents->links() }}
            </div>
        </div>

    </div>
</x-app-layout>