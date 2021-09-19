<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;
use App\Category;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('service.index', 
            ['title' => "Service", 'records' => Service::with('categories')->get() ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create', ['title' => "Create New Category", 'category' => Category::pluck('name', 'id')]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'bail|required|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|digits_between:1,7'
        ]);
        Service::create($request->only('name', 'category_id', 'price'));

        return redirect()->route('service.index')->with('success', 'Service Created successfully!');
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
        return view('Service.edit', 
            [
                'record' => Service::findOrFail($id), 'title' => 'Edit Service',
               'category' => Category::pluck('name', 'id')
            ]
        );
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
        $request->validate([
            'name' => 'bail|required|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|digits_between:1,7'
        ]);
        Service::where('id', $id)->update($request->only('name', 'category_id', 'price'));
         return redirect()->route('service.index')->with('success', 'Service Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Service::destroy($id);
       return redirect()->back()->with('success', 'Service deleted');
    }
}
