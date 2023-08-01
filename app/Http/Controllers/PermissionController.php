<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Spatie\Permission\Models\Permission;
use App\Models\Permission;
class PermissionController extends Controller
{
    private $permission;
    public function __construct(Permission $permission){
        $this->permission = $permission;
    }
    public function index()
    {
        $permission = $this->permission->all();
        $data = ['permission' => $permission];
        return view('admin.permission.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->permission->create($request->all());
        return redirect()->route('admin.permission.index');
        //dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $permission = $this->permission->find($id);
        $data = ['permission' => $permission];
        return view('admin.permission.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $permission = $this->permission->find($id)->toArray();
        $data = ['permission' => $permission];
        // dd($data);
        return view('admin.permission.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $permission = $this->permission->find($id);
        $permission->update($request->all());
        return redirect()->route('admin.permission.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(String $id)
    {
        $permission = $this->permission->find($id);
        $permission->delete();
        return redirect()->route('admin.permission.index');
    }
}
