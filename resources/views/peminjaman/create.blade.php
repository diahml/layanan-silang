@extends('peminjaman.layout.main')
@extends('partial.link')

@section('container')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<div class="card">
    <div class="card-body">
      <h5 class="card-title">Pinjam Buku</h5>
<!-- General Form Elements -->
@if ($peminjaman->isEmpty()&& $diajukanPeminjaman->isEmpty())
<form method="post" action="/peminjaman">
  @csrf
  <div class="row mb-3">
    <label for="tgl_pinjam" class="col-sm-2 col-form-label">Tanggal Pinjam</label>
    <div class="col-sm-10">
      <input type="date" class="form-control" id="tgl_pinjam" name="tgl_pinjam">
    </div>
  </div>

  <div class="row mb-3">
      <label for="tgl_kembali" class="col-sm-2 col-form-label">Tanggal Kembali</label>
      <div class="col-sm-10">
        <input type="date" class="form-control" id="tgl_kembali" name="tgl_kembali">
      </div>
    </div>

    @for ($i =1; $i <= 50; $i++)
    <div class="field-list row mb-3">
      <label class="col-sm-2 col-form-label">Judul Buku ke-{{ $i }}</label>
      <div class="col-sm-10">
        <select class="form-select @error('book_id') is-invalid"
                
        @enderror aria-label="Default select example" id="book_id" name="book_id_{{ $i }}">
          <option disabled selected value> -- pilih judul buku -- </option>
          @foreach ($books as $book)
          @if ($book->stok > 0)
          <option value="{{ $book->id }}">{{ $book->judul }} - {{ $book->npb }}</option>
          @endif
          @endforeach
        </select>
        @error('book_id')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
            @enderror
      </div>
  </div>
    @endfor  

    <div class="row mb-3">
      <div class="col-sm-10">
        <button type="submit" class="btn btn-primary">Pinjam</button>
      </div>
    </div>

  </form>

    </div>
</div>
@else

<h6 class="card-text">Belum bisa meminjam buku. Sekolah dapat kembali meminjam buku setelah buku sebelumnya dikembalikan.</h6>

@endif

{{-- <script>
  $(document).ready(function(){  

$("select").on('focus', function () {
      $("select").find("option[value='"+ $(this).val() + "']").attr('disabled', false);
  }).change(function() {

      $("select").not(this).find("option[value='"+ $(this).val() + "']").attr('disabled', true);

  });


}); 

</script> --}}

<script>
$('select').on('change', function() {
    $('option').prop('disabled', false);
    $('select').each(function() {
        var val = this.value;
        $('select').not(this).find('option').filter(function() {
            return this.value === val;
        }).prop('disabled', true);
    });
}).change();

</script>


@endsection