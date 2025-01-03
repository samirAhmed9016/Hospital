<?php

namespace App\Repository\Sections;

use App\Interfaces\Sections\SectionRepositoryInterface;
use App\Models\Section;
use Illuminate\Database\Eloquent\Model;

class SectionRepository implements SectionRepositoryInterface
{

    public function index()
    {
        $sections = Section::all();
        return view('Dashboard.Sections.index', compact('sections'));
    }
    public function store($request)
    {

        Section::create([
            'name' => $request->input('name'),
        ]);
        session()->flash('add');
        return redirect()->route('sections.index');
    }
    // public function edit($id)
    // {
    //     $section = Section::find($id);
    //     return view('Dashboard.Sections.edit', compact('section'));
    // }
    public function update($request)
    {
        $section = Section::findOrFail($request->id);
        $section->update([
            'name' => $request->input('name'),
        ]);
        session()->flash('edit');
        return redirect()->route('sections.index');
    }
    public function destroy($request)
    {
        $section = Section::findOrFail($request->id);
        $section->delete();
        session()->flash('delete');
        return redirect()->route('sections.index');
    }
}
