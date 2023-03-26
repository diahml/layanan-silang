<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Peminjaman;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPeminjamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //menampilkan halaman dashboard peminjaman
    public function index()
    {
        return view ('admin.peminjaman.index',[
            "active"=>"admin/peminjaman",
            "title"=>"Peminjaman",
            // "peminjaman"=>Peminjaman::all(),
            "peminjaman" => Peminjaman::groupBy('user_id')->where([
                ['status', 'diajukan peminjaman'],
            ])->get()
        ]);
    }

    //melihat peminjaman berdasarkan sekolah
    public function lihatPinjam(){
        return view ('admin.peminjaman.dipinjam.index',[
            "active"=>"admin/peminjaman",
            "title"=>"Peminjaman",
            "peminjaman" => Peminjaman::groupBy('user_id')->where([
                ['status', 'dipinjam'],
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function show(Peminjaman $peminjaman)
    {
        // return view('admin.peminjaman.show',[
        //     "active"=>"admin/peminjaman",
        //    "peminjaman"=>$peminjaman
        // ]);
    }

    //status buku dikembalikan
    public function dikembalikan(Peminjaman $peminjaman){

        $validatedData['status']='dikembalikan';
        $validatedData['ke']=0;
        Peminjaman::where('id', $peminjaman->id)
                ->update($validatedData);
        Book::where('id', $peminjaman->book_id)
                ->update(['stock' => 1]);

        $return=Peminjaman::where([
            'user_id'=>$peminjaman->user_id,
            'status'=>'dipinjam'
        ])->get();

        if($return->count()){
            return redirect('/admin/peminjaman/dipinjam/'.$peminjaman->user_id);
            
        }else{
            return redirect('/admin/peminjaman/riwayat');
            
        }
            
    }

    //approved permintaan peminjaman buku
    public function approved(Peminjaman $peminjaman, Book $book){
        $validatedData['status']='dipinjam';
        $validatedData['ke']=1;
        Peminjaman::where('id', $peminjaman->id)
                ->update($validatedData);

         $peminjamanApproved=Peminjaman::select('*')->where([
            ['user_id', $peminjaman->user_id ],
            ['status', 'diajukan peminjaman'],
        ])->get();
        
        
        if($peminjamanApproved->count()){
            return redirect('/admin/peminjaman/'.$peminjaman->user_id);
        }else{
            return redirect('/admin/peminjaman/dipinjam/'.$peminjaman->user_id);
        }
    }

    //menolak permohonan peminjaman buku
    public function ditolak(Peminjaman $peminjaman){

        $validatedData['status']='ditolak';
        Peminjaman::where('id', $peminjaman->id)
                ->update($validatedData);
        Book::where('id', $peminjaman->book_id)
                ->update(['stock' => 1]);

        $peminjamanApproved=Peminjaman::select('*')->where([
            ['user_id', $peminjaman->user_id ],
            ['status', 'diajukan peminjaman'],
        ])->get();
                
                
        if($peminjamanApproved->count()){
            return redirect('/admin/peminjaman/'.$peminjaman->user_id);
        }else{
            return redirect('/admin/peminjaman/dipinjam/'.$peminjaman->user_id);
        }

    }

    //menampilkan halaman buku yang dipinjam berdasarkan sekolah
    public function dipinjam(Peminjaman $peminjaman, $peminjamen){

        if($peminjamen){
            $id = $peminjamen;

        return view ('admin.peminjaman.dipinjam.dipinjam',[
            "active"=>"admin/peminjaman",
            "title"=>"Peminjaman",
            "dipinjam"=>Peminjaman::select('book_id')->where([
                ['user_id', $id ],
                ['status', 'dipinjam'],
            ])->get(),
            "peminjaman"=>Peminjaman::select('*')->where([
                ['user_id', $id ],
                ['status', 'dipinjam'],
            ])->get(),
        ]);

    }
        
    }


    //riwayat peminjaman buku
    public function riwayat(){
        return view ('admin.peminjaman.riwayat',[
            "active"=>"admin/peminjaman",
            "title"=>"Peminjaman",
            "peminjaman" => Peminjaman::where([
                ['status', 'dikembalikan'],
            ])->get(),
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */

    //halaman permohonan peminjaman
    public function edit(Peminjaman $peminjaman, $peminjamen, Request $request)
    {
       if($peminjamen){
        $id = $peminjamen;
        
        
        return view ('admin.peminjaman.detail',[
            "detail"=>$peminjaman,
            "active"=>"admin/peminjaman",
            "title"=>"Peminjaman",
            // "instansi"=>$peminjaman->user->instansi,
            "peminjaman"=>Peminjaman::select('*')->where([
                ['user_id', $id ],
                ['status', 'diajukan peminjaman'],
            ])->get(),
        ]);
       }

       if($request->peminjaman->id){
            $validatedData['status']='dipinjam';
            Peminjaman::where('id', $peminjaman->id)
                    ->update($validatedData);

       }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Peminjaman $peminjaman, $peminjamen)
    {
        $detail= Peminjaman::select('*')->where([
            ['user_id', $peminjamen ],
            ['status', 'diajukan peminjaman'],
        ])->get();
        foreach ($detail as $peminjaman) {
                if($request->peminjaman->id==0){
                        $validatedData['status'] = 'ditolak';
                }else{
                        $validatedData['status'] = 'dipinjam';
                };
        
                    Peminjaman::where('id', $peminjaman->id)
                    ->update($validatedData);
        }
                return redirect('/admin/peminjaman/dipinjam');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Peminjaman  $peminjaman
     * @return \Illuminate\Http\Response
     */

     //menghapus permohonan peminjaman
    public function destroy(Peminjaman $peminjaman)
    {
        $delete=Peminjaman::select('*')->where([
            ['user_id', $peminjaman->user_id],
            ['status', 'diajukan peminjaman'],
        ])->get();

        foreach($delete as $delete){
            Peminjaman::destroy($delete->id);
            Book::where('id', $delete->book_id)
                ->update(['stock' => 1]);
        }

        return redirect('/admin/peminjaman');
    }

    //delete peminjaman
    public function deletePeminjaman(Peminjaman $peminjaman)
    {
        $delete=Peminjaman::select('*')->where([
            ['user_id', $peminjaman->user_id],
            ['status', 'dipinjam'],
        ])->get();

        foreach($delete as $delete){
            Peminjaman::destroy($delete->id);
            Book::where('id', $delete->book_id)
                ->update(['stock' => 1]);
        }

        return redirect('/admin/peminjaman/dipinjam');
    }
}
