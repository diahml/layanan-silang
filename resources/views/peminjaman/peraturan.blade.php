@extends('peminjaman.layout.main')
@extends('partial.link')

@section('container')

<div class="card">
    <div class="card-body">
        <h5 class="card-title">Peraturan Peminjaman Buku Layanan Silang Perpustakaan Bank Indonesia Kantor Perwakilan Purwokerto</h5>
        <ul>
            <li class="card-text">Jumlah buku maksimal yang dapat dipinjam dalam satu periode peminjaman adalah 50 buku.</li>
            <li class="card-text">Tidak dapat meminjam buku lagi ketika buku sebelumnya belum dikembalikan.</li>
            <li class="card-text">Batas waktu maksimal peminjaman buku adalah satu bulan setengah, dan dapat diperpanjang sebanyak satu kali.</li>
            <li class="card-text">Kerusakan buku yang termasuk kategori parah harus mengganti dengan judul buku yang sama.</li>
            <li class="card-text">Sekolah dapat mengajukan buku yang akan dipinjam pada form peminjaman buku, notifikasi mengenai pengambilan buku akan dikirimkan ke Whatsapp ketika Pustakawan telah mereview data permohonan peminjaman buku.</li>
        </ul>
        <a href="/peminjaman/create" class="btn btn-primary">Pinjam Buku</a>
    </div>
</div>

@endsection