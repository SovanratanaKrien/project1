<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->paginate(5);
    
        return view('projects.index',compact('projects'))
            ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    public function create()
    {
        return view('projects.create');
    }

    public function store(Request $request)
    {
         
        $request->validate([
            'name' => 'required',
            'filenames' => 'required',
            'dob' => 'required',
            'Description' => 'required'
        ]);
 
        $input = $request->all();
  
        if ($filenames = $request->file('filenames')) {
            $destinationPath = 'frontend/files/';
            $file = date('YmdHis') . "." . $filenames->getClientOriginalExtension();
            $filenames->move($destinationPath, $file);
            $input['filenames'] = "$file";
        }
    
        // dd($input = $request->all());
        Project::create($input);

        return redirect('projects')->with('status', 'File Has been uploaded successfully');
 
    }

    public function destroy(Project $projects)
    {
        $projects->delete();
     
        return redirect()->route('projects.index')
                        ->with('status','project deleted successfully');
    }

    public function show(Project $projects)
    {
        return view('projects.show',compact('project'));
    }
}
