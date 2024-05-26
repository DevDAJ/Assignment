<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function index()
    {
        return response()->json(Car::all());
    }

    public function quote(Request $request)
    {
        $make = $request->input('make');
        $year = $request->input('year');
        $model = $request->input('model');
        $variant = $request->input('variant');
        if ($variant) {
            return response()->json(Car::where('make', $make)
            ->where('year', $year)
            ->where('model', $model)
            ->where('variant', $variant)
            ->min('price'));
        }
        if ($model) {
            return response()->json(Car::where('make', $make)
            ->where('year', $year)
            ->where('model', $model)
            ->distinct('variant')
            ->get('variant'));
        }
        if ($year) {
            return response()->json(Car::where('make', $make)
            ->where('year', $year)
            ->distinct('model')
            ->get('model'));
        }
        if ($make) {
            //return unqique years
            return response()->json(Car::where('make', $make)
            ->distinct('year')
            ->get('year'));
        }
        //return unique makes
        return response()->json(Car::distinct()->get('make'));
    }

    public function create(Request $request)
    {
        if (is_array($request->all())) {
            foreach ($request->all() as $car) {
                Car::create($car);
            }
            return response()->json(null, 201);
        }
        return response()->json(Car::create($request->all()), 201);
    }

    public function destroy(Car $car)
    {
        $car->delete();
        return response()->json(null, 204);
    }
}
