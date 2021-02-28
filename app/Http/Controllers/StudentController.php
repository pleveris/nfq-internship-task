<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Project;
use App\Models\Group;
use App\Models\Status;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $student = Student::all();
        $title = []; 
        foreach($student as $students) {
            $title[$students->group_id] = Group::findOrFail($students->group_id)->title;
        }
        return view('index', compact('student', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project)
    {
        $groups = Group::where('project_id','=',$project->id)->get();
        return view('students.create', compact('groups', 'project'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $project_id)
    {
        $storeData = $request->validate([
            'name' => 'required|max:255|unique:Students',
            'group_id' => 'required'
        ]);
        $storeData['project_id'] = $project_id;
        $project = Project::findOrFail($project_id);
        $group = Group::findOrFail($storeData['group_id']);
        if($group->stud_count == $project->numStudentsInEach) return back()->withInput()->with('msg', 'this group is already full!');
        $student = Student::create($storeData);
//        $project = Project::where('id','=',$storeData['project_id'])->first();
        $project->studentsTotal++;
        $group->stud_count++;
        $project->save();
        $group->save();
        $status = new Status();
        $status->status_message = $storeData['name'].' has just been added to a project '.$project->title.'.';
        $status->save();
        return redirect('/students')->with('completed', 'Student has been saved!');
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
        $student = Student::findOrFail($id);
        $groups = Group::where('project_id','=',$student->project_id)->get();
        return view('students.edit', compact('student', 'groups'));
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
        $updateData = $request->validate([
            'name' => 'required|max:255|unique:Students',
            'group_id' => 'required'
        ]);
        $student = Student::findOrFail($id);
        $project = Project::findOrFail($student->project_id);
        $group = Group::findOrFail($student->group_id);
        $status = new Status();
        $status->status_message = $updateData['name'].' ';
        if($group->id != $updateData['group_id']) {
            $currGroup = Group::findOrFail($updateData['group_id']);
            if($currGroup->stud_count == $project->numStudentsInEach) return back()->withInput()->with('msg', 'this group is already full!');
            $group->stud_count--;
            $status->status_message .= 'has just moved from '.$group->title.' ';
            $currGroup->stud_count++;
            $status->status_message .= 'to '.$currGroup->title.'.';
            $group->save();
            $currGroup->save();
            $status->save();
        }
        Student::whereId($id)->update($updateData);
        return redirect('/students')->with('completed', 'Student has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $project = Project::findOrFail($student->project_id);
        $group = Group::findOrFail($student->group_id);
        $status = new Status();
        $project->studentsTotal--;
        $group->stud_count--;
        $project->save();
        $group->save();
        $student->delete();
        $status->status_message = $student->name.' was just removed from the project '.$project->title.'.';
        $status->save();
        return redirect('/students')->with('completed', 'Student has been removed');
    }
}
