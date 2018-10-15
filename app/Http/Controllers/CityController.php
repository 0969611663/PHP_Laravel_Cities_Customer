<?php

namespace App\Http\Controllers;

use App\Model\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index ()
    {
        $cities = City::all();
        return view('cities.list', compact('cities'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create ()
    {
        return view('cities.create');
    }

    public function store (Request $request)
    {
        $city = new City();
        $city->name = $request->input('name');
        $city->save();

        return redirect()->route('cities_index');
    }

    public function edit ($id)
    {
        $city = City::FindOrFail($id);
        return view('cities.edit', compact('city'));
    }

    public function update (Request $request, $id)
    {
        $city = City::FindOrFail($id);
        $city->name = $request->input('name');
        $city->save();

        return redirect()->route('cities_index');
    }

    public function destroy ($id)
    {
        $city = City::FindOrFail($id);

        //xoa khach hang thuoc tinh thanh nay
        $city->customers()->delete();
        $city->delete();

        return redirect()->route('cities_index');
    }
}
