<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Models\Levering_Model;
use Illuminate\Support\Facades\Auth;

class Main_Controller extends Controller
{

    public function getPagina($sPaginaNaam){

        switch($sPaginaNaam){
            case "leveringen" :
                $oLevering = new Levering_Model();
                $aLeveringen = $oLevering->getAlleLeveringen();
                return view('templates.leveringen', compact("aLeveringen"));
                break;

            case "newLevering" :
                return view('templates.newLevering');
                break;

            default :
                $oLevering = new Levering_Model();
                $aLeveringen = $oLevering->getAlleLeveringen();
                return view('templates.leveringen', compact("aLeveringen"));
                break;


        }

    }

    public function nieuweLevering(Request $request){
        $oLevering = new Levering_Model();
        $bResultaat = $oLevering->nieuweLevering($request);
        return view('templates.newLevering', compact("bResultaat"));
    }

    public function getOrder($orderID){
        $oLevering = new Levering_Model();
        $bResultaat = $oLevering->getLevering($orderID);

        echo $bResultaat;

    }


}
