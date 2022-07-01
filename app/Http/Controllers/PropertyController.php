<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\Property;

use App\SalesOffice;
use App\PartnerCompany;
use App\Department;
use App\User;

//=======================================================================
class PropertyController extends Controller
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
            // -- QueryBuilder: SELECT [properties]--
            // ----------------------------------------------------
            $propertie = DB::table("properties")
                ->orWhere("properties.sfa_id", "LIKE", "%$keyword%")->orWhere("properties.name", "LIKE", "%$keyword%")->orWhere("properties.address", "LIKE", "%$keyword%")->orWhere("properties.completion_date", "LIKE", "%$keyword%")->orWhere("properties.unit", "LIKE", "%$keyword%")->orWhere("properties.agency", "LIKE", "%$keyword%")->orWhere("properties.visit_date", "LIKE", "%$keyword%")->orWhere("properties.client", "LIKE", "%$keyword%")->orWhere("properties. department_id", "LIKE", "%$keyword%")->orWhere("properties.user_id", "LIKE", "%$keyword%")->orWhere("properties.investigation_user_id", "LIKE", "%$keyword%")->orWhere("properties.investigation_partner_company_id", "LIKE", "%$keyword%")->orWhere("properties.estimate1_partner_company_id", "LIKE", "%$keyword%")->orWhere("properties.estimate2_partner_company_id", "LIKE", "%$keyword%")->orWhere("properties.estimate_date", "LIKE", "%$keyword%")->orWhere("properties.estimate_request_date", "LIKE", "%$keyword%")->orWhere("properties.estimate_submit_deadline_date", "LIKE", "%$keyword%")->orWhere("properties.estimate_money", "LIKE", "%$keyword%")->orWhere("properties.aged_rank", "LIKE", "%$keyword%")->orWhere("properties.aged_rank_comment", "LIKE", "%$keyword%")->orWhere("properties. degradation_rank", "LIKE", "%$keyword%")->orWhere("properties.degradation_rank_comment", "LIKE", "%$keyword%")->orWhere("properties.improvement_rank", "LIKE", "%$keyword%")->orWhere("properties.improvement_rank_comment", "LIKE", "%$keyword%")->orWhere("properties.cost_reduction_rank", "LIKE", "%$keyword%")->orWhere("properties.cost_reduction_rank_comment", "LIKE", "%$keyword%")->select("*")->addSelect("properties.id")->paginate($perPage);
        } else {
            //$propertie = Propertie::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [properties]--
            // ----------------------------------------------------
            $propertie = DB::table("properties")
                ->select("*")->addSelect("properties.id")->paginate($perPage);
        }
        return view("property.index", compact("propertie"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $sales_offices = SalesOffice::all();
        $partner_companys = PartnerCompany::all();
        $departments = Department::all();
        $users = User::all();

        return view("property.create", compact("sales_offices", "partner_companys", "departments", "users"));
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
            // "sfa_id" => "nullable|integer", //integer('sfa_id')->nullable()
            // "name" => "nullable|max:50", //string('name',50)->nullable()
            // "address" => "nullable|max:50", //string('address',50)->nullable()
            // "completion_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('completion_date')->nullable()
            // "unit" => "nullable|digits:4", //integer('unit',4)->nullable()
            // "agency" => "nullable|max:50", //string('agency',50)->nullable()
            // "visit_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('visit_date')->nullable()
            // "client" => "nullable|max:50", //string('client',50)->nullable()
            // " department_id" => "nullable|integer", //integer(' department_id')->nullable()
            // "user_id" => "nullable|integer", //integer('user_id')->nullable()
            // "investigation_user_id" => "nullable|integer", //integer('investigation_user_id')->nullable()
            // "investigation_partner_company_id" => "nullable|integer", //integer('investigation_partner_company_id')->nullable()
            // "estimate1_partner_company_id" => "nullable|integer", //integer('estimate1_partner_company_id')->nullable()
            // "estimate2_partner_company_id" => "nullable|integer", //integer('estimate2_partner_company_id')->nullable()
            // "estimate_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('estimate_date')->nullable()
            // "estimate_request_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('estimate_request_date')->nullable()
            // "estimate_submit_deadline_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('estimate_submit_deadline_date')->nullable()
            // "estimate_money" => "nullable|integer", //integer('estimate_money')->nullable()
            // "aged_rank" => "nullable|max:1", //string('aged_rank',1)->nullable()
            // "aged_rank_comment" => "nullable|max:100", //string('aged_rank_comment',100)->nullable()
            // " degradation_rank" => "nullable|max:1", //string(' degradation_rank',1)->nullable()
            // "degradation_rank_comment" => "nullable|max:100", //string('degradation_rank_comment',100)->nullable()
            // "improvement_rank" => "nullable|max:1", //string('improvement_rank',1)->nullable()
            // "improvement_rank_comment" => "nullable|max:100", //string('improvement_rank_comment',100)->nullable()
            // "cost_reduction_rank" => "nullable|max:1", //string('cost_reduction_rank',1)->nullable()
            // "cost_reduction_rank_comment" => "nullable|max:100", //string('cost_reduction_rank_comment',100)->nullable()

        ]);
        $requestData = $request->all();

        Property::create($requestData);

        return redirect("property")->with("flash_message", "新規登録されました");
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
        //$propertie = Propertie::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [properties]--
        // ----------------------------------------------------
        $propertie = DB::table("properties")
            ->select("*")->addSelect("properties.id")->where("properties.id", $id)->first();
        return view("property.show", compact("propertie"));
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
        $propertie = Property::findOrFail($id);
        $sales_offices = SalesOffice::all();
        $partner_companys = PartnerCompany::all();
        $departments = Department::all();
        $users = User::all();

        return view("property.edit", compact("propertie", "sales_offices", "partner_companys", "departments", "users"));
    }

    public function comprehensive_edit($id)
    {
        $propertie = Property::findOrFail($id);
        $sales_offices = SalesOffice::all();
        $partner_companys = PartnerCompany::all();
        $departments = Department::all();
        $users = User::all();

        return view("property.comprehensive_edit", compact("propertie", "sales_offices", "partner_companys", "departments", "users"));
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
            // "sfa_id" => "nullable|integer", //integer('sfa_id')->nullable()
            // "name" => "nullable|max:50", //string('name',50)->nullable()
            // "address" => "nullable|max:50", //string('address',50)->nullable()
            // "completion_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('completion_date')->nullable()
            // "unit" => "nullable|digits:4", //integer('unit',4)->nullable()
            // "agency" => "nullable|max:50", //string('agency',50)->nullable()
            // "visit_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('visit_date')->nullable()
            // "client" => "nullable|max:50", //string('client',50)->nullable()
            // " department_id" => "nullable|integer", //integer(' department_id')->nullable()
            // "user_id" => "nullable|integer", //integer('user_id')->nullable()
            // "investigation_user_id" => "nullable|integer", //integer('investigation_user_id')->nullable()
            // "investigation_partner_company_id" => "nullable|integer", //integer('investigation_partner_company_id')->nullable()
            // "estimate1_partner_company_id" => "nullable|integer", //integer('estimate1_partner_company_id')->nullable()
            // "estimate2_partner_company_id" => "nullable|integer", //integer('estimate2_partner_company_id')->nullable()
            // "estimate_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('estimate_date')->nullable()
            // "estimate_request_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('estimate_request_date')->nullable()
            // "estimate_submit_deadline_date" => "nullable|date_format:Y-m-d H:i:s", //datetime('estimate_submit_deadline_date')->nullable()
            // "estimate_money" => "nullable|integer", //integer('estimate_money')->nullable()
            // "aged_rank" => "nullable|max:1", //string('aged_rank',1)->nullable()
            // "aged_rank_comment" => "nullable|max:100", //string('aged_rank_comment',100)->nullable()
            // " degradation_rank" => "nullable|max:1", //string(' degradation_rank',1)->nullable()
            // "degradation_rank_comment" => "nullable|max:100", //string('degradation_rank_comment',100)->nullable()
            // "improvement_rank" => "nullable|max:1", //string('improvement_rank',1)->nullable()
            // "improvement_rank_comment" => "nullable|max:100", //string('improvement_rank_comment',100)->nullable()
            // "cost_reduction_rank" => "nullable|max:1", //string('cost_reduction_rank',1)->nullable()
            // "cost_reduction_rank_comment" => "nullable|max:100", //string('cost_reduction_rank_comment',100)->nullable()

        ]);
        $requestData = $request->all();

        $propertie = Property::findOrFail($id);
        $propertie->update($requestData);

        return redirect("property")->with("flash_message", "物件情報が更新されました!");
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
        Property::destroy($id);

        return redirect("property")->with("flash_message", "propertie deleted!");
    }
}
    //=======================================================================
