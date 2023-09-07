<?php

namespace App\Http\Controllers;

use App\Models\Section;
use App\sections;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $sections = Section::all();
        $sections = Section::with('products')->get();
        return view('sections.sections',compact('sections'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:sections|max:255',
        ], [
            'name.required' => 'يرجي إدخال اسم القسم',
            'name.unique' => 'اسم القسم مسجل مسبقاً',
        ]);

        Section::create([
            'name' => $request->name,
            'description' => $request->description,
            'created_by' => Auth::user()->name,
        ]);

        session()->flash('Add', 'تم إضافة القسم بنجاح ');
        return redirect('/sections');
    }

    /**
     * Display the specified resource.
     */
    public function show(Section $section)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Section $section)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = $request->id;

        $this->validate($request, [
            'name' => 'required|max:255|unique:sections,name,'.$id,
        ],[

            'name.required' =>'يرجي إدخال اسم القسم',
            'name.unique' =>'اسم القسم مسجل مسبقا',

        ]);
        $section = Section::find($id);
        $section->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        session()->flash('edit','تم تعديل القسم بنجاح');
        return redirect('/sections');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->id;
        Section::find($id)->delete();
        session()->flash('delete','تم حذف القسم بنجاح');
        return redirect('/sections');
    }
}
