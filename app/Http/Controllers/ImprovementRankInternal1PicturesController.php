<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\ImprovementRankInternal1Picture;

use Illuminate\Support\Facades\Log;

//=======================================================================
class ImprovementRankInternal1PicturesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {

        // $requestData = $request->all();

        // $electric_meter = $request->file('file');
        // $electric_meter_path = $electric_meter->store('public/images/a/');


        return response()->json([
            "message" => "test"
        ], 200);




        // $keyword = $request->get("search");
        // $perPage = 25;

        // if (!empty($keyword)) {

        //     $improvement_rank_internal1_picture = DB::table("improvement_rank_internal_1_pictures")
        //         // ->leftJoin("distribution_boards","distribution_boards.id", "=", "improvement_rank_internal_1_pictures.distribution_board_id")
        //         ->orWhere("improvement_rank_internal1_pictures.distribution_board_id", "LIKE", "%$keyword%")->orWhere("improvement_rank_internal1_pictures.path", "LIKE", "%$keyword%")->orWhere("improvement_rank_internal1_pictures.comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.investigation_id", "LIKE", "%$keyword%")->orWhere("distribution_boards.category", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_circuit", "LIKE", "%$keyword%")->orWhere("distribution_boards.supply_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.special_report", "LIKE", "%$keyword%")->orWhere("distribution_boards.carry_route_movie", "LIKE", "%$keyword%")->orWhere("distribution_boards.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.is_update_proposal", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture_comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_repair_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.installation_location", "LIKE", "%$keyword%")->orWhere("distribution_boards.change_method", "LIKE", "%$keyword%")->orWhere("distribution_boards.power_outage_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.remark", "LIKE", "%$keyword%")->select("*")->addSelect("improvement_rank_internal1_pictures.id")->paginate($perPage);
        // } else {
        //     //$improvement_rank_internal1_picture = ImprovementRankInternal1Picture::paginate($perPage);
        //     $improvement_rank_internal1_picture = DB::table("improvement_rank_internal_1_pictures")
        //         // ->leftJoin("distribution_boards","distribution_boards.id", "=", "improvement_rank_internal_1_pictures.distribution_board_id")
        //         ->select("*")->addSelect("improvement_rank_internal1_pictures.id")->paginate($perPage);
        // }
        // return view("improvement_rank_internal1_picture.index", compact("improvement_rank_internal1_picture"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("improvement_rank_internal1_picture.create");
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
        $requestData = $request->all();

        $file = $request->file('file');
        $file_path = $file->store('public/images/');
        $requestData['path'] = basename($file_path);

        $requestData['distribution_board_id'] = $request->get('distribution_board_id');

        $new = ImprovementRankInternal1Picture::create($requestData);


        return response()->json([
            "message" => $requestData['path'],
            "id" => $new->id

        ], 200);


        // $this->validate($request, [
        //     "distribution_board_id" => "nullable|integer", //integer('distribution_board_id')->nullable()
        //     "path" => "nullable|max:100", //string('path',100)->nullable()
        //     "comment" => "nullable|max:100", //string('comment',100)->nullable()

        // ]);
        // $requestData = $request->all();

        // ImprovementRankInternal1Picture::create($requestData);

        // return redirect("improvement_rank_internal1_picture")->with("flash_message", "improvement_rank_internal1_picture added!");
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
        //$improvement_rank_internal1_picture = ImprovementRankInternal1Picture::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [improvement_rank_internal_1_pictures]--
        // ----------------------------------------------------
        $improvement_rank_internal_1_picture = DB::table("improvement_rank_internal_1_pictures")
            // ->leftJoin("distribution_boards", "distribution_boards.id", "=", "improvement_rank_internal_1_pictures.distribution_board_id")
            ->select("*")->addSelect("improvement_rank_internal1_pictures.id")->where("improvement_rank_internal1_pictures.id", $id)->first();
        return view("improvement_rank_internal1_picture.show", compact("improvement_rank_internal1_picture"));
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
        $improvement_rank_internal1_picture = ImprovementRankInternal1Picture::where('distribution_board_id', $id)->get();

        // return for api
        return response()->json([
            'improvement_rank_internal1_picture' => $improvement_rank_internal1_picture,
        ]);

        // return view("improvement_rank_internal1_picture.edit", compact("improvement_rank_internal1_picture"));
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

        $requestData = $request->all();

        return response()->json([
            "message" => $requestData
        ], 200);

        // $this->validate($request, [
        //     "distribution_board_id" => "nullable|integer", //integer('distribution_board_id')->nullable()
        //     "path" => "nullable|max:100", //string('path',100)->nullable()
        //     "comment" => "nullable|max:100", //string('comment',100)->nullable()

        // ]);
        // $requestData = $request->all();

        // $improvement_rank_internal1_picture = ImprovementRankInternal1Picture::findOrFail($id);
        // $improvement_rank_internal1_picture->update($requestData);

        // return redirect("improvement_rank_internal1_picture")->with("flash_message", "improvement_rank_internal1_picture updated!");
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
        ImprovementRankInternal1Picture::destroy($id);

        return redirect("improvement_rank_internal1_picture")->with("flash_message", "improvement_rank_internal1_picture deleted!");
    }
}
    //=======================================================================
