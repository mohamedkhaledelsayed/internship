<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    public function index()
    {
        $data['rows'] = Client::all();
        return view('client.show')->with($data);
    }

    public function store(Request $request)
    {

        if ($request->ajax()) {
            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'phone' => 'required',
                ]);
            $data = new Client();
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->save();
            $response['row'] = $data;
            return view('client.row')->with($response);
        }
    }

    public function edit($id)
    {
        $data = Client::findOrFail($id);
        return response()->json($data);
    }

    public function update(Request $request)
    {

        if ($request->ajax()) {

            $request->validate(
                [
                    'name' => 'required|string|max:255',
                    'phone' => 'required',
                ]);
            $data  =Client::findOrFail($request->id);
            $data->name = $request->name;
            $data->phone = $request->phone;
            $data->save();
            $response['row'] = $data;
            return view('client.rowEdit')->with($response);
        }
    }

    public function delete($id){
        Client::findOrFail($id)->delete();
        return response()->json(['success'=>'deleted success','id'=>$id]);
    }
}
