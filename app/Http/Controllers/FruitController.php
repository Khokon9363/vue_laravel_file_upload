<?php

namespace App\Http\Controllers;

use App\Fruit;
use Faker\Provider\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FruitController extends Controller
{
    public function store(Request $request)
    {
        $imgName = time() . '.' . $request->image->extension();
        $request->image->storeAs('images',$imgName,'public');

        $fruit = new Fruit();
        $fruit->name  = $request->name;
        $fruit->image = $imgName;
        $fruit->save();

        return response()->json($fruit,200);
    }
    public function allData()
    {
        $fruits = Fruit::all();
        return response()->json($fruits,200);
    }
    public function destroy($id)
    {
        $fruits = Fruit::destroy($id);
        return response()->json($fruits,200);
    }

}
