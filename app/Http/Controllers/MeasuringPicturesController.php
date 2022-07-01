<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\MeasuringPicture;

//=======================================================================
class MeasuringPicturesController extends Controller
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
            // -- QueryBuilder: SELECT [measuring_pictures]--
            // ----------------------------------------------------
            $measuring_picture = DB::table("measuring_pictures")
                // ->leftJoin("distribution_boards","distribution_boards.id", "=", "measuring_pictures.distribution_board_id")
                ->orWhere("measuring_pictures.distribution_board_id", "LIKE", "%$keyword%")->orWhere("measuring_pictures.path", "LIKE", "%$keyword%")->orWhere("measuring_pictures.width", "LIKE", "%$keyword%")->orWhere("measuring_pictures.height", "LIKE", "%$keyword%")->orWhere("distribution_boards.investigation_id", "LIKE", "%$keyword%")->orWhere("distribution_boards.category", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_circuit", "LIKE", "%$keyword%")->orWhere("distribution_boards.supply_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.special_report", "LIKE", "%$keyword%")->orWhere("distribution_boards.carry_route_movie", "LIKE", "%$keyword%")->orWhere("distribution_boards.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.is_update_proposal", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture_comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_repair_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.installation_location", "LIKE", "%$keyword%")->orWhere("distribution_boards.change_method", "LIKE", "%$keyword%")->orWhere("distribution_boards.power_outage_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.remark", "LIKE", "%$keyword%")->select("*")->addSelect("measuring_pictures.id")->paginate($perPage);
        } else {
            //$measuring_picture = MeasuringPicture::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [measuring_pictures]--
            // ----------------------------------------------------
            $measuring_picture = DB::table("measuring_pictures")
                // ->leftJoin("distribution_boards", "distribution_boards.id", "=", "measuring_pictures.distribution_board_id")
                ->select("*")->addSelect("measuring_pictures.id")->paginate($perPage);
        }
        return view("measuring_picture.index", compact("measuring_picture"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("measuring_picture.create");
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
            "width" => "nullable|integer", //integer('width')->nullable()
            "height" => "nullable|integer", //integer('height')->nullable()

        ]);
        $requestData = $request->all();

        MeasuringPicture::create($requestData);

        return redirect("measuring_picture")->with("flash_message", "measuring_picture added!");
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
        //$measuring_picture = MeasuringPicture::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [measuring_pictures]--
        // ----------------------------------------------------
        $measuring_picture = DB::table("measuring_pictures")
            // ->leftJoin("distribution_boards", "distribution_boards.id", "=", "measuring_pictures.distribution_board_id")
            ->select("*")->addSelect("measuring_pictures.id")->where("measuring_pictures.id", $id)->first();
        return view("measuring_picture.show", compact("measuring_picture"));
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
        $measuring_picture = MeasuringPicture::findOrFail($id);

        return view("measuring_picture.edit", compact("measuring_picture"));
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
            "width" => "nullable|integer", //integer('width')->nullable()
            "height" => "nullable|integer", //integer('height')->nullable()

        ]);
        $requestData = $request->all();

        $measuring_picture = MeasuringPicture::findOrFail($id);
        $measuring_picture->update($requestData);

        return redirect("measuring_picture")->with("flash_message", "measuring_picture updated!");
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
        MeasuringPicture::destroy($id);

        return redirect("measuring_picture")->with("flash_message", "measuring_picture deleted!");
    }
}
    //=======================================================================
