@extends('layout.app')
@push('css')
    
@endpush
@section('content')

<section class="content">
    <h2 class="page-header">Apakah Anda pernah berobat di puskesmas : {{$puskesmas->nama}} ?</h2>
    <div class="row">
        <div class="col-xs-12 text-center">
            <a href="/user/daftar/puskesmas/{{$puskesmas->id}}/lama_baru/baru" class="btn btn-flat btn-block btn-primary btn-lg"><i class="fa fa-user"></i> Tidak (Pasien Baru)</a>
            <a href="/user/daftar/puskesmas/{{$puskesmas->id}}/lama_baru/lama" class="btn btn-flat btn-block btn-primary btn-lg"><i class="fa fa-user"></i> Ya (Pasien Lama)</a>
            <a href="/user/daftar/puskesmas" class="btn btn-flat btn-primary btn-block">Kembali</a>
        </div>
    </div>
</section>
@endsection
@push('js')

@endpush
