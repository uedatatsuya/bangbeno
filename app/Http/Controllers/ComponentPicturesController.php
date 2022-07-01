<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\ComponentPicture;

//=======================================================================
class ComponentPicturesController extends Controller
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
            // -- QueryBuilder: SELECT [component_pictures]--
            // ----------------------------------------------------
            $component_picture = DB::table("component_pictures")
                // ->leftJoin("distribution_boards","distribution_boards.id", "=", "component_pictures.distribution_board_id")
                ->orWhere("component_pictures.distribution_board_id", "LIKE", "%$keyword%")->orWhere("component_pictures.path", "LIKE", "%$keyword%")->orWhere("distribution_boards.investigation_id", "LIKE", "%$keyword%")->orWhere("distribution_boards.category", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_circuit", "LIKE", "%$keyword%")->orWhere("distribution_boards.supply_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.special_report", "LIKE", "%$keyword%")->orWhere("distribution_boards.carry_route_movie", "LIKE", "%$keyword%")->orWhere("distribution_boards.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.is_update_proposal", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture_comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_repair_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.installation_location", "LIKE", "%$keyword%")->orWhere("distribution_boards.change_method", "LIKE", "%$keyword%")->orWhere("distribution_boards.power_outage_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.remark", "LIKE", "%$keyword%")->select("*")->addSelect("component_pictures.id")->paginate($perPage);
        } else {
            //$component_picture = ComponentPicture::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [component_pictures]--
            // ----------------------------------------------------
            $component_picture = DB::table("component_pictures")
                // ->leftJoin("distribution_boards","distribution_boards.id", "=", "component_pictures.distribution_board_id")
                ->select("*")->addSelect("component_pictures.id")->paginate($perPage);
        }
        return view("component_picture.index", compact("component_picture"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("component_picture.create");
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
            "distribution_board_id" => "nullable|integer", //integer('distribution_board_id')->nullable()
            "path" => "nullable|max:100", //string('path',100)->nullable()

        ]);
        $requestData = $request->all();

        ComponentPicture::create($requestData);

        return redirect("component_picture")->with("flash_message", "component_picture added!");
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
        //$component_picture = ComponentPicture::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [component_pictures]--
        // ----------------------------------------------------
        $component_picture = DB::table("component_pictures")
            ->leftJoin("distribution_boards", "distribution_boards.id", "=", "component_pictures.distribution_board_id")
            ->select("*")->addSelect("component_pictures.id")->where("component_pictures.id", $id)->first();
        return view("component_picture.show", compact("component_picture"));
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
        $component_picture = ComponentPicture::findOrFail($id);

        return view("component_picture.edit", compact("component_picture"));
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
            "distribution_board_id" => "nullable|integer", //integer('distribution_board_id')->nullable()
            "path" => "nullable|max:100", //string('path',100)->nullable()

        ]);
        $requestData = $request->all();

        $component_picture = ComponentPicture::findOrFail($id);
        $component_picture->update($requestData);

        return redirect("component_picture")->with("flash_message", "component_picture updated!");
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
        ComponentPicture::destroy($id);

        return redirect("component_picture")->with("flash_message", "component_picture deleted!");
    }
}
    //=======================================================================
