<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($project_id = null)
    {
        if (!$project_id) {
            echo 'Helaas, dit gaat niet werken!';
        }
        else {
            $project = Project::find($project_id); //
            return view('tasks.create', ['project_id'=>$project_id]);
        }
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
            'name' => 'required',
            'days' => 'required',
            'hours' => 'required',
            'project_id' => 'required'
        ]);

        Task::create($request->all());
        $project_id = $request->project_id;

        return redirect()->route('projects.show/'.$project_id)
            ->with('success', 'Task created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        $task = Task::find($task->id); //hierdoor vang je id van task af. Die bestond niet...
        return view('tasks.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $request->validate([
            'name' => 'required',
            'days' => 'required',
            'hours' => 'required',
            'project_id' => 'required'
        ]);
        $task->update($request->all());
        $project_id = $request->project_id;
        //Dit werkt nu! Door aanpassing in edit() gaat verder naar de projecten. Zou mooier zijn naar taken van betreffend
        //project
        // {{ route('projects.show', $project->id) }}
        return redirect()->route('projects.show', $project_id) // komt zo weer terug bij het project!!
            ->with('success', 'Project updated successfully')
            ->with('error', "ERROR: Check form");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
//        var_dump($task);
        $project_id=$task->project_id;
        $task->delete();
        return redirect()->route('projects.show', $project_id)
            ->with('success', 'Task deleted successfully')
            ->with('error', "ERROR: Check form");;
    }
}
