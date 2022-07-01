<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\DegradationRankInternal1Picture;

//=======================================================================
class DegradationRankInternal1PicturesController extends Controller
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
            // -- QueryBuilder: SELECT [degradation_rank_internal_1_pictures]--
            // ----------------------------------------------------
            $degradation_rank_internal1_picture = DB::table("degradation_rank_internal_1_pictures")
                ->orWhere("degradation_rank_internal1_pictures.distribution_board_id", "LIKE", "%$keyword%")->orWhere("degradation_rank_internal1_pictures.path", "LIKE", "%$keyword%")->orWhere("degradation_rank_internal1_pictures.comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.investigation_id", "LIKE", "%$keyword%")->orWhere("distribution_boards.category", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_circuit", "LIKE", "%$keyword%")->orWhere("distribution_boards.supply_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.special_report", "LIKE", "%$keyword%")->orWhere("distribution_boards.carry_route_movie", "LIKE", "%$keyword%")->orWhere("distribution_boards.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.is_update_proposal", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture_comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_repair_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.installation_location", "LIKE", "%$keyword%")->orWhere("distribution_boards.change_method", "LIKE", "%$keyword%")->orWhere("distribution_boards.power_outage_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.remark", "LIKE", "%$keyword%")->select("*")->addSelect("degradation_rank_internal1_pictures.id")->paginate($perPage);
        } else {
            // $degradation_rank_internal1_picture = DegradationRankInternal1Picture::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [degradation_rank_internal_1_pictures]--
            // ----------------------------------------------------
            $degradation_rank_internal1_picture = DB::table("degradation_rank_internal_1_pictures")
                ->select("*")->addSelect("degradation_rank_internal1_pictures.id")->paginate($perPage);
        }
        return view("degradation_rank_internal1_picture.index", compact("degradation_rank_internal1_picture"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("degradation_rank_internal1_picture.create");
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
            "comment" => "nullable|integer", //integer('comment')->nullable()

        ]);
        $requestData = $request->all();

        DegradationRankInternal1Picture::create($requestData);

        return redirect("degradation_rank_internal1_picture")->with("flash_message", "degradation_rank_internal1_picture added!");
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
        //$degradation_rank_internal1_picture = DegradationRankInternal1Picture::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [degradation_rank_internal_1_pictures]--
        // ----------------------------------------------------
        $degradation_rank_internal_1_picture = DB::table("degradation_rank_internal_1_pictures")
            // ->leftJoin("distribution_boards", "distribution_boards.id", "=", "degradation_rank_internal_1_pictures.distribution_board_id")
            ->select("*")->addSelect("degradation_rank_internal1_pictures.id")->where("degradation_rank_internal1_pictures.id", $id)->first();
        return view("degradation_rank_internal1_picture.show", compact("degradation_rank_internal1_picture"));
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
        $degradation_rank_internal1_picture = DegradationRankInternal1Picture::findOrFail($id);

        return view("degradation_rank_internal1_picture.edit", compact("degradation_rank_internal1_picture"));
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
            "comment" => "nullable|integer", //integer('comment')->nullable()

        ]);
        $requestData = $request->all();

        $degradation_rank_internal1_picture = DegradationRankInternal1Picture::findOrFail($id);
        $degradation_rank_internal1_picture->update($requestData);

        return redirect("degradation_rank_internal1_picture")->with("flash_message", "degradation_rank_internal1_picture updated!");
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
        DegradationRankInternal1Picture::destroy($id);

        return redirect("degradation_rank_internal1_picture")->with("flash_message", "degradation_rank_internal1_picture deleted!");
    }
}
    //=======================================================================
