<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Department;
    
    //=======================================================================
    class DepartmentsController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\View\View
         */
        public function index(Request $request)
        {
            $keyword = $request->get("search");
            $perPage = 25;
    
            if (!empty($keyword)) {
                $department = Department::where("id","LIKE","%$keyword%")->orWhere("name", "LIKE", "%$keyword%")->paginate($perPage);
            } else {
                    $department = Department::paginate($perPage);              
            }          
            return view("department.index", compact("department"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("department.create");
        }
    
        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function store(Request $request)
        {
            $this->validate($request, [
				"name" => "nullable|max:50", //string('name',50)->nullable()

            ]);
            $requestData = $request->all();
            
            Department::create($requestData);
    
            return redirect("department")->with("flash_message", "department added!");
        }
    
        /**
         * Display the specified resource.
         *
         * @param  int  $id
         *
         * @return \Illuminate\View\View
         */
        public function show($id)
        {
            $department = Department::findOrFail($id);
            return view("department.show", compact("department"));
        }
    
        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         *
         * @return \Illuminate\View\View
         */
        public function edit($id)
        {
            $department = Department::findOrFail($id);
    
            return view("department.edit", compact("department"));
        }
    
        /**
         * Update the specified resource in storage.
         *
         * @param  int  $id
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function update(Request $request, $id)
        {
            $this->validate($request, [
				"name" => "nullable|max:50", //string('name',50)->nullable()

            ]);
            $requestData = $request->all();
            
            $department = Department::findOrFail($id);
            $department->update($requestData);
    
            return redirect("department")->with("flash_message", "department updated!");
        }
    
        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         *
         * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
         */
        public function destroy($id)
        {
            Department::destroy($id);
    
            return redirect("department")->with("flash_message", "department deleted!");
        }
    }
    //=======================================================================
    
    