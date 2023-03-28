<?php

use App\Models\User;
use App\Models\Book_category;
use App\Models\Post_category;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\AdminBookController;
use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminSekolahController;
use App\Http\Controllers\AdminPeminjamanController;
use App\Http\Controllers\AdminBookCategoryController;
use App\Http\Controllers\AdminPostCategoryController;
use App\Http\Controllers\MemberFront;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\SuggestController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PresenceController;
use App\Http\Controllers\PreMemberController;
use App\Http\Controllers\AdmPresenceController;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view ('home',[
        "title"=>"Home",
        "active"=>"home"
    ]);
});

// presence
// LOCAL
Route::middleware('guest')->group(function () {
    Route::get('/presence', [PresenceController::class, 'index']);
});

Route::middleware('guest')->group(function () {
    Route::post('/presence', [PresenceController::class, 'store']);
});

// NOT LOCAL
// Route::get('/presence', [PresenceController::class, 'index'])->middleware('networkaccess:10.139.18.0,10.139.18.255');
// Route::post('/presence', [PresenceController::class, 'store'])->middleware('networkaccess:10.139.18.0,10.139.18.255');



// Route::get('/about', function () {
//     return view ('about', [
//         "name"=> "Tina",
//         "email"=>"diahmartina16@gmail.com"
//     ]);
// });

Route::get('/katalog-buku', function () {
    return view ('katalog',[
        "title"=>"Katalog Buku",
        "active"=>"katalog"
    ]);
});


Route::get('/login', [LoginController::class, 'index'])->middleware('guest');

// Route::get('/home', [DashboardController::class, 'index']);

Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/catalogue', [BookController::class, 'frontcatalogue'])->middleware('guest');


Route::get('posts/{post:slug}', [PostController::class,'show']);

Route::get('/admin', [AdminController::class,'index'])->middleware('admin');

// Route::get('/post_categories', function(){
//     return view('categories', [
//         'title'=>'Post Categories',
//         'post_categories'=>Post_category::all()
//     ]);
// });

// register
Route::get('/admin/membering/register', [MemberController::class, 'register'])->middleware('admin');
Route::resource('/register', PreMemberController::class)->middleware('guest');
Route::get('/admin/membering/approve/{id_register}', [MemberController::class, 'approve'])->middleware('admin');
Route::get('/admin/membering/delete/{id_register}', [MemberController::class, 'delete'])->middleware('admin');



Route::get('/post_categories/{post_category:slug}', function(Post_category $post_category){
    return view('post_category', [
        'title'=>$post_category->name,
        'posts'=>$post_category->posts->load('post_category'),
        'post_category'=>$post_category->name,
        'active'=>"kegiatan"
    ]);
});

Route::get('/admin/peminjaman/dipinjam/{peminjamen}',[AdminPeminjamanController::class,'dipinjam'])->middleware('admin');

Route::get('/admin/peminjaman/dikembalikan/{peminjaman:id}',[AdminPeminjamanController::class,'dikembalikan'])->middleware('admin');

Route::get('/admin/peminjaman/approved/{peminjaman:id}',[AdminPeminjamanController::class,'approved'])->middleware('admin');

Route::get('/admin/peminjaman/ditolak/{peminjaman:id}',[AdminPeminjamanController::class,'ditolak'])->middleware('admin');

Route::get('/admin/peminjaman/dipinjam',[AdminPeminjamanController::class,'lihatPinjam'])->middleware('admin');


Route::get('/admin/peminjaman/riwayat',[AdminPeminjamanController::class, 'riwayat'])->middleware('admin');

Route::get('/admin/peminjaman/{peminjamen}', [AdminPeminjamanController::class,'edit'])->middleware('admin');

Route::get('/admin/peminjaman/dipinjam/{peminjaman:id}',[AdminPeminjamanController::class,'deletePeminjaman'])->middleware('admin');

Route::resource('/admin/peminjaman', AdminPeminjamanController::class)->middleware('admin');


Route::get('/peminjaman/update/{peminjaman:id}',[PeminjamanController::class,'updatePerpanjang'])->middleware('school');

Route::get('/peminjaman/perpanjang/{peminjaman}',[PeminjamanController::class,'perpanjang'])->middleware('school');

Route::get('/peminjaman/riwayat', [PeminjamanController::class,'riwayat'])->middleware('school');

Route::get('/peminjaman/peraturan', [PeminjamanController::class, 'peraturan'])->middleware('school');

Route::resource('/peminjaman', PeminjamanController::class)->middleware('school');


Route::get('/admin/post/checkSlug',[AdminPostController::class,'checkSlug'])->middleware('admin');

Route::resource('/admin/post/kategori', AdminPostCategoryController::class)->middleware('admin');

Route::resource('/admin/post', AdminPostController::class)->middleware('admin');



Route::resource('/admin/buku/kategori', AdminBookCategoryController::class)->middleware('admin');

Route::resource('/admin/buku', AdminBookController::class)->middleware('admin');

Route::resource('/admin/sekolah', AdminSekolahController::class)->middleware('admin');


Route::get('/katalog-buku', [KatalogController::class,'index']);

Route::get('/blog', [PostController::class,'index']);

