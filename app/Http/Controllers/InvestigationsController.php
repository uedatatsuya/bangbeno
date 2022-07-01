<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Investigation;

//=======================================================================
class InvestigationsController extends Controller
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
            // -- QueryBuilder: SELECT [investigations]--
            // ----------------------------------------------------
            $investigation = DB::table("investigations")
                // ->leftJoin("properties","properties.id", "=", "investigations.property_id")
                ->orWhere("investigations.property_id", "LIKE", "%$keyword%")->orWhere("investigations.name_plate", "LIKE", "%$keyword%")->orWhere("investigations.electric_meter", "LIKE", "%$keyword%")->orWhere("investigations.is_high_voltage_power_reception", "LIKE", "%$keyword%")->orWhere("investigations.is_power_contract", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_1", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_picture_1", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_comment_1", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_2", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_picture_2", "LIKE", "%$keyword%")->orWhere("investigations.cost_reduction_comment_2", "LIKE", "%$keyword%")->orWhere("investigations.is_renewal_board", "LIKE", "%$keyword%")->orWhere("properties.sfa_id", "LIKE", "%$keyword%")->orWhere("properties.name", "LIKE", "%$keyword%")->orWhere("properties.address", "LIKE", "%$keyword%")->orWhere("properties.completion_date", "LIKE", "%$keyword%")->orWhere("properties.unit", "LIKE", "%$keyword%")->orWhere("properties.agency", "LIKE", "%$keyword%")->orWhere("properties.visit_date", "LIKE", "%$keyword%")->orWhere("properties.client", "LIKE", "%$keyword%")->orWhere("properties. department_id", "LIKE", "%$keyword%")->orWhere("properties.user_id", "LIKE", "%$keyword%")->orWhere("properties.investigation_user_id", "LIKE", "%$keyword%")->orWhere("properties.investigation_partner_company_id", "LIKE", "%$keyword%")->orWhere("properties.estimate1_partner_company_id", "LIKE", "%$keyword%")->orWhere("properties.estimate2_partner_company_id", "LIKE", "%$keyword%")->orWhere("properties.estimate_date", "LIKE", "%$keyword%")->orWhere("properties.estimate_request_date", "LIKE", "%$keyword%")->orWhere("properties.estimate_submit_deadline_date", "LIKE", "%$keyword%")->orWhere("properties.estimate_money", "LIKE", "%$keyword%")->orWhere("properties.aged_rank", "LIKE", "%$keyword%")->orWhere("properties.aged_rank_comment", "LIKE", "%$keyword%")->orWhere("properties. degradation_rank", "LIKE", "%$keyword%")->orWhere("properties.degradation_rank_comment", "LIKE", "%$keyword%")->orWhere("properties.improvement_rank", "LIKE", "%$keyword%")->orWhere("properties.improvement_rank_comment", "LIKE", "%$keyword%")->orWhere("properties.cost_reduction_rank", "LIKE", "%$keyword%")->orWhere("properties.cost_reduction_rank_comment", "LIKE", "%$keyword%")->select("*")->addSelect("investigations.id")->paginate($perPage);
        } else {
            //$investigation = Investigation::paginate($perPage);
            $investigation = DB::table("investigations")
                // ->leftJoin("properties","properties.id", "=", "investigations.property_id")
                ->select("*")->addSelect("investigations.id")->paginate($perPage);
        }
        return view("investigation.index", compact("investigation"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("investigation.create");
    }

    public function menu($id)
    {
        return view("investigation.menu", compact('id'));
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
            // "property_id" => "nullable|integer", //integer('property_id')->nullable()
            // "name_plate" => "nullable|max:100", //string('name_plate',100)->nullable()
            // "electric_meter" => "nullable|max:100", //string('electric_meter',100)->nullable()
            // "is_high_voltage_power_reception" => "nullable|integer", //integer('is_high_voltage_power_reception')->nullable()
            // "is_power_contract" => "nullable|integer", //integer('is_power_contract')->nullable()
            // "cost_reduction_1" => "nullable|max:1", //string('cost_reduction_1',1)->nullable()
            // "cost_reduction_picture_1" => "nullable|max:100", //string('cost_reduction_picture_1',100)->nullable()
            // "cost_reduction_comment_1" => "nullable|max:100", //string('cost_reduction_comment_1',100)->nullable()
            // "cost_reduction_2" => "nullable|max:1", //string('cost_reduction_2',1)->nullable()
            // "cost_reduction_picture_2" => "nullable|max:100", //string('cost_reduction_picture_2',100)->nullable()
            // "cost_reduction_comment_2" => "nullable|max:100", //string('cost_reduction_comment_2',100)->nullable()
            // "is_renewal_board" => "nullable|max:1", //string('is_renewal_board',1)->nullable()

        ]);
        $requestData = $request->all();

        // get file from form
        $electric_meter = $request->file('electric_meter');
        // save file to storage/app/public/images/
        $electric_meter_path = $electric_meter->store('public/images/');
        // save file path to database
        $requestData['electric_meter'] = basename($electric_meter_path);


        Investigation::create($requestData);

        return redirect("investigation")->with("flash_message", "investigation added!");
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

        $investigation = DB::table("investigations")
            ->select("*")->addSelect("investigations.id")->where("investigations.id", $id)->first();
        return view("investigation.show", compact("investigation"));
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
        $investigation = Investigation::where('property_id', $id)->first();
        if (!$investigation) {
            // store
            $investigation = new Investigation();

            $investigation->property_id = $id;

            $investigation->save();
        }

        return view("investigation.edit", compact("investigation"));
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
            // "property_id" => "nullable|integer", //integer('property_id')->nullable()
            // "name_plate" => "nullable|max:100", //string('name_plate',100)->nullable()
            // "electric_meter" => "nullable|max:100", //string('electric_meter',100)->nullable()
            // "is_high_voltage_power_reception" => "nullable|integer", //integer('is_high_voltage_power_reception')->nullable()
            // "is_power_contract" => "nullable|integer", //integer('is_power_contract')->nullable()
            // "cost_reduction_1" => "nullable|max:1", //string('cost_reduction_1',1)->nullable()
            // "cost_reduction_picture_1" => "nullable|max:100", //string('cost_reduction_picture_1',100)->nullable()
            // "cost_reduction_comment_1" => "nullable|max:100", //string('cost_reduction_comment_1',100)->nullable()
            // "cost_reduction_2" => "nullable|max:1", //string('cost_reduction_2',1)->nullable()
            // "cost_reduction_picture_2" => "nullable|max:100", //string('cost_reduction_picture_2',100)->nullable()
            // "cost_reduction_comment_2" => "nullable|max:100", //string('cost_reduction_comment_2',100)->nullable()
            // "is_renewal_board" => "nullable|max:1", //string('is_renewal_board',1)->nullable()

        ]);

        // $requestData = $request->all();

        $investigation = Investigation::find($id);


        $property_id = $investigation->property_id;
        // $investigation->property_id = $requestData['property_id'];
        $investigation->is_high_voltage_power_reception = $request->is_high_voltage_power_reception;
        $investigation->is_power_contract = $request->is_power_contract;
        $investigation->cost_reduction_1 = $request->cost_reduction_1;
        if ($request->cost_reduction_1 == "1") {
            $investigation->cost_reduction_comment_list_1 = $request->cost_reduction_comment_list_1_1;
        } else if ($request->cost_reduction_1 == "2") {
            $investigation->cost_reduction_comment_list_1 = $request->cost_reduction_comment_list_1_2;
        } else {
        }
        $investigation->cost_reduction_comment_1 = $request->cost_reduction_comment_1;

        $investigation->cost_reduction_2 = $request->cost_reduction_2;
        if ($request->cost_reduction_2 == "1") {
            $investigation->cost_reduction_comment_list_2 = $request->cost_reduction_comment_list_2_1;
        } else if ($request->cost_reduction_2 == "2") {
            $investigation->cost_reduction_comment_list_2 = $request->cost_reduction_comment_list_2_2;
        } else {
        }
        $investigation->cost_reduction_comment_2 = $request->cost_reduction_comment_2;
        // $investigation->cost_reduction_comment_list_2 = $request->cost_reduction_comment_list_2;

        $investigation->is_renewal_board = $request->is_renewal_board;


        // $investigation->is_high_voltage_power_reception = $requestData['is_high_voltage_power_reception'];
        // $investigation->is_power_contract = $requestData['is_power_contract'];
        // $investigation->cost_reduction_1 = $requestData['cost_reduction_1'];
        // $investigation->cost_reduction_comment_1 = $requestData['cost_reduction_comment_1'];
        // $investigation->cost_reduction_2 = $requestData['cost_reduction_2'];
        // $investigation->cost_reduction_comment_2 = $requestData['cost_reduction_comment_2'];

        // $investigation->is_renewal_board = $requestData['is_renewal_board'];


        // 銘板画像保存
        $electric_meter = $request->file('electric_meter');
        if ($electric_meter) {
            $electric_meter_path = $electric_meter->store('public/images/');
            $investigation->electric_meter = basename($electric_meter_path);
        }

        // 電灯メーター画像保存
        $name_plate = $request->file('name_plate');
        if ($name_plate) {
            $name_plate_path = $name_plate->store('public/images/');
            $investigation->name_plate = basename($name_plate_path);
        }

        // 動力メーター画像保存
        $power_meter = $request->file('power_meter');
        if ($power_meter) {
            $power_meter_path = $power_meter->store('public/images/');
            $investigation->power_meter = basename($power_meter_path);
        }

        // コスト削減（契約1）保存
        $cost_reduction_1 = $request->file('cost_reduction_picture_1');
        if ($cost_reduction_1) {
            $cost_reduction_1_path = $cost_reduction_1->store('public/images/');
            $investigation->cost_reduction_picture_1 = basename($cost_reduction_1_path);
        }

        // コスト削減（契約2）保存
        $cost_reduction_2 = $request->file('cost_reduction_picture_2');
        if ($cost_reduction_2) {
            $cost_reduction_2_path = $cost_reduction_2->store('public/images/');
            $investigation->cost_reduction_picture_2 = basename($cost_reduction_2_path);
        }

        $investigation->save();

        return redirect(route("investigation.menu", $property_id))->with("flash_message", "調査情報が更新されました!");
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
        Investigation::destroy($id);

        return redirect("investigation")->with("flash_message", "investigation deleted!");
    }
}
    //=======================================================================
