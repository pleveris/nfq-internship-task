<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Group;
use App\Models\Status;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::all();
        if($projects->count() ==0) return redirect()->route('projects.create');
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formData = $request->validate([
            'title' => 'required|max:255',
            'numGroups' => 'required',
            'numStudents' => 'required'
        ]);

        $newProject = new Project();
        $newProject->title = $formData['title'];
        $newProject->numGroups = $formData['numGroups'];
        $newProject->numStudentsInEach = $formData['numStudents'];
        $newProject->studentsTotal=0;
        $newProject->save();
        $project_id = Project::where('id','>',0)->max('id');
        for($i=1; $i <= $formData['numGroups']; $i++) {
            $newGroup = new Group();
            $newGroup->project_id = $project_id;
            $newGroup->title = $formData['title'].' [group '.$i.']';
            $newGroup->save();
        }
        $status = new Status();
        $status->status_message = 'The new project of '.$newProject->numGroups.' groups was just created: '.$newProject->title.'.';
        $status->save();
        return redirect()->route('projects.index')->with('msg', 'The project was successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        return view('projects.show', compact('project'));
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
}
