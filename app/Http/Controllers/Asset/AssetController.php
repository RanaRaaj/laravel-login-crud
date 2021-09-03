<?php

namespace App\Http\Controllers\Asset;

use App\Http\Controllers\Controller;
use App\Models\Asset;
use App\Models\Location;
use Illuminate\Http\Request;
use Auth;

class AssetController extends Controller
{
    //
    public function index()
    {
        return view('create');
    }
    public function dashboard()
    {
        $data = Asset::get()->all();
        foreach($data as $value){
            $id = $value->id;
            $location = Location::orderBy('id','DESC')->where('assets_id',$id)->get()->first();
            $value['location'] = $location->location;
            $data[]=$value;
        }
        $value = array_unique($data);
        return view('dashboard',compact('value'));
    }
    
    public function add(Request $request)
    {
        $id = Asset::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
            ])->id;
        Location::create([
            'assets_id' => $id,
            'location' => $request->location
            ]);
        $request->session()->flash('added','Customer Addded Successfully..!');
        return redirect('dashboard');
    }

    public function edit($id)
    {
        $data = Asset::select(
            "assets.id", 
            "assets.first_name",
            "assets.last_name", 
            "locations.location as locations"
        )->where('assets.id',$id)
        ->rightJoin("locations", "locations.assets_id", "=", "assets.id")
        ->get();
        return view('edit',compact('data'));
    }

    public function update(Request $request)
    {
        Asset::where('id',$request->id)
        ->update([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name
            ]);
        Location::where('assets_id',$request->id)
        ->update([
            'location' => $request->location
            ]);
        $request->session()->flash('added','Customer Updated Successfully..!');
        return redirect('dashboard');
    }

    public function delete(Request $request)
    {
        Asset::where('id',$request->id)->delete();  
        Location::where('assets_id',$request->id)->delete();
        return "Client Deleted Successfully..!";   
    }
    
}