Route::get('/katalog-buku/{book_category:kelas}', [KatalogController::class,'show']);

//Report download
Route::get('/book-export_pdf',[ExportController::class, 'bookpdf'])->middleware('admin');
Route::get('/book_category-export_pdf',[ExportController::class, 'book_categorypdf'])->middleware('admin');
Route::get('/peminjaman-export_pdf',[ExportController::class, 'peminjamanpdf'])->middleware('admin');
Route::get('/riwayat-export_pdf',[ExportController::class, 'riwayatpdf'])->middleware('admin');
Route::get('/data-sekolah-export_pdf',[ExportController::class, 'sekolahpdf'])->middleware('admin');

Route::get('/book-export_excel',[ExportController::class, 'bookexcel'])->middleware('admin');
Route::get('/book_category-export_excel',[ExportController::class, 'book_categoryexcel'])->middleware('admin');
Route::get('/peminjaman-export_excel',[ExportController::class, 'peminjamanexcel'])->middleware('admin');
Route::get('/riwayat-export_excel',[ExportController::class, 'riwayatexcel'])->middleware('admin');
Route::get('/data-sekolah-export_excel',[ExportController::class, 'sekolahexcel'])->middleware('admin');

// Route::get('katalog-buku/{book_category:kelas}',function (Book_category $book_category){
//     return view('book',[
//         'active'=>'katalog',
//         'books'=>$book_category->books->load('book_category'),
//     ]);
// });

// dashboard
Route::get('/admin/dashboard', [AdmPresenceController::class, 'dashboard'])->middleware('admin');

// review
Route::get('/member/review/hapusmyre/{id_review}', [ReviewController::class, 'hapusmyre'])->middleware('member');
Route::get('/member/review', [ReviewController::class, 'index'])->middleware('member');
Route::get('/member/review/create/{id_book}', [ReviewController::class, 'create'])->middleware('member');
Route::resource('/member/review', ReviewController::class)->middleware('member');
Route::get('/member/review/edit/{id_review}', [ReviewController::class, 'edit'])->middleware('member');
Route::get('/admin/katalogue/review', [ReviewController::class, 'review'])->middleware('admin');
Route::get('/admin/katalogue/hapusreview/{id_review}', [ReviewController::class, 'hapusreview'])->middleware('admin');



// // katalogue
// Route::get('/admin/katalogue/checkSlug', [BookController::class, 'checkSlug'])->middleware('admin');
// Route::get('/admin/katalogue/edit/{id_book}', [BookController::class, 'edit'])->middleware('admin');
// Route::get('/admin/katalogue/destroy/{id_book}', [BookController::class, 'destroy'])->middleware('admin');

// membering
Route::get('/admin/membering/pdfmember', [MemberController::class, 'pdfmember'])->middleware('admin');
Route::resource('/admin/membering', MemberController::class)->middleware('admin');
Route::get('/admin/hapus/{id_member}', [MemberController::class, 'hapus'])->middleware('admin');
Route::get('/admin/membering/edit/{id_member}', [MemberController::class, 'edit'])->middleware('admin');
Route::get('/admin/membering/show/{id_member}', [MemberController::class, 'show'])->middleware('admin');


// category
Route::get('/admin/category/checkSlug', [CategoryController::class, 'checkSlug'])->middleware('admin');
Route::get('/admin/category/hapus/{id_category}', [CategoryController::class, 'hapus'])->middleware('admin');
Route::get('/admin/category/edit/{id_category}', [CategoryController::class, 'edit'])->middleware('admin');
Route::resource('/admin/category', CategoryController::class)->middleware('admin');

// visitor
Route::get('/admin/visitor', [AdmPresenceController::class, 'index'])->middleware('admin');
Route::get('/admin/visitor/pdfvisitor', [AdmPresenceController::class, 'pdfvisitor'])->middleware('admin');

// borrow
Route::get('/admin/borrow/pdfborrow', [BorrowController::class, 'pdfborrow'])->middleware('admin');
Route::resource('/admin/borrow', BorrowController::class)->middleware('admin');
Route::get('/admin/borrow/hapus/{id_borrow}', [BorrowController::class, 'hapus'])->middleware('admin');
Route::get('/admin/borrow/edit/{id_borrow}', [BorrowController::class, 'edit'])->middleware('admin');
Route::get('/admin/borrow/status/{id_borrow}', [BorrowController::class, 'status'])->middleware('admin');

// preorder book
Route::get('/admin/suggest', [SuggestController::class, 'index'])->middleware('admin');
Route::get('/admin/suggest/delete/{id_suggest}', [SuggestController::class, 'delete'])->middleware('admin');
Route::get('/admin/suggest/approve/{id_suggest}', [SuggestController::class, 'approve'])->middleware('admin');


// member interface
Route::get('/member/frontpage', [MemberFront::class, 'index'])->middleware('member');
Route::get('/member/catalogue/shows/{id_book}', [MemberFront::class, 'shows'])->middleware('member');
Route::get('/member/frontpage/show/{id_member}', [MemberController::class, 'show'])->middleware('member');
Route::get('/member/historyborrow', [BorrowController::class, 'history'])->middleware('member');
Route::resource('/member/suggest', SuggestController::class)->middleware('member');
