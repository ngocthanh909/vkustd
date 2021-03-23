<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HosoController extends Controller
{   
    public function suahosoStore(Request $request){
        $values2 = ['diachi' => $request->diachitamtru, 
                'thoigian' => $request->thoigiantamtru,
                'masv' => '19IT195'];
        $result2 = DB::table('table_sinhvien_tamtru')->where('masv', '19IT195')->insertGetId($values2);

            $values1 = [
                'dienthoai' => $request->dienthoai, 
                'dienthoaigiadinh' => $request->dienthoaigiadinh, 
            ];
            $values3 = [
                'avatar' => $request->avatar,
                'ma_bhyt'=> $request->ma_bhyt,
                'facebook' => $request->facebook,
                'tamtru_id' => $result2
            ];
            
        foreach($values1 as $key => $value){
            if(is_null($value)){
                unset($values1[$key]);
            }
        }
        foreach($values3 as $key => $value){
            if(is_null($value)){
                unset($values3[$key]);
            }
        }
        $result1 = DB::table('table_sinhvien')->where('masv', '19IT195')->update($values1);
        $result3 = DB::table('table_sinhvien_chitiet')->where('masv', '19IT195')->update($values3);

        echo  "1: " .$result3 . "2: ". $result3; 

        if($result1 + $result3 = 2){
            return "Thành công!";
        } else {
            return "Thất bại!";
        }
    }
    // public function imgUpload(Request $request)
    // {
    //     dd('upload');
    //     if($request->hasFile('upload')) {
    //         $originName = $request->file('upload')->getClientOriginalName();
    //         $fileName = pathinfo($originName, PATHINFO_FILENAME);
    //         $extension = $request->file('upload')->getClientOriginalExtension();
    //         $fileName = $fileName.'_'.time().'.'.$extension;
    //         $request->file('upload')->move(public_path('images'), $fileName);
    //         $url = 'images/'.$fileName; 
    //         echo $url;
    //     }
    // }

    public function imgUpload(Request $request)
    {
        $folderPath = public_path('images/');
 
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;
 
        file_put_contents($imageFullPath, $image_base64);
        $result = 'images/'.$imageName;
        return $result;
    }
    public function suahosoIndex(){
        $sinhvien = DB::table('table_sinhvien')->where('table_sinhvien.masv', '19IT195')->join('table_sinhvien_chitiet', 'table_sinhvien.masv', '=', 'table_sinhvien_chitiet.masv')->first();
        $sinhhvienTamtru = DB::table('table_sinhvien_tamtru')->where('id', $sinhvien->tamtru_id)->first();
        // dd($sinhvien);
        // dd($sinhhvienTamtru);
        
        return view('layouts.suahoso')->with('sinhvien', $sinhvien)->with('sinhvienTamtru', $sinhhvienTamtru);
    }
    public function hosoIndex(){
        $sinhvien = DB::table('table_sinhvien')->where('table_sinhvien.masv', '19IT195')->join('table_sinhvien_chitiet', 'table_sinhvien.masv', '=', 'table_sinhvien_chitiet.masv')->first();
        $sinhhvienTamtru = DB::table('table_sinhvien_tamtru')->where('id', $sinhvien->tamtru_id)->first();
        // dd($sinhvien);
        // dd($sinhhvienTamtru);
        
        return view('layouts.xemhoso')->with('sinhvien', $sinhvien)->with('sinhvienTamtru', $sinhhvienTamtru);
    }
}
