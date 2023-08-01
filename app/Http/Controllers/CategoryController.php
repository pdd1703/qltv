<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    private $category;
    public function __construct(Category $category){
        $this->category = $category;
    }
    public function index()
    {
        $category = $this->category->all();
        $data = ['category' => $category];
        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->category->create($request->all());
        return redirect()->route('admin.category.index');
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = $this->category->find($id);
        $data = ['category' => $category];
        return view('admin.category.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = $this->category->find($id)->toArray();
        $data = ['category' => $category];
        // dd($data);
        return view('admin.category.edit', $data);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = $this->category->find($id);
        $category->update($request->all());
        return redirect()->route('admin.category.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(String $id)
    {
        $category = $this->category->find($id);
        $category->delete();
        return redirect()->route('admin.category.index');
    }
}
