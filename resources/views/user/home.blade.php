@extends('layout.app')
@push('css')
    
@endpush
@section('content')

<section class="content">
    <div class="row">
        <div class="col-xs-12 text-center">
            <img src="/logo/pemko.png" width="70px">
            <h3>Selamat Datang {{Auth::user()->name}}, di <br/>Aplikasi Pendaftaran Berobat Puskesmas </h3>
            <a href="/user/daftar/puskesmas" class="btn btn-block btn-primary btn-lg"><i class="fa fa-user-plus"></i> Daftar Pasien</a>
        </div>
    </div><br/>
    <h2 class="page-header">Pendaftaran Pasien</h2>
    <div class="row">
        @foreach ($data as $item)
            
        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header bg-aqua-active" style="height:60px; padding:10px">
                <!-- /.widget-user-image -->
                <h3 class="widget-user-username" style="font-size:15px;"><strong>{{strtoupper($item->nama)}}</strong></h3>
                <h5 class="widget-user-desc"><strong>{{strtoupper($item->nik)}}</strong></h5>
              </div>
              <div class="box-footer no-padding">
                <ul class="nav nav-stacked">
                  <li><a href="#" style="padding: 2px 15px;">Nomor Antrian <span class="pull-right badge bg-blue">{{$item->antrian}}</span></a></li>
                  <li><a href="#" style="padding: 2px 15px;">Sisa Antrian <span class="pull-right badge bg-blue">{{$item->sisa_antrian}} orang, {{$item->sisa_antrian * 3}} menit</span></a></li>
                  <li><a href="#" style="padding: 2px 15px;">Poli <span class="pull-right badge bg-aqua">UMUM</span></a></li>
                  <li><a href="#" style="padding: 2px 15px;">Puskesmas <span class="pull-right badge bg-green">{{$item->puskesmas}}</span></a></li>
                  <li><a href="#" style="padding: 2px 15px;">Tanggal Daftar <span class="pull-right badge bg-red">{{\Carbon\Carbon::parse($item->tgl_daftar)->format('d-m-Y')}}</span></a></li>
                  <li><a href="#" style="padding: 2px 15px;">Status 
                    @if ($item->status == 0)
                                        <span class="pull-right badge bg-blue">menunggu</span>
                                        @elseif ($item->status == 1)
                                        <span class="pull-right badge bg-red">Anda Di Panggil</span>
                                        @elseif ($item->status == 2)
                                        <span class="pull-right badge bg-red">Sedang Di Periksa</span>
                                        @elseif ($item->status == 3)
                                        <span class="pull-right badge bg-green">selesai</span>
                                        @elseif ($item->status == 4)
                                        <span class="pull-right badge bg-red">di lewati</span>
                                        @endif
                    </a></li>
                </ul>
              </div>
            </div>
            <!-- /.widget-user -->
          </div>
        @endforeach
        
      </div>
      {{$data->links()}}
</section>
@endsection
@push('js')

@endpush
