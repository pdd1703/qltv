<?php

namespace App\Http\Controllers;
use App\Models\Block;
use Illuminate\Http\Request;

class BlockController extends Controller
{
    private $block;
    public function __construct(Block $block){
        $this->block = $block;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $block = $this->block->all();
        $data = ['block' => $block];
        return view('admin.block.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.block.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->block->create($request->all());
        return redirect()->route('admin.block.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $block = $this->block->find($id);
        $data = ['block' => $block];
        return view('admin.block.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $block = $this->block->find($id)->toArray();
        $data = ['block' => $block];
        return view('admin.block.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $block = $this->block->find($id);
        $block->update($request->all());
        return redirect()->route('admin.block.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $block = $this->block->find($id);
        $block->delete();
        return redirect()->route('admin.block.index');
    }
}
