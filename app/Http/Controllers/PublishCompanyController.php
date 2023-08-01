<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PublishCompany;
class PublishCompanyController extends Controller
{
    private $publishCompany;
    public function __construct(PublishCompany $publishCompany){
        $this->publishCompany = $publishCompany;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publishCompany = $this->publishCompany->all();
        $data = ['publish_company' => $publishCompany];
        return view('admin.publish_company.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.publish_company.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->publishCompany->create($request->all());
        return redirect()->route('admin.publishCompany.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $publishCompany = $this->publishCompany->find($id);
        $data = ['publish_company' => $publishCompany];
        return view('admin.publish_company.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $publishCompany = $this->publishCompany->find($id);
        $data = ['publish_company' => $publishCompany];
        return view('admin.publish_company.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->publishCompany->find($id)->update($request->all());
        return redirect()->route('admin.publishCompany.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(string $id)
    {
        $this->publishCompany->find($id)->delete();
        return redirect()->route('admin.publishCompany.index');
    }
}
