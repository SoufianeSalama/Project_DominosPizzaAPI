<?php
/**
 * Created by PhpStorm.
 * User: Soufiane
 * Date: 16/11/2016
 * Time: 23:18
 */
namespace App\Http\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/////////////////////////       Dit Model bevat alle methodes voor het aanmaken, opvragen van RESERVATIES en om de Content voor de pagina's op te halen.
class Levering_Model extends Model implements  Authenticatable
{
    use \Illuminate\Auth\Authenticatable;


    public function nieuweLevering(Request $request){

        $iOrderNr = $request["frmNewLeveringOrderNr"];
        $sBedrag  = $request["frmNewLeveringBedrag"];
        $sNaam    = $request["frmNewLeveringNaam"];
        $sAdres   = $request["frmNewLeveringAdres"];
        $sTelefoon = $request["frmNewLeveringTelefoon"];
        $sNota    = $request["frmNewLeveringNota"];

        $sBetaling = $request["frmNewLeveringBetaling"];
        $aBestelling = $request["frmLeveringItems"];

        $date = date_create();
        $dTimestamp  =  date_timestamp_get($date);

        try {
            DB::insert('insert into leveringen (ordernr, bedrag, naam, adres, telefoon, nota, betaling, bestelling, timestamp) values (? ,?, ?, ?, ?, ?, ?, ?, ?)', array($iOrderNr, $sBedrag, $sNaam,  $sAdres, $sTelefoon, $sNota, $sBetaling, $aBestelling, $dTimestamp));
            $bResultaat = true;
        } catch (\PDOException $e) {
            $bResultaat = false;
        }
        return $bResultaat;

    }


    public function getLevering($orderId){
        $errorReport="";
        try {
            $order = DB::table('leveringen')->where('id', $orderId)->first();
        } catch (\PDOException $e) {

            $errorReport = "Kan geen verbinding maken met de database";
        }

         $aOrder = (array)$order;

         $sOrderId = $aOrder["id"];
         $sStatus =  "OK";
         $klant = array(
            "ordernr" =>$aOrder["ordernr"],
            "bedrag" => $aOrder["bedrag"],
            "naam" => $aOrder["naam"],
            "adres" => $aOrder["adres"],
            "telefoon" => $aOrder["telefoon"],
            "nota" =>$aOrder["nota"],
            "betaling" => $aOrder["betaling"],
            "timestamp" => $aOrder["timestamp"]
         );

         $post_data = json_encode(array(
            'orderid' => $sOrderId,
             'status' => $sStatus,
            'klant' => $klant,
            'order' =>  json_decode($aOrder["bestelling"])
            )
        );




        return $post_data;
    }

    public function getAlleLeveringen(){

        $errorReport = "";
        $aLeveringen = [];
        try {
            $aLeveringen = DB::select('select * from leveringen', [1]);
        } catch (\PDOException $e) {
            $aLeveringen = [];

            $errorReport = "Kan geen verbinding maken met de database";
        }

        if (!empty($aLeveringen)){
            return $aLeveringen;
        }
        else{
            return $errorReport;
        }

    }





}