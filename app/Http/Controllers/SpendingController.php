<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spending;

class spendingController extends Controller
{
    public function index()
    {
        return view('spending.index');
    }

    public function data()
    {
        $spending = Spending::orderBy('id_spending', 'desc')->get();

        return datatables()
            ->of($spending)
            ->addIndexColumn()
            ->addColumn('created_at', function ($spending) {
                return indonesian_date($spending->created_at, false);
            })
            ->addColumn('nominal', function ($spending) {
                return money_format($spending->nominal);
            })
            ->addColumn('action', function ($spending) {
                return '
                <div class="btn-group">
                    <button type="button" onclick="editForm(`'. route('spending.update', $spending->id_spending) .'`)" class="btn btn-xs btn-info btn-flat"><i class="fa fa-pencil"></i></button>
                    <button type="button" onclick="deleteData(`'. route('spending.destroy', $spending->id_spending) .'`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $spending = Spending::create($request->all());

        return response()->json('Data Submitted', 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $spending = Spending::find($id);

        return response()->json($spending);
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
        $spending = Spending::find($id)->update($request->all());

        return response()->json('Data Updated', 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $spending = Spending::find($id)->delete();

        return response(null, 204);
    }
}
