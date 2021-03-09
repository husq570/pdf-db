<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Document;
use App\Models\Category;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = request()->category;
        if($category){
            $documents = Document::where('category_id', $category)->paginate(9);
        }else{
            $documents = Document::paginate(9);
        }

        $categories = Category::all();

        return view('documents.index', compact('documents', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $document = new Document();

        $categories = Category::all();

        $old_category = Category::find(request()->old('category'));

        return view('documents.create', compact('document', 'categories', 'old_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->validateRequest();

        $document_name = 'categories/'.$data['category_id'].'/'.time().'.'.$request->file->getClientOriginalExtension();
        $request->file->move(public_path('storage/uploads/categories/'.$data['category_id']), $document_name);
        $data['file_path'] = $document_name;
        unset($data['file']);

        $document = Document::create($data);

        return back()->with('success', 'Document created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateRequest()
    {
        $validatedData = request()->validate([
            'name' => 'required|min:3',
            'description' => 'required|min:3|max:128',
            'file' => 'required|mimetypes:application/pdf',
            'category_id' => 'required',
            'status' => 'required',
        ]);

        return $validatedData;
    }

}
