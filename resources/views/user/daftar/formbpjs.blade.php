@extends('layout.app')

@push('css')

@endpush

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="get" action="/user/daftarpasien/puskesmas/{{$puskes->kode}}/bpjs/check">
                    @csrf
                    <div class="card-block text-center">
                        <i class="fa fa-user text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20"> ISI NO BPJS
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
                                <input type="text" class="form-control" name="noKartu" value="{{old('noKartu')}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block">CHECK</button>
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