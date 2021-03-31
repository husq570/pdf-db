
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
                        <div class="max-w-2xl bg-white border-2 border-gray-300 p-5 rounded-md tracking-wide shadow-lg">
                            <div id="header" class="flex">
                                <div class="w-32 rounded-md">
                                    <img alt="{{ $document->name }}" src="{{ url('storage/uploads/categories/'.$document->category_id.'/'.Str::slug($document->name).'.png') }}" />
                                </div>
                                <div id="body" class="flex flex-col ml-5">
                                    <h4 id="name" class="text-lg font-normal mb-2"><a href="{{ route('documents.show', ['document' => $document]) }}">{{ $document->name }}</a></h4>
                                    <p id="job" class="text-gray-800 mt-2">{{ Str::limit($document->description, 50) }}</p>
                                    @if(auth()->user()->hasRole('super-admin'))
                                        <div class="flex mt-5">
                                            <a class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 mr-1 rounded" href="{{ route('documents.edit', ['document' => $document]) }}">Edit</a>
                                            <form action="{{ route('documents.destroy', ['document' => $document]) }}" method="post">
                                                @method('DELETE')
                                                @csrf
                                                <button class="bg-red-500 hover:bg-red-700 text-white py-2 px-4 rounded" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                {{ $documents->links() }}
            </div>
        </div>

    </div>
</x-app-layout>