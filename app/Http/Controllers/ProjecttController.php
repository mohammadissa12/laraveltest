<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Projects;
use App\Models\Currency;
use App\Models\Price;


class ProjecttController extends Controller
{
    public function add_project()
    {
        return view('addProject');
    }
    public function store_project(Request $request)
    {
        $post = new Projects;
        $post->project_name = $request->project_name;
        $post->description = $request->description;
        $post->save();
        return redirect('/')->with('status', 'Projct Post Form Data Has Been inserted');
    }
    public function get_projects(Request $request){
        $projects = Projects::get();
        return view('projects', compact('projects'));
    }
    public function get_project(Request $request,$id){
        $project = Projects::where('id',$id )->first();
        $items = Currency::pluck('currency_name', 'id');
        $selectedID = 2;
        return view('projectview', compact('project','selectedID', 'items'));
    }
    public function store_price(Request $request)
    {
        $post = new Price;
        $post->price = $request->price;
        $post->project_id = $request->project_id;
        $post->currency_id = $request->currency_id;
        $post->save();
        return redirect('/')->with('status', 'Projct Price Form Data Has Been inserted');
    }

}
