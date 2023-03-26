<?php

namespace App\Http\Controllers;

// require_once 'vendor/autoload.php';

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Book_category;
use App\Models\Book;
use App\Models\Category;
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
         $data = Category::all(); 
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
            ['is_school', 1]
         ])->get(); 
        view()->share('data', $data);
        $pdf = PDF::loadView('export.sekolahpdf', ['data' => $data])->setOptions(['defaultFont' => 'sans-serif']);
        // $pdf = PDF:: loadview('export.bookpdf');
        return $pdf->download('data-sekolah.pdf');
    }

    public function sekolahexcel()
    {
        $data = User::where([
            ['is_school', 1]
         ])->get(); 
    
        // Define the Excel export data
        $exportData = [];
    
        foreach ($data as $data) {
            $exportData[] = [
                'Nama Sekolah' => $data->commissariat,
                'Alamat' => $data->address,
                'No PIC' => $data->phone,
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
                'Nama Sekolah' => $data->user->commissariat,
                'Judul Buku' => $data->book->title,
                'No Buku' => $data->book->booknum,
                'No Punggung Buku' => $data->book->backnum,
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
                'Nama Sekolah' => $data->user->commisariat,
                'Judul Buku' => $data->book->title,
                'No Buku' => $data->book->booknum,
                'No Punggung Buku' => $data->book->backnum,
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
                'Judul Buku' => $data->title,
                'Penulis' => $data->author,
                'Kategori' => $data->category->name,
                'No Buku' => $data->booknum,
                'No Punggung Buku' => $data->backnum,
               
            ];
        }
    
        // Export the data to Excel
        return Excel::download(new BookExport($exportData), 'data-buku.xlsx');
    }

    public function book_categoryexcel()
    {
        $data = Category::all(); 
    
        // Define the Excel export data
        $exportData = [];
    
        foreach ($data as $data) {
            $exportData[] = [
                'Kelas' => $data->name,

            ];
        }
    
        // Export the data to Excel
        return Excel::download(new Book_CategoryExport($exportData), 'data-kategori-buku.xlsx');
    }
}
