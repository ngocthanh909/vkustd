<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CvController extends Controller
{
    public function cvIndex(){
        $sinhvienCv = DB::table('table_sinhvien_cv')->join('table_sinhvien', 'table_sinhvien.masv', '=', 'table_sinhvien_cv.masv')->join('table_nganh', 'table_sinhvien.nganh_id', '=', 'table_nganh.id')->where('table_sinhvien.masv', '19IT195')->first();
        $sinhvienCv->sothich = explode(';', $sinhvienCv->sothich);
        $sinhvienCv->tomtat = explode(';', $sinhvienCv->tomtat);
        $sinhvienCv->ngoaingu = explode(';', $sinhvienCv->ngoaingu);
        // dd($sinhvienCv);
        return view('cv')->with('sinhvienCv', $sinhvienCv);
    }
    function cvIndexV2(){
        return view('cvIndexV2');
    }
    public function suacvIndex(){
       

        return view('cvEdit');
    }
}
