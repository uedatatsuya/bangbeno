<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\DistributionBoard;
use App\Investigation;

//=======================================================================
class DistributionBoardsController extends Controller
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
            // -- QueryBuilder: SELECT [distribution_boards]--
            // ----------------------------------------------------
            $distribution_board = DB::table("distribution_boards")
                // ->leftJoin("investigations","investigations.id", "=", "distribution_boards.investigation_id")
                // ->leftJoin("investigations","investigations.id", "=", "distribution_boards.investigation_id")
                ->orWhere("distribution_boards.investigation_id", "LIKE", "%$keyword%")->orWhere("distribution_boards.category", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_circuit", "LIKE", "%$keyword%")->orWhere("distribution_boards.supply_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.special_report", "LIKE", "%$keyword%")->orWhere("distribution_boards.carry_route_movie", "LIKE", "%$keyword%")->orWhere("distribution_boards.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.is_update_proposal", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture_comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_repair_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.installation_location", "LIKE", "%$keyword%")->orWhere("distribution_boards.change_method", "LIKE", "%$keyword%")->orWhere("distribution_boards.power_outage_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.remark", "LIKE", "%$keyword%")->orWhere("investigations.property_id", "LIKE", "%$keyword%")->orWhere("investigations.name_plate", "LIKE", "%$keyword%")->orWhere("investigations.electric_meter", "LIKE", "%$keyword%")->orWhere("investigations.is_high_voltage_power_reception", "LIKE", "%$keyword%")->orWhere("investigations.is_power_contract", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_1", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_picture_1", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_comment_1", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_2", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_picture_2", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_comment_2", "LIKE", "%$keyword%")->orWhere("investigations.is_renewal_board", "LIKE", "%$keyword%")->select("*")->addSelect("distribution_boards.id")->paginate($perPage);
        } else {
            //$distribution_board = DistributionBoard::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [distribution_boards]--
            // ----------------------------------------------------
            $distribution_board = DB::table("distribution_boards")
                // ->leftJoin("investigations","investigations.id", "=", "distribution_boards.investigation_id")
                // ->leftJoin("investigations","investigations.id", "=", "distribution_boards.investigation_id")
                ->select("*")->addSelect("distribution_boards.id")->paginate($perPage);
        }
        return view("distribution_board.index", compact("distribution_board"));
    }

    public function index_investigation(Request $request, $id)
    {

        $keyword = $request->get("search");
        $perPage = 25;

        $investigation = Investigation::where('property_id', $id ?? '')->first();
        // get investigation_id from investigation
        $investigation_id = $investigation->id;
        $distribution_board = DB::table("distribution_boards")
            ->where("investigation_id", $investigation->id ?? '')
            ->select("*")->addSelect("distribution_boards.id")->paginate($perPage);

        return view("distribution_board.index", compact("distribution_board", "id", "investigation_id"));
    }

    public function edit_investigation($id)
    {
        $distribution_board = DistributionBoard::find($id);

        $investigation_id = $distribution_board->investigation_id;
        $investigation = Investigation::where('id', $investigation_id)->first();

        return view("distribution_board.edit", compact("distribution_board", "id", "investigation"));

        // $investigation = Investigation::where('property_id', $id)->first();

        // $distribution_board = DistributionBoard::where('investigation_id', $investigation->id)->first();
        // return view("distribution_board.edit", compact("distribution_board", "id"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("distribution_board.create");
    }

    public function create_investigation($id)
    {
        $investigation_id = $id;
        return view("distribution_board.create", compact("investigation_id"));
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
            // "investigation_id" => "nullable|integer", //integer('investigation_id')->nullable()
            // "category" => "nullable|max:1", //string('category',1)->nullable()
            // "target_circuit" => "nullable|max:1", //string('target_circuit',1)->nullable()
            // "supply_range" => "nullable|max:1", //string('supply_range',1)->nullable()
            // "special_report" => "nullable|max:100", //string('special_report',100)->nullable()
            // "carry_route_movie" => "nullable", //string('carry_route_movie')->nullable()
            // "memo" => "nullable|max:100", //string('memo',100)->nullable()
            // "is_update_proposal" => "nullable|max:1", //string('is_update_proposal',1)->nullable()
            // "aged_rank_exterior_picture" => "nullable|max:100", //string('aged_rank_exterior_picture',100)->nullable()
            // "aged_rank_exterior_picture_comment" => "nullable|max:100", //string('aged_rank_exterior_picture_comment',100)->nullable()
            // "target_repair_picture" => "nullable|max:100", //string('target_repair_picture',100)->nullable()
            // "installation_location" => "nullable|max:1", //string('installation_location',1)->nullable()
            // "change_method" => "nullable|max:1", //string('change_method',1)->nullable()
            // "power_outage_range" => "nullable|max:1", //string('power_outage_range',1)->nullable()
            // "remark" => "nullable|max:100", //string('remark',100)->nullable()

        ]);
        $requestData = $request->all();

        $distribution_board = DistributionBoard::create($requestData);

        $investigation_id = $distribution_board->investigation_id;
        $investigation = Investigation::find($investigation_id);
        $id = $investigation->property_id;

        return redirect(route("distribution_board.index_investigation", $id))->with("flash_message", "新規登録されました!");
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
        //$distribution_board = DistributionBoard::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [distribution_boards]--
        // ----------------------------------------------------
        $distribution_board = DB::table("distribution_boards")
            // ->leftJoin("investigations", "investigations.id", "=", "distribution_boards.investigation_id")
            // ->leftJoin("investigations", "investigations.id", "=", "distribution_boards.investigation_id")
            ->select("*")->addSelect("distribution_boards.id")->where("distribution_boards.id", $id)->first();
        return view("distribution_board.show", compact("distribution_board"));
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
        // 分電盤情報を取得
        $distribution_board = DistributionBoard::findOrFail($id);


        return view("distribution_board.edit", compact("distribution_board"));
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
            // "investigation_id" => "nullable|integer", //integer('investigation_id')->nullable()
            // "category" => "nullable|max:1", //string('category',1)->nullable()
            // "target_circuit" => "nullable|max:1", //string('target_circuit',1)->nullable()
            // "supply_range" => "nullable|max:1", //string('supply_range',1)->nullable()
            // "special_report" => "nullable|max:100", //string('special_report',100)->nullable()
            // "carry_route_movie" => "nullable", //string('carry_route_movie')->nullable()
            // "memo" => "nullable|max:100", //string('memo',100)->nullable()
            // "is_update_proposal" => "nullable|max:1", //string('is_update_proposal',1)->nullable()
            // "aged_rank_exterior_picture" => "nullable|max:100", //string('aged_rank_exterior_picture',100)->nullable()
            // "aged_rank_exterior_picture_comment" => "nullable|max:100", //string('aged_rank_exterior_picture_comment',100)->nullable()
            // "target_repair_picture" => "nullable|max:100", //string('target_repair_picture',100)->nullable()
            // "installation_location" => "nullable|max:1", //string('installation_location',1)->nullable()
            // "change_method" => "nullable|max:1", //string('change_method',1)->nullable()
            // "power_outage_range" => "nullable|max:1", //string('power_outage_range',1)->nullable()
            // "remark" => "nullable|max:100", //string('remark',100)->nullable()

        ]);
        $requestData = $request->all();

        $distribution_board = DistributionBoard::find($id);
        $investigation_id = $distribution_board->investigation_id;
        $investigation = Investigation::find($investigation_id);
        $id = $investigation->property_id;
        $distribution_board->update($requestData);

        return redirect(route("distribution_board.index_investigation", $id))->with("flash_message", "更新されました!");
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
        DistributionBoard::destroy($id);

        return redirect("distribution_board")->with("flash_message", "distribution_board deleted!");
    }
}
    //=======================================================================
