<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\OtherPicture;

//=======================================================================
class OtherPicturesController extends Controller
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
            // -- QueryBuilder: SELECT [other_pictures]--
            // ----------------------------------------------------
            $other_picture = DB::table("other_pictures")
                // ->leftJoin("distribution_boards","distribution_boards.id", "=", "other_pictures.distribution_board_id")
                ->orWhere("other_pictures.distribution_board_id", "LIKE", "%$keyword%")->orWhere("other_pictures.path", "LIKE", "%$keyword%")->orWhere("other_pictures.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.investigation_id", "LIKE", "%$keyword%")->orWhere("distribution_boards.category", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_circuit", "LIKE", "%$keyword%")->orWhere("distribution_boards.supply_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.special_report", "LIKE", "%$keyword%")->orWhere("distribution_boards.carry_route_movie", "LIKE", "%$keyword%")->orWhere("distribution_boards.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.is_update_proposal", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture_comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_repair_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.installation_location", "LIKE", "%$keyword%")->orWhere("distribution_boards.change_method", "LIKE", "%$keyword%")->orWhere("distribution_boards.power_outage_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.remark", "LIKE", "%$keyword%")->select("*")->addSelect("other_pictures.id")->paginate($perPage);
        } else {
            //$other_picture = OtherPicture::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [other_pictures]--
            // ----------------------------------------------------
            $other_picture = DB::table("other_pictures")
                // ->leftJoin("distribution_boards","distribution_boards.id", "=", "other_pictures.distribution_board_id")
                ->select("*")->addSelect("other_pictures.id")->paginate($perPage);
        }
        return view("other_picture.index", compact("other_picture"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("other_picture.create");
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
            "path" => "nullable|integer", //integer('path')->nullable()
            "memo" => "nullable|max:100", //string('memo',100)->nullable()

        ]);
        $requestData = $request->all();

        OtherPicture::create($requestData);

        return redirect("other_picture")->with("flash_message", "other_picture added!");
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
        //$other_picture = OtherPicture::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [other_pictures]--
        // ----------------------------------------------------
        $other_picture = DB::table("other_pictures")
            // ->leftJoin("distribution_boards", "distribution_boards.id", "=", "other_pictures.distribution_board_id")
            ->select("*")->addSelect("other_pictures.id")->where("other_pictures.id", $id)->first();
        return view("other_picture.show", compact("other_picture"));
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
        $other_picture = OtherPicture::findOrFail($id);

        return view("other_picture.edit", compact("other_picture"));
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
            "path" => "nullable|integer", //integer('path')->nullable()
            "memo" => "nullable|max:100", //string('memo',100)->nullable()

        ]);
        $requestData = $request->all();

        $other_picture = OtherPicture::findOrFail($id);
        $other_picture->update($requestData);

        return redirect("other_picture")->with("flash_message", "other_picture updated!");
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
        OtherPicture::destroy($id);

        return redirect("other_picture")->with("flash_message", "other_picture deleted!");
    }
}
    //=======================================================================
