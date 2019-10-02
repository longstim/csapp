<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;
Use Redirect;
use View;
use Datatables;
use File;

class ScoreController extends Controller
{
   public function index()
   {
   		return view('dokumen.dokumen');
   }

   public function daftardokumen()
   {
   		$checkernav = 2;
      $id_selected = Input::get('kategori');

      $dokumen=DB::table('kategori')->get();
      $kategori=DB::table('kategori')->get();

   		return view('dokumen.dokumen', compact('checkernav','dokumen','kategori','id_selected'));
   }

   public function tambahdokumen()
   {
      $checkernav = 2;

      $kategori=DB::table('kategori')->get();
      return view('dokumen.form_tambah_dokumen', ['kategori'=>$kategori, 'checkernav'=>$checkernav]);
   }

   public function prosestambahdokumen(Request $request)
   {
   	  $file = $request->file('_file');  

      if(!empty($file))
      {
        $checkNamaFile = DB::table('dokumen')->where('nama_dokumen','=',$file->getClientOriginalName())->get();
        if($checkNamaFile->count() <= 0)  
        {
          $kategori = DB::table('kategori')->where('id_kategori','=',Input::get('kategori'))->first();
          if(empty($kategori))
          {
             return back()->with('message','"Kategori" tidak ditemukan!');
          }

          $destinationPath = 'file/'.$kategori->nama_kategori;
          $path = $destinationPath.'/'.$file->getClientOriginalName();

          $data = array(
          'nama_dokumen' => $file->getClientOriginalName(),
          'kategori' => Input::get('kategori'),
          'keterangan' => Input::get('keterangan'),
          'tanggal_upload' => Input::get('tanggal_upload'),
          'link' => $path,
          );

          DB::table('dokumen')->insert($data);

          //Move Uploaded File
          $file->move($destinationPath,$file->getClientOriginalName());

          return Redirect::to('dokumen')->with('message','Berhasil menambah data');
        }
        else
        {
          return back()->with('message','Nama file sudah ada. Silahkan ganti nama file anda!');
        }
    
      }
      else
      {
        return back()->with('message','Dokumen yang diupload tidak ada!');
      }
   }

   public function detailsuratmasuk($id_dokumen)
   {
      $data = DB::table('dokumen')->where('id_dokumem','=',$id_dokumen)->first();

      return View::make('dokumen.detail_dokumen')->with('dokumen',$data);
   }

   public function editdokumen($id_dokumen)
   {
      $data = DB::table('dokumen')->where('id_dokumen','=',$id_dokumen)->first();
      $kategori=DB::table('kategori')->get();

      return view('dokumen.form_edit_dokumen', ['dokumen'=>$data, 'kategori'=>$kategori]);
   }

    public function proseseditdokumen()
   {   

      $dokumen = DB::table('dokumen')->where('id_dokumen','=',Input::get('id_dokumen'))->first();
      if(empty($dokumen))
      {
         return back()->with('message','"Dokumen" tidak ditemukan!');
      }

      $kategoriBase = DB::table('kategori')->where('id_kategori','=',$dokumen->kategori)->first();
      if(empty($kategoriBase))
      {
         return back()->with('message','"Kategori Base" tidak ditemukan!');
      }

      $kategoriTarget = DB::table('kategori')->where('id_kategori','=',Input::get('kategori'))->first();
      if(empty($kategoriTarget))
      {
         return back()->with('message','"Kategori Tujuan" tidak ditemukan!');
      }

      $data = array(
        'kategori' => Input::get('kategori'),
        'keterangan' => Input::get('keterangan'),
        'tanggal_upload' => Input::get('tanggal_upload'),
      );

      if($dokumen->kategori != Input::get('kategori'))
      {
          File::move(public_path().'/file/'.$kategoriBase->nama_kategori.'/'.$dokumen->nama_dokumen, public_path().'/file/'.$kategoriTarget->nama_kategori.'/'.$dokumen->nama_dokumen);
      }

      DB::table('dokumen')->where('id_dokumen','=',Input::get('id_dokumen'))->update($data);

      return Redirect::to('dokumen')->with('message','Berhasil mengedit data');
   }

   public function hapusdokumen($id_dokumen)
   {
      $dokumen = DB::table('dokumen')->where('id_dokumen','=',$id_dokumen)->first();
      if(empty($dokumen))
      {
         return back()->with('message','"Dokumen" tidak ditemukan!');
      }

      $kategori = DB::table('kategori')->where('id_kategori','=',$dokumen->kategori)->first();
      if(empty($kategori))
      {
         return back()->with('message','"Kategori" tidak ditemukan!');
      }

      File::delete(public_path().'/file/'.$kategori->nama_kategori.'/'.$dokumen->nama_dokumen);

      $data = DB::table('dokumen')->where('id_dokumen','=',$id_dokumen)->delete();
      return Redirect::to('dokumen')->with('message','Berhasil menghapus data.');
   }

   public function json()
   {
      return Datatables::of(DB::table('dokumen')
      ->select('dokumen.id_dokumen','kategori.nama_kategori', 'dokumen.keterangan', 'dokumen.tanggal_upload', 'dokumen.nama_dokumen')
      ->join('kategori','kategori.id_kategori','=','dokumen.kategori'))
      ->addIndexColumn()
      ->addColumn('download', function ($dokumen) {
        return '<a href="'.'file/'.$dokumen->nama_kategori.'/'.$dokumen->nama_dokumen.'" data-toggle="tooltip" title="Download" class="btn btn-md btn-primary"><i class="glyphicon glyphicon-download"></i> </a>';
        })
      ->addColumn('edit', function ($dokumen) {
        return '<a href="editdokumen/'.$dokumen->id_dokumen.'" data-toggle="tooltip" title="Edit" class="btn btn-md btn-info"><i class="glyphicon glyphicon-edit"></i> </a>';
        })
       ->addColumn('delete', function ($dokumen) {
        return '<a class="btn btn-danger" onclick="return myFunction();" href="hapusdokumen/'.$dokumen->id_dokumen.'"><i class="glyphicon glyphicon-trash"></i> </a>';
        })
      ->make(true);
   }

   public function prosesaddgoodscore(Request $request)
   {
      $data = array(
      'score' => "1",
      'tanggal' => date("Y-m-d"),
      );

      DB::table('score')->insert($data);
      return Redirect::to('/afterscoring')->with('message','Terima kasih atas partisipasi anda.');
   }

   public function prosesaddpoorscore(Request $request)
   {
      $data = array(
      'score' => "0",
      'tanggal' => date("Y-m-d"),
      );

      DB::table('score')->insert($data);
      return Redirect::to('/afterscoring')->with('message','Terima kasih atas partisipasi anda.');
   }

   public function afterscoring()
   {
      return view('thanks');
   }
}
