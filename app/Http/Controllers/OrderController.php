<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
  public function OrderCreate(Request $request){
    DB::insert('INSERT INTO order_data (
                        typeOrder,
                        typeRoom,
                        areaRoom,
                        areaLifeRoom,
                        areaKitchenRoom,
                        wallHeightRoom,
                        bathroomCombinedRoom,
                        bathroomSeparateRoom,
                        balconyRoom,
                        loggiaRoom,
                        viewWindow,
                        finishing,
                        elevatorCountPassenger,
                        elevatorCountFreight,
                        typeHouse,
                        typeParking,
                        developAuthor,
                        yearCreate,
                        houseFinishingCount,
                        houseFinishingCountLCD,
                        houseBuildingCount,
                        houseBuildingCountLCD,
                        procentHouseBuilding,
                        descriptiomDeveloperLCD,
                        titleOrder,
                        metro,
                        metro_time,
                        adressOrder,
                        priceOrder,
                        priceOrderQuadro,
                        roomCount,
                        yearComplete,
                        houseComplete,
                        ) VALUES (
                        :typeOrder,
                        :typeRoom,
                        :areaRoom,
                        :areaLifeRoom,
                        :areaKitchenRoom,
                        :wallHeightRoom,
                        :bathroomCombinedRoom,
                        :bathroomSeparateRoom,
                        :balconyRoom,
                        :loggiaRoom,
                        :viewWindow,
                        :finishing,
                        :elevatorCountPassenger,
                        :elevatorCountFreight,
                        :typeHouse,
                        :typeParking,
                        :developAuthor,
                        :yearCreate,
                        :houseFinishingCount,
                        :houseFinishingCountLCD,
                        :houseBuildingCount,
                        :houseBuildingCountLCD,
                        :procentHouseBuilding,
                        :descriptiomDeveloperLCD,
                        :titleOrder,
                        :metro,
                        :metro_time,
                        :adressOrder,
                        :priceOrder,
                        :priceOrderQuadro,
                        :roomCount,
                        :yearComplete,
                        :houseComplete,
                        )', [
                          $request->input('typeOrder'),
                          $request->input('typeRoom'),
                          $request->input('areaRoom'),
                          $request->input('areaLifeRoom'),
                          $request->input('areaKitchenRoom'),
                          $request->input('wallHeightRoom'),
                          $request->input('bathroomCombinedRoom'),
                          $request->input('bathroomSeparateRoom'),
                          $request->input('balconyRoom'),
                          $request->input('loggiaRoom'),
                          $request->input('viewWindow'),
                          $request->input('finishing'),
                          $request->input('elevatorCountPassenger'),
                          $request->input('elevatorCountFreight'),
                          $request->input('typeHouse'),
                          $request->input('typeParking'),
                          $request->input('developAuthor'),
                          $request->input('yearCreate'),
                          $request->input('houseFinishingCount'),
                          $request->input('houseFinishingCountLCD'),
                          $request->input('houseBuildingCount'),
                          $request->input('houseBuildingCountLCD'),
                          $request->input('procentHouseBuilding'),
                          $request->input('descriptiomDeveloperLCD'),
                          $request->input('titleOrder'),
                          $request->input('metro'),
                          $request->input('metro_time'),
                          $request->input('adressOrder'),
                          $request->input('priceOrder'),
                          $request->input('priceOrderQuadro'),
                          $request->input('roomCount'),
                          $request->input('yearComplete'),
                          $request->input('typeOrder'),
                          $request->input('houseComplete'),
                        ]);
  }
}
