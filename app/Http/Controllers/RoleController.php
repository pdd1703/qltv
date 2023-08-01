<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;
class RoleController extends Controller
{
    private $role;
    public function __construct(Role $role){
        $this->role = $role;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = $this->role->all();
        $data = ['role' => $role];
        return view('admin.role.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.role.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->role->create($request->all());
        return redirect()->route('admin.role.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $role = $this->role->find($id);
        $data = ['role' => $role];
        return view('admin.role.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $role = $this->role->find($id)->toArray();
        $data = ['role' => $role];
        return view('admin.role.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $role = Role::find($id);
        $role->title = $request->title;
        $role->author_id = $request->author_id;
        return redirect()->route('admin.role.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $role = $this->role->find($id);
        $role->delete();
        return redirect()->route('admin.role.index');
    }
}
