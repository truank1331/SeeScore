<?php

namespace App\Http\Controllers;

use App\BLE;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ApiController extends Controller{
    public function insertble(Request $request){
        $subjectid = $request["subjectid"];
        $year = $request["year"];
        $term = $request["term"];
        $section = $request["section"];
        $studentid = $request["studentid"];
        $point = $request["point"];

        $BLE = new BLE();
        $BLE -> subjectid = $subjectid;
        $BLE -> year = $year;
        $BLE -> term = $term;
        $BLE -> section = $section;
        $BLE -> studentid = $studentid;
        $BLE -> point = $point;
        $BLE -> status = "Fail";

        $selectstatus = DB::select('SELECT ble FROM courseinfo WHERE subjectid=? AND year=? AND term=? AND section=?;',[$subjectid,$year,$term,$section]);
        if(($selectstatus)==null){
            $BLE -> status = "Fail:Subject is Notfound";
            return response()->json($BLE);
        }
        if(($selectstatus[0]->ble)==0){
            $BLE -> status = "Fail:Subject BLE is Not Open";
            return response()->json($BLE);
        }
        
        if($request["subjectid"]==null || $request["year"]==null || $request["term"]==null || $request["section"]==null || $request["studentid"] ==null||$request["point"]==null){
            $BLE -> status = "Fail:Null";
            return response()->json($BLE);
        }
        //dd($BLE);.
        $select = DB::select('SELECT * FROM ble WHERE subjectid=? AND year=? AND term=? AND section=? AND studentid=?;',[$subjectid,$year,$term,$section,$studentid]);
        if(count($select)>0){
            DB::update('UPDATE ble set ble.point = ? where subjectid = ? and year = ? and term = ? and section = ? AND studentid=?;',[$point,$subjectid,$year,$term,$section,$studentid]);
            $BLE -> status = "Updatesuccess";
            return response()->json($BLE);
        }
        else{
            $BLE -> status = "Insertsuccess";
            DB::insert('insert into BLE values (?,?,?,?,?,?)',array($subjectid,$year,$term,$section,$studentid,$point));
        }
        return response()->json($BLE);
    }

}