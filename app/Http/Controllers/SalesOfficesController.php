<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\SalesOffice;

//=======================================================================
class SalesOfficesController extends Controller
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

            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [sales_offices]--
            // ----------------------------------------------------
            $sales_office = DB::table("sales_offices")
                ->orWhere("sales_offices.name", "LIKE", "%$keyword%")->orWhere("sales_offices.新規列", "LIKE", "%$keyword%")->orWhere("sales_offices.新規列", "LIKE", "%$keyword%")->select("*")->addSelect("sales_offices.id")->paginate($perPage);
        } else {
            //$sales_office = SalesOffice::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [sales_offices]--
            // ----------------------------------------------------
            $sales_office = DB::table("sales_offices")
                ->select("*")->addSelect("sales_offices.id")->paginate($perPage);
        }
        return view("sales_office.index", compact("sales_office"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("sales_office.create");
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

        SalesOffice::create($requestData);

        return redirect("sales_office")->with("flash_message", "sales_office added!");
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
        //$sales_office = SalesOffice::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [sales_offices]--
        // ----------------------------------------------------
        $sales_office = DB::table("sales_offices")
            ->select("*")->addSelect("sales_offices.id")->where("sales_offices.id", $id)->first();
        return view("sales_office.show", compact("sales_office"));
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
        $sales_office = SalesOffice::findOrFail($id);

        return view("sales_office.edit", compact("sales_office"));
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

        $sales_office = SalesOffice::findOrFail($id);
        $sales_office->update($requestData);

        return redirect("sales_office")->with("flash_message", "sales_office updated!");
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
        SalesOffice::destroy($id);

        return redirect("sales_office")->with("flash_message", "sales_office deleted!");
    }
}
    //=======================================================================
