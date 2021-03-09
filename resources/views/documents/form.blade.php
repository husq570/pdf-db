<div>
    <label class="block font-medium text-sm text-gray-700" for="frm-name">Name</label>
    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" class="form-control" id="frm-name" name="name" value="{{ old('name') ?? $document->name }}">
    <div class="text-red-600">
        {{ $errors->first('name') }}
    </div>
</div>
<div class="mt-4">
    <label class="block font-medium text-sm text-gray-700" for="frm-description">Description</label>
    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="text" class="form-control" id="frm-description" name="description" value="{{ old('description') ?? $document->description }}">
    <div class="text-red-600">
        {{ $errors->first('description') }}
    </div>
</div>

<div class="mt-4">
    <label class="block font-medium text-sm text-gray-700" for="file">File</label>
    <input class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" type="file" class="form-control" id="frm-file" value="{{ old('file') ?? $document->file_path }}" name="file">
    <div class="text-red-600">
        {{ $errors->first('file') }}
    </div>
</div>

<div class="mt-4">
    <label class="block font-medium text-sm text-gray-700" for="status">Category</label>
    <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="category_id" class="form-control" id="frm-active">
        <option value="" disabled>Select category</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
        @endforeach
    </select>
    <div class="text-red-600">
        {{ $errors->first('category') }}
    </div>
</div>

<div class="mt-4">
    <label class="block font-medium text-sm text-gray-700" for="status">Status</label>
    <select class="rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 block mt-1 w-full" name="status" class="form-control" id="frm-active">
        <option value="1" {{ old('status') == 1 ? 'selected' : '' }}>Enabled</option>
        <option value="0" {{ old('status') == 0 ? 'selected' : '' }}>Disabled</option>
    </select>
</div>

@csrf
