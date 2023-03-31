<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view ('peminjaman.index',[
            "active"=>"peminjaman",
            "title"=>"Dashboard Peminjaman",
            "peminjaman"=>Peminjaman::select('*')->where([
                ['user_id', auth()->user()->id],
                ['status', 'diajukan peminjaman'],
            ])->get(),
            "peminjamanApproved"=>Peminjaman::select('*')->where([
                ['user_id', auth()->user()->id],
                ['status', 'dipinjam'],
            ])->get(),
        ]);
    }

    public function riwayat()
    {
        return view ('peminjaman.riwayat',[
            "active"=>"riwayat",
            "title"=>"Riwayat Peminjaman",
            "peminjaman"=>Peminjaman::select('*')->where([
                ['user_id', auth()->user()->id],
                ['status', 'dikembalikan'],
            ])->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('peminjaman.create',[
            "active"=>'pinjam',
            "title"=> "Pengajuan Peminjaman",
            "books"=>Book::all(),
            "peminjaman"=>Peminjaman::select('*')->where([
                ['user_id', auth()->user()->id],
                ['status', 'dipinjam'],
            ])->get(),
            "diajukanPeminjaman"=>Peminjaman::select('*')->where([
                ['user_id', auth()->user()->id],
                ['status', 'diajukanPeminjaman'],
            ])->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
  

        for($i =1; $i <= 50; $i++){

            
            ${'validatedData'.$i}['book_id'] = $request['book_id_'.$i];
            ${'validatedData'.$i}['tgl_pinjam'] = Carbon::parse($request['tgl_pinjam'])->format('Y-m-d');
            ${'validatedData'.$i}['tgl_kembali'] = Carbon::parse($request['tgl_kembali'])->format('Y-m-d');
            ${'validatedData'.$i}['user_id']=auth()->user()->id;
            ${'validatedData'.$i}['status']='diajukan peminjaman';
            ${'validatedData'.$i}['ke']=0;

            //createnya disini
            if ($request['book_id_'.$i]) {
                        Peminjaman::create(${'validatedData'.$i});
                        Book::where('id', $request['book_id_'.$i])
                        ->update(['stock' => 0]);
            }
        }
        
        return redirect('/peminjaman');
    }

    public function peraturan(){
        return view ('peminjaman.peraturan',[
            "active"=>"pinjam",
            "title"=>"Peraturan Peminjaman",
        ]);
    }

    // public function perpanjang(Peminjaman $perpanjang){
    //     return view ('peminjaman.perpanjang',[
    //         "active"=>"peminjaman",
    //         "title"=>"Peminjaman",
    //         "peminjaman"=>Peminjaman::select('*')->where([
    //             ['id', $perpanjang['id']],
    //         ])->get(),
    //     ]);
    // }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function edit(Peminjaman $peminjaman)
    {
        return view('peminjaman.perpanjang',[
            "active"=>"pinjam",
            "title" => "Perpanjangan Peminjaman",
            "peminjaman"=>Peminjaman::all(),
            "peminjaman"=>$peminjaman,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     * 
     */

     //Perpanjang Peminjaman
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validatedData['tgl_kembali']=$request->tgl_kembali;
        $validatedData['ke']=2;
            Peminjaman::where('id', $peminjaman->id)
            ->update($validatedData);
        
            return redirect('/peminjaman');

        // $perpanjang=Peminjaman::select('*')->where([
        //         ['user_id', $peminjaman->user_id ],
        //         ['status', 'dipinjam'],
        // ])->get();
                    
                    
        //     if($perpanjang->count()){
        //         return redirect('/admin/peminjaman/'.$peminjaman->user_id);
        //     }else{
        //         return redirect('/admin/peminjaman/dipinjam/'.$peminjaman->user_id);
        //     }


        // $perpanjang=Peminjaman::select('*')->where([
        //     ['user_id', auth()->user()->id],
        //     ['status', 'dipinjam'],
        // ])->get();
        // $validatedData['tgl_kembali']=$request->tgl_kembali;
        // $validatedData['ke']=2;
        // foreach($perpanjang as $perpanjang){
        //     Peminjaman::where('id', $perpanjang->id)
        //     ->update($validatedData);
        // }
        
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function destroy(Peminjaman $peminjaman)
    {
        //
    }
}
