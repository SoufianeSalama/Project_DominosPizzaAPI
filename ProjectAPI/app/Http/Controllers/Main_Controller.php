<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Http\Models\Levering_Model;

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

            case "personeel" :
                return view('templates.personeel');
                break;

            default :

                return view('welcome');
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
        /*$host= gethostname();
        $ip = gethostbyname($host);;
        var_dump($ip);*/
    }
}
