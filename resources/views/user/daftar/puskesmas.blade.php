@extends('layout.app')
@push('css')
    
@endpush
@section('content')
<section class="content">
    <h2 class="page-header">Pilih Puskesmas untuk berobat</h2>
    <div class="row">
      @foreach ($data as $item)
        <div class="col-md-4">
          <div class="info-box bg-green">
            <span class="info-box-icon"><i class="fa fa-hospital-o"></i></span>
            <a href="/user/daftar/puskesmas/{{$item->id}}/form-daftar">
              <div class="info-box-content">
                <span class="info-box-text" style="color:white">Puskesmas</span>
                <span class="info-box-number" style="color:white">{{$item->nama}}</span>

                <div class="progress">
                  <div class="progress-bar" style="width: 20%"></div>
                </div>
                <span class="progress-description" style="color:white">
                      Status : Online
                    </span>
              </div>
            </a>  
          </div>
        </div>
        @endforeach
      </div>
      <a href="/user/home" class="btn btn-flat btn-primary btn-block">Kembali</a>
</section>
@endsection
@push('js')

@endpush
