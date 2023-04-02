@extends('layout.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
  <div class="row">
    <div class="col-md-12">
    <div class="box box-primary">
    <div class="box-header with-border">
    <i class="fa fa-user-plus"></i>
      <h3 class="box-title">Form Pendaftaran, Puskesmas : {{$puskesmas->nama}}</h3>
    </div>
    <!-- /.box-header -->
    <form class="form-horizontal" method="post" action="/user/daftar/puskesmas/{{$puskesmas->id}}/form-daftar">
        @csrf
    <div class="box-body">
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">NIK</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nik" placeholder="NIK" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Nama <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="nama" placeholder="Nama" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Jenis Kelamin <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <select name="sex" class="form-control" required>
                <option value="L">Laki-Laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Lahir <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tglLahir" required>
            </div>
        </div>
        
        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Tanggal Daftar <span class="text-red">*</span></label>
            <div class="col-sm-10">
              <input type="date" class="form-control" name="tglDaftar" min={{\Carbon\Carbon::today()->format('Y-m-d')}}
              max={{\Carbon\Carbon::today()->addDays(1)->format('Y-m-d')}} required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">Pilih Poli <span class="text-red">*</span></label>
            <div class="col-sm-10">
                <select name="kdPoli" class="form-control" required>
                    <option value="">-poli-</option>
                    @foreach ($poli as $item)
                    <option value="{{$item->kdPoli}}">{{$item->nmPoli}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    <div class="box-footer">
        <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-send"></i> Simpan</button>
        <a href="/user/daftar/puskesmas" class="btn btn-default pull-right btn-flat"><i class="fa fa-fw fa-backward"></i> Kembali</a>
      </div>
    </form>
    
    </div>
    </div>
</div>
</section>
@endsection
@push('js')
    
@endpush
