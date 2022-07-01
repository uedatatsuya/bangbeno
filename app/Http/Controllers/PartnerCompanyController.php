<?php

namespace App\Http\Controllers;

use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\PartnerCompany;

//=======================================================================
class PartnerCompanyController extends Controller
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
            // -- QueryBuilder: SELECT [partner_companies]--
            // ----------------------------------------------------
            $partner_companie = DB::table("partner_companies")
                ->orWhere("partner_companies.name", "LIKE", "%$keyword%")->select("*")->addSelect("partner_companies.id")->paginate($perPage);
        } else {
            //$partner_companie = PartnerCompanie::paginate($perPage);
            // ----------------------------------------------------
            // -- QueryBuilder: SELECT [partner_companies]--
            // ----------------------------------------------------
            $partner_companie = DB::table("partner_companies")
                ->select("*")->addSelect("partner_companies.id")->paginate($perPage);
        }
        return view("partner_company.index", compact("partner_companie"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view("partner_company.create");
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

        PartnerCompany::create($requestData);

        return redirect("partner_company")->with("flash_message", "partner_companie added!");
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
        //$partner_companie = PartnerCompanie::findOrFail($id);

        // ----------------------------------------------------
        // -- QueryBuilder: SELECT [partner_companies]--
        // ----------------------------------------------------
        $partner_companie = DB::table("partner_companies")
            ->select("*")->addSelect("partner_companies.id")->where("partner_companies.id", $id)->first();
        return view("partner_company.show", compact("partner_companie"));
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
        $partner_companie = PartnerCompany::findOrFail($id);

        return view("partner_company.edit", compact("partner_companie"));
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

        $partner_companie = PartnerCompany::findOrFail($id);
        $partner_companie->update($requestData);

        return redirect("partner_company")->with("flash_message", "partner_companie updated!");
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
        PartnerCompany::destroy($id);

        return redirect("partner_company")->with("flash_message", "partner_companie deleted!");
    }
}
    //=======================================================================
