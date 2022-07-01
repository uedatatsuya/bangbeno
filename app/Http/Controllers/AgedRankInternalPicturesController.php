<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Auth;
use Validate;
use DB;
use App\AgedRankInternalPicture;
    
    //=======================================================================
    class AgedRankInternalPicturesController extends Controller
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
				// -- QueryBuilder: SELECT [aged_rank_internal_pictures]--
				// ----------------------------------------------------
				$aged_rank_internal_picture = DB::table("aged_rank_internal_pictures")
				->leftJoin("distribution_boards","distribution_boards.id", "=", "aged_rank_internal_pictures.distribution_board_id")
				->orWhere("aged_rank_internal_pictures.distribution_board_id", "LIKE", "%$keyword%")->orWhere("aged_rank_internal_pictures.path", "LIKE", "%$keyword%")->orWhere("aged_rank_internal_pictures.comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.investigation_id", "LIKE", "%$keyword%")->orWhere("distribution_boards.category", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_circuit", "LIKE", "%$keyword%")->orWhere("distribution_boards.supply_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.special_report", "LIKE", "%$keyword%")->orWhere("distribution_boards.carry_route_movie", "LIKE", "%$keyword%")->orWhere("distribution_boards.memo", "LIKE", "%$keyword%")->orWhere("distribution_boards.is_update_proposal", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.aged_rank_exterior_picture_comment", "LIKE", "%$keyword%")->orWhere("distribution_boards.target_repair_picture", "LIKE", "%$keyword%")->orWhere("distribution_boards.installation_location", "LIKE", "%$keyword%")->orWhere("distribution_boards.change_method", "LIKE", "%$keyword%")->orWhere("distribution_boards.power_outage_range", "LIKE", "%$keyword%")->orWhere("distribution_boards.remark", "LIKE", "%$keyword%")->select("*")->addSelect("aged_rank_internal_pictures.id")->paginate($perPage);
            } else {
                    //$aged_rank_internal_picture = AgedRankInternalPicture::paginate($perPage);
				// ----------------------------------------------------
				// -- QueryBuilder: SELECT [aged_rank_internal_pictures]--
				// ----------------------------------------------------
				$aged_rank_internal_picture = DB::table("aged_rank_internal_pictures")
				->leftJoin("distribution_boards","distribution_boards.id", "=", "aged_rank_internal_pictures.distribution_board_id")
				->select("*")->addSelect("aged_rank_internal_pictures.id")->paginate($perPage);              
            }          
            return view("aged_rank_internal_picture.index", compact("aged_rank_internal_picture"));
        }
    
        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\View\View
         */
        public function create()
        {
            return view("aged_rank_internal_picture.create");
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
				"comment" => "nullable|max:100", //string('comment',100)->nullable()

            ]);
            $requestData = $request->all();
            
            AgedRankInternalPicture::create($requestData);
    
            return redirect("aged_rank_internal_picture")->with("flash_message", "aged_rank_internal_picture added!");
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
            //$aged_rank_internal_picture = AgedRankInternalPicture::findOrFail($id);
            
				// ----------------------------------------------------
				// -- QueryBuilder: SELECT [aged_rank_internal_pictures]--
				// ----------------------------------------------------
				$aged_rank_internal_picture = DB::table("aged_rank_internal_pictures")
				->leftJoin("distribution_boards","distribution_boards.id", "=", "aged_rank_internal_pictures.distribution_board_id")
				->select("*")->addSelect("aged_rank_internal_pictures.id")->where("aged_rank_internal_pictures.id",$id)->first();
            return view("aged_rank_internal_picture.show", compact("aged_rank_internal_picture"));
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
            $aged_rank_internal_picture = AgedRankInternalPicture::findOrFail($id);
    
            return view("aged_rank_internal_picture.edit", compact("aged_rank_internal_picture"));
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
				"comment" => "nullable|max:100", //string('comment',100)->nullable()

            ]);
            $requestData = $request->all();
            
            $aged_rank_internal_picture = AgedRankInternalPicture::findOrFail($id);
            $aged_rank_internal_picture->update($requestData);
    
            return redirect("aged_rank_internal_picture")->with("flash_message", "aged_rank_internal_picture updated!");
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
            AgedRankInternalPicture::destroy($id);
    
            return redirect("aged_rank_internal_picture")->with("flash_message", "aged_rank_internal_picture deleted!");
        }
    }
    //=======================================================================
    
    