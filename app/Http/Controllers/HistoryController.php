<?php

namespace Bulkly\Http\Controllers;

use Bulkly\BufferPosting;
use Bulkly\SocialPostGroups;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Svg\Tag\Group;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buffer_posts = BufferPosting::orderBy('created_at','desc')
            ->with('groupInfo')->with('accountInfo')->paginate(10);


        return view('pages.history')->with('buffer_posts',$buffer_posts);
    }

    public function history(){
        $buffer_posts = BufferPosting::orderBy('created_at','desc')
            ->with('groupInfo')->with('accountInfo')->paginate(10);

        return response()->json($buffer_posts);
    }

    public function group_by(Request $request,$id){
        $group_id = $id;
        $groupBy = BufferPosting::orderBy('created_at','desc')->where('group_id',$group_id)
            ->with('groupInfo')->with('accountInfo')->paginate(10);
        if($group_id ==0){
            $groupBy = BufferPosting::orderBy('created_at','desc')
                ->with('groupInfo')->with('accountInfo')->paginate(10);
        }




        return response()->json($groupBy);
    }

    public function group_name(Request $request,$name){

        $groupBy = SocialPostGroups::where('name','LIKE',"%". $name ."%")->get(['id'])->toArray();

        $groupBy = array_map('current',$groupBy);

        $groupBy = BufferPosting::orderBy('created_at','desc')->whereIn('group_id',$groupBy)
            ->with('groupInfo')->with('accountInfo')->paginate(10);



        if(empty($name)){
            $groupBy = BufferPosting::orderBy('created_at','desc')
                ->with('groupInfo')->with('accountInfo')->paginate(10);
        }

        return response()->json($groupBy);

    }


    public function by_date(Request $request){

        $date = isset($_GET['date']) ? $_GET['date'] : Carbon::today();



        $groupBy = BufferPosting::orderBy('created_at','desc')->where('created_at',$date)->orwhere('created_at',date('Y-m-d',strtotime($date)))
            ->with('groupInfo')->with('accountInfo')->paginate(10);




        return response()->json($groupBy);




    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function all_group()
    {
        $group = SocialPostGroups::all(['name','id']);

        return response()->json($group);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
