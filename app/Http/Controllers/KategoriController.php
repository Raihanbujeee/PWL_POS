<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; 

class KategoriController extends Controller
{
   public function index()
{
    // Ngambil semua data yang ada di dalem tabel m_kategori
    $data = DB::table('m_kategori')->get();
    
    // Datanya dilempar ke file view yang namanya 'kategori'
    return view('kategori', ['data' => $data]);
}
}
