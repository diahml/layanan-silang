<?php

namespace App\Http\Controllers;

// require_once 'vendor/autoload.php';

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Book_category;
use App\Models\Book;
use App\Models\User;
use App\Models\Post;
use App\Models\Peminjaman;
use Barryvdh\DomPDF\Facade\Pdf;
use League\Csv\Writer;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\SekolahExport;
use App\Exports\PeminjamanExport;
use App\Exports\RiwayatExport;
use App\Exports\BookExport;
use App\Exports\Book_CategoryExport;

class ExportController extends Controller
{
    public function bookpdf(){

        //  // Ambil data dari database atau sumber data lainnya
         $data = Book::all(); 
        view()->share('data', $data);
        $pdf = PDF::loadView('export.bookpdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf = PDF:: loadview('export.bookpdf');
        return $pdf->download('data-buku.pdf');
    }

    public function book_categorypdf(){

        //  // Ambil data dari database atau sumber data lainnya
         $data = Book_category::all(); 
        view()->share('data', $data);
        $pdf = PDF::loadView('export.book_categorypdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf = PDF:: loadview('export.bookpdf');
        return $pdf->download('data-kategoru-buku.pdf');
    }

    public function peminjamanpdf(){

        //  // Ambil data dari database atau sumber data lainnya

         $data = Peminjaman::where([
            ['status', 'dipinjam']
         ])->get(); 
        view()->share('data', $data);
        $pdf = PDF::loadView('export.peminjamanpdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf = PDF:: loadview('export.bookpdf');
        return $pdf->download('data-peminjaman.pdf');
    }

    public function riwayatpdf(){

        //  // Ambil data dari database atau sumber data lainnya

         $data = Peminjaman::where([
            ['status', 'dikembalikan']
         ])->get(); 
        view()->share('data', $data);
        $pdf = PDF::loadView('export.riwayatpdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf = PDF:: loadview('export.bookpdf');
        return $pdf->download('riwayat-peminjaman.pdf');
    }

    public function sekolahpdf(){

        //  // Ambil data dari database atau sumber data lainnya

         $data = User::where([
            ['role', 'sekolah']
         ])->get(); 
        view()->share('data', $data);
        $pdf = PDF::loadView('export.sekolahpdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf = PDF:: loadview('export.bookpdf');
        return $pdf->download('data-sekolah.pdf');
    }

    public function sekolahexcel()
    {
        $data = User::where([
            ['role', 'sekolah']
         ])->get(); 
    
        // Define the Excel export data
        $exportData = [];
    
        foreach ($data as $data) {
            $exportData[] = [
                'Nama Sekolah' => $data->instansi,
                'Alamat' => $data->alamat,
                'No PIC' => $data->kontak,
            ];
        }
    
        // Export the data to Excel
        return Excel::download(new SekolahExport($exportData), 'data-sekolah.xlsx');
    }

    public function peminjamanexcel()
    {
        $data = Peminjaman::where([
            ['status', 'dipinjam']
         ])->get(); 
    
        // Define the Excel export data
        $exportData = [];
    
        foreach ($data as $data) {
            $exportData[] = [
                'Nama Sekolah' => $data->user->instansi,
                'Judul Buku' => $data->book->judul,
                'No Buku' => $data->book->no_buku,
                'No Punggung Buku' => $data->book->npb,
                'Tanggal Pinjam' => Carbon::parse($data->tgl_pinjam)->format('d M Y'),
                'Tanggal Kembali' => Carbon::parse($data->tgl_kembali)->format('d M Y'),
            ];
        }
    
        // Export the data to Excel
        return Excel::download(new PeminjamanExport($exportData), 'data-peminjaman.xlsx');
    }

    public function riwayatexcel()
    {
        $data = Peminjaman::where([
            ['status', 'dikembalikan']
         ])->get(); 
    
        // Define the Excel export data
        $exportData = [];
    
        foreach ($data as $data) {
            $exportData[] = [
                'Nama Sekolah' => $data->user->instansi,
                'Judul Buku' => $data->book->judul,
                'No Buku' => $data->book->no_buku,
                'No Punggung Buku' => $data->book->npb,
                'Tanggal Pinjam' => Carbon::parse($data->tgl_pinjam)->format('d M Y'),
                'Tanggal Kembali' => Carbon::parse($data->tgl_kembali)->format('d M Y'),
            ];
        }
    
        // Export the data to Excel
        return Excel::download(new RiwayatExport($exportData), 'riwayat-peminjaman.xlsx');
    }

    public function bookexcel()
    {
        $data = Book::all(); 
    
        // Define the Excel export data
        $exportData = [];
    
        foreach ($data as $data) {
            $exportData[] = [
                'Judul Buku' => $data->judul,
                'Penulis' => $data->penulis,
                'Kategori' => $data->book_category->kelas,
                'No Buku' => $data->no_buku,
                'No Punggung Buku' => $data->npb,
               
            ];
        }
    
        // Export the data to Excel
        return Excel::download(new BookExport($exportData), 'data-buku.xlsx');
    }

    public function book_categoryexcel()
    {
        $data = Book_category::all(); 
    
        // Define the Excel export data
        $exportData = [];
    
        foreach ($data as $data) {
            $exportData[] = [
                'Kelas' => $data->kelas,

            ];
        }
    
        // Export the data to Excel
        return Excel::download(new Book_CategoryExport($exportData), 'data-kategori-buku.xlsx');
    }
}
