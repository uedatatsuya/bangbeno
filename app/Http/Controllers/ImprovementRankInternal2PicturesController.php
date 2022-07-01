<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\ImprovementRankInternal2Picture;

//=======================================================================
class ImprovementRankInternal2PicturesController extends Controller
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
            // -- QueryBuilder: SELECT [improvement_rank_internal_2_pictures]--
            // ----------------------------------------------------
            $improvement_rank_internal2_picture = DB::table("improvement_rank_internal_2_pictures")
                // ->leftJoin("distribution_boards","distribution_boards.id", "=", "improvement_rank_internal_2_pictures.distribution_board_id")
                ->orWhere("improvement_rank_internal2_pictures.distribution_board_id", "LIKE", "%$keyword%")->orWhere("improvement_rank_internal2_pictures.number", "LIKE", "%$keyword%")->orWhere("improvement_rank_internal2_pictures.path", "LIKE", "%$keyword%")->orWhere("improvement_rank_internal2_pictures.comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.investigation_id", "LIKE", "%$keyword%")->orWhere("distribution_boards.category", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_circuit", "LIKE", "%$keyword%")->orWhere("distribution_boards.supply_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.special_report", "LIKE", "%$keyword%")->orWhere("distribution_boards.carry_route_movie", "LIKE", "%$keyword%")->orWhere("distribution_boards.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.is_update_proposal", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture_comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_repair_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.installation_location", "LIKE", "%$keyword%")->orWhere("distribution_boards.change_method", "LIKE", "%$keyword%")->orWhere("distribution_boards.power_outage_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.remark", "LIKE", "%$keyword%")->select("*")->addSelect("improvement_rank_internal2_pictures.id")->paginate($perPage);
        } else {
            //$improvement_rank_internal2_picture = ImprovementRankInternal2Picture::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [improvement_rank_internal_2_pictures]--
            // ----------------------------------------------------
            $improvement_rank_internal2_picture = DB::table("improvement_rank_internal_2_pictures")
                // ->leftJoin("distribution_boards","distribution_boards.id", "=", "improvement_rank_internal_2_pictures.distribution_board_id")
                ->select("*")->addSelect("improvement_rank_internal2_pictures.id")->paginate($perPage);
        }
        return view("improvement_rank_internal2_picture.index", compact("improvement_rank_internal2_picture"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("improvement_rank_internal2_picture.create");
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
            "number" => "nullable|integer", //integer('number')->nullable()
            "path" => "nullable|max:100", //string('path',100)->nullable()
            "comment" => "nullable|max:100", //string('comment',100)->nullable()

        ]);
        $requestData = $request->all();

        ImprovementRankInternal2Picture::create($requestData);

        return redirect("improvement_rank_internal2_picture")->with("flash_message", "improvement_rank_internal2_picture added!");
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
        //$improvement_rank_internal2_picture = ImprovementRankInternal2Picture::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [improvement_rank_internal_2_pictures]--
        // ----------------------------------------------------
        $improvement_rank_internal_2_picture = DB::table("improvement_rank_internal_2_pictures")
            // ->leftJoin("distribution_boards", "distribution_boards.id", "=", "improvement_rank_internal_2_pictures.distribution_board_id")
            ->select("*")->addSelect("improvement_rank_internal2_pictures.id")->where("improvement_rank_internal2_pictures.id", $id)->first();
        return view("improvement_rank_internal2_picture.show", compact("improvement_rank_internal2_picture"));
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
        $improvement_rank_internal2_picture = ImprovementRankInternal2Picture::findOrFail($id);

        return view("improvement_rank_internal2_picture.edit", compact("improvement_rank_internal2_picture"));
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
            "number" => "nullable|integer", //integer('number')->nullable()
            "path" => "nullable|max:100", //string('path',100)->nullable()
            "comment" => "nullable|max:100", //string('comment',100)->nullable()

        ]);
        $requestData = $request->all();

        $improvement_rank_internal2_picture = ImprovementRankInternal2Picture::findOrFail($id);
        $improvement_rank_internal2_picture->update($requestData);

        return redirect("improvement_rank_internal2_picture")->with("flash_message", "improvement_rank_internal2_picture updated!");
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
        ImprovementRankInternal2Picture::destroy($id);

        return redirect("improvement_rank_internal2_picture")->with("flash_message", "improvement_rank_internal2_picture deleted!");
    }
}
    //=======================================================================
