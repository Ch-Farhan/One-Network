<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\DigitalJourneyCard;
use App\Models\DigitalJourneySection;
use App\Models\Project;
use Illuminate\Http\Request;
use Session;

class ProjectController extends Controller
{
    public function projects_list()
    {
        $projects = Project::paginate(5);
        return view('admin.project.project_list',get_defined_vars());
    }

    public function add_project()
    {
        return view('admin.project.add_project',get_defined_vars());
    }

    // View Project By Unique id
    public function view_project($id)
    {
    //     dd($id);
        $projects = Project::where('id', $id)->get();
        return view('admin.project.view_project',get_defined_vars());
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
        ]);


        if ($request->id)
        {
            if ($request->file('material') == '')
            {
                $data = Project::where('id', $request->id)->first();
                $input['material'] = $data->material;
            }else {
                if ($request->hasfile('material') && !empty($request->file('material'))) {
                    $name = time() . rand(1, 100) . '.' . $request->file('material')->getClientOriginalExtension();
                    $request->file('material')->move(public_path('/image/project/'), $name);
                    $input['material'] = $name;
                }
            }
            $input['name'] = $request->name;
            $input['start_date'] = $request->start_date;
            $input['end_date'] = $request->end_date;
            $input['notes'] = $request->notes;
            $input['api'] = $request->api;
            $input['project_type'] = $request->project_type;
            $input['domain'] = $request->domain;
            $input['content_type'] = $request->content_type;
            $input['content_description'] = $request->content_description;


            $data = Project::where('id', $request->id)->update($input);
            return back()->with('success', 'Updated Successfully!');

        }

        if ($request->hasfile('material') && !empty($request->file('material'))) {
            $name = time() . rand(1, 100) . '.' . $request->file('material')->getClientOriginalExtension();
            $request->file('material')->move(public_path('/image/project/'), $name);
            $new['material'] = $name;
        }

        $new['name'] = $request->name;
        $new['start_date'] = $request->start_date;
        $new['end_date'] = $request->end_date;
        $new['status'] = 1;
        $new['notes'] = $request->notes;
        $new['api'] = $request->api;
        $new['domain'] = $request->domain;
        $new['content_type'] = $request->content_type;
        $new['content_description'] = $request->content_description;
        $input['project_type'] = $request->project_type;

        $project = new Project();
        $project->persist( $new);

        return back()->with('success', 'Added Successfully!');
    }

    public function edit_project($id)
    {
        $project = Project::find($id);
        return view('admin.project.add_project',get_defined_vars());
    }

    public function delete_project($id)
    {

        $del= Project::where('id', $id)->delete();
        return response()->json($del);
    }

    public function change_project_status(Request $request)
    {
        $del= Project::where('id', $request->id)->first();
        $booking_status = Project::where('id', $request->id)->update(['status' => $request->status]);
        return back()->with('success', 'Status Updated Successfully!');


    }



}
