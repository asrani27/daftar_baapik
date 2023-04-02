@extends('layout.app')

@push('css')

@endpush

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="post" action="/user/daftarpasien/puskesmas/{{$puskes->kode}}/bpjs/check">
                    @csrf
                    <div class="card-block text-center">
                        <i class="fa fa-user text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20"> PILIH POLI
                        </h4>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">PUSKESMAS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="puskesmas" value="{{$puskes->nama}}"
                                    readonly>
                                <input type="hidden" class="form-control" name="kode" value="{{$puskes->kode}}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">JENIS</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="jenis" value="BPJS" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NO KARTU</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="noKartu" value="{{$data->noKartu}}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NAMA PASIEN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nama"
                                    value="{{$data == null ? '':$data->nama}}" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <select name="jenis_kelamin" class="form-control" readonly>
                                    <option value="">-gender-</option>
                                    <option value="L" {{$data==null ? '' :$data->sex =='L' ? 'selected' :''}}>
                                        Laki-Laki</option>
                                    <option value="P" {{$data==null ? '' :$data->sex =='P' ? 'selected' :''}}>
                                        Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal_lahir"
                                    value="{{$data == null ? '':\Carbon\Carbon::createFromFormat('d-m-Y',$data->tglLahir)->format('Y-m-d')}}"
                                    readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Pilih Poli</label>
                            <div class="col-sm-10">
                                <select name="kdPoli" class="form-control" required>
                                    <option value="">-poli-</option>
                                    @foreach ($poli as $item)
                                    <option value="{{$item->kdPoli}}">{{$item->nmPoli}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Daftar</label>
                            <div class="col-sm-10">
                                <input type="date" class="form-control" name="tanggal"
                                    min={{\Carbon\Carbon::today()->format('Y-m-d')}}
                                max={{\Carbon\Carbon::today()->addDays(1)->format('Y-m-d')}} required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" name="button" value="daftar"
                                    class="btn btn-primary btn-block">Simpan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>


    </div>
</div>
@endsection

@push('js')

@endpush