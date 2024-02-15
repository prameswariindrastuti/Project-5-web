<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PembayaranController extends Controller
{
    public function index()
    {
        //get pembayaran
        $pembayaran = Pembayaran::latest()->paginate(5);
        
        // $siswa = Siswa::all();
        //render view with pembayaran
        return view('pembayaran.index', compact('pembayaran'));
    }

    public function create()
   {
        $siswa = Siswa::all();
        return view('pembayaran.create', compact('siswa'));
   }

      /**
       * store
       * 
       * @param Request $request
       * @return void
       */

       public function store(Request $request)
       {
         //validate form

         $this->validate($request, [
            'id_siswa' => 'required',
            'tgl_bayar' => 'required',
            'jumlah_bayar' => 'required',
         ]);

         //check if a recordwith the same id_siswa already exists
         $existingRecord = Pembayaran::where('id_siswa', $request->id_siswa)->first();

         if ($existingRecord){
            //if the record exists, Update it
            $existingRecord->update([
                'tgl_bayar' => $request->tgl_bayar,
                'jumlah_bayar' => $existingRecord->jumlah_bayar + $request->jumlah_bayar,
            ]);

            return redirect()->route('pembayaran.index')->with(['succes' => 'Data Berhasil Diupdate!']);
         } else {

          //create post
        Pembayaran::create([
            'id_siswa'     => $request->input('id_siswa'),
            'tgl_bayar'   => $request->input('tgl_bayar'),
            'jumlah_bayar'   => $request->input('jumlah_bayar'),
        ]);
   
            //redirect to index
            return redirect()->route('pembayaran.index')->with(['success' => 'Pembayaran Berhasil Disimpan!']);

    }
       }

       public function destroy(Pembayaran $pembayaran)
           {
               $pembayaran->delete();
               //redirect to index
               return redirect()->route('pembayaran.index')->with(['success' => 'Data Berhasil Dihapus!']);
           }
}
