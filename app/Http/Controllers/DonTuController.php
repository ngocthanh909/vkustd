<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class DonTuController extends Controller
{
    function themDonIndex(){
        $filedList = DB::table('table_maudon_chitiet')->get();
        return view('DonTu/taodon')->with(['listTruong' => $filedList]);
    }
    function ajaxTruong(Request $request){
        $result = DB::table('table_maudon_chitiet')->where('tentruong', 'LIKE', '%'.$request->tentruong.'%')->get();
        return $result;
    }
    function maudonStore(Request $request){
        $value1 = [
            'tenmaudon' => $request->tenmaudon,
            'truong' => $request->truong,
            'dieukhoan' => $request->dieukhoan,
        ];
        $response1 = DB::table('table_maudon')->insertGetId($value1);
    }
    function truongStore(Request $request){
        $values = [
            'tentruong' => $request->tentruong,
            'ghichutruong' => $request->ghichutruong,
        ];
        $response1 = DB::table('table_maudon_chitiet')->insertGetId($values);
        $num = $response1;

        if($response1 != null){
            $response2 = DB::table('table_maudon_chitiet')->where('id', $num)->first();
        }
        return json_encode($response2);
    }

    // Nộp đơn
    function nopdonIndex(Request $request, $donid){
        $don = DB::table('table_maudon')->where('maudon_id', $donid)->first();
        $listtruong = explode(',', $don->truong);
        $mangTruong = array();

        foreach ($listtruong as $item){
            $rs = DB::table('table_maudon_chitiet')->where('id', $item)->first();
            if($rs != null){
                array_push($mangTruong, $rs);
            }
        }
        // dd($mangTruong);
        return view('Dontu/nopdon')->with([
            'truong' => $mangTruong,
            'maudon_id' => $donid,
        ]);
    }
    function nopdonStore(Request $request, $maudon_id){
        $thongtindon = [
            'masv' => '19IT195',
            'maudon_id' => $maudon_id,
            'thoigiantao' => date("Y/m/d"),
        ];
        $donid = DB::table('table_don')->insertGetId($thongtindon);
        $rawRecord = $request->tentruong;
        foreach ($rawRecord as $key => $item){
            $record = [
                'don_id' => $donid,
                'truong_id' => $key,
                'noidung' => $item,
            ];   
            $result = DB::table('table_don_chitiet')->insert($record);
        }
        return $result;
    }
}
