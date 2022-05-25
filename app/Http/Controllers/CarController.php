<?php

namespace App\Http\Controllers;

use App\Car;
use App\Color;
use App\Brand;

use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view("cars.index", compact("cars"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = Brand::all();
        $colors = Color::all();

        return view("cars.create", ['brands' => $brands, 'colors' => $colors]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'numero_telaio' => 'required|min:3|max:20',
                'model' => 'required|min:3|max:20',
                'porte' => 'required|numeric',
                'data_immatricolazione' => 'required|date',
                'brand_id' => 'required',
                'alimentazione' => 'required',
                'prezzo' => 'required|numeric',
                'color' => 'required'
            ],
            [
                'required' => ':attribute è richiesto',
                'numeric' => ':attribute deve essere un numero',
                'date' => ':attribute deve essere di tipo date',
                'min' => ':attribute deve avere almeno :min caratteri',
                'max' => ':attribute deve avere massimo :max caratteri'
            ]
        );

        $data = $request->all();
        $car = new Car();
        $car->numero_telaio = $data["numero_telaio"];
        $car->model = $data["model"];
        $car->porte = $data["porte"];
        $car->data_immatricolazione = $data["data_immatricolazione"];
        //$car->marca = $data["marca"];
        $car->brand_id = $data["brand_id"];
        $car->alimentazione = $data["alimentazione"];
        $car->prezzo = $data["prezzo"];

        $car->save();
        $car->colors()->attach($data["color"]);

        return redirect()->route("cars.show", $car->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::findOrFail($id);
        return view("cars.show", compact("car"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Car $car)
    {
        $brands = Brand::all();
        $colors = Color::all();
        return view('cars.edit', ['car' => $car, 'brands' => $brands, 'colors' => $colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Car $car)
    {
        $request->validate(
            [
                'numero_telaio' => 'required|min:3|max:20',
                'model' => 'required|min:3|max:20',
                'porte' => 'required|numeric',
                'data_immatricolazione' => 'required|date',
                'brand_id' => 'required',
                'alimentazione' => 'required',
                'prezzo' => 'required|numeric',
                'color' => 'required'
            ],
            [
                'required' => ':attribute è richiesto',
                'numeric' => ':attribute deve essere un numero',
                'date' => ':attribute deve essere di tipo date',
                'min' => ':attribute deve avere almeno :min caratteri',
                'max' => ':attribute deve avere massimo :max caratteri'
            ]
        );

        $data = $request->all();

        $car->numero_telaio = $data["numero_telaio"];
        $car->model = $data["model"];
        $car->porte = $data["porte"];
        $car->data_immatricolazione = $data["data_immatricolazione"];
        $car->brand_id = $data["brand_id"];
        $car->alimentazione = $data["alimentazione"];
        $car->prezzo = $data["prezzo"];
        $car->save();

        $car->colors()->sync($data["color"]);
        return redirect()->route("cars.show", $car->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Car $car)
    {
        $car->delete();
        return redirect()->route('cars.index')->with('message', "$car->model è stata cancellata");
    }
}
