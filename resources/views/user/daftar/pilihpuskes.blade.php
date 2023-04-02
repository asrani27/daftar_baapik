@extends('layout.app')

@push('css')

@endpush

@section('content')
<div class="page-body">
    <div class="row">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <form method="post" action="/user/checkpasien">
                    @csrf
                    <div class="card-block text-center">
                        <i class="fa fa-hospital text-c-blue d-block f-40"></i>
                        <h4 class="m-t-20"> Pilih Puskemas
                        </h4>
                        @foreach ($puskes as $item)
                        <a href="/user/daftarpasien/puskesmas/{{$item->kode}}"
                            class="btn btn-primary btn-block btn-md btn-round">{{$item->nama}}</a>
                        @endforeach
                        {{-- <div class="form-group row">

                            <label class="col-sm-2 col-form-label">Puskesmas</label>
                            <div class="col-sm-10">
                                <select name="puskesmas" class="form-control" required>
                                    <option value="">-puskes-</option>
                                    <option value="banjarmasinindah" {{old('puskesmas')=='banjarmasinindah' ? 'selected'
                                        :''}}>Banjarmasin Indah</option>
                                    <option value="karangmekar" {{old('puskesmas')=='karangmekar' ? 'selected' :''}}>
                                        Karang Mekar</option>
                                    <option value="kayutangi" {{old('puskesmas')=='kayutangi' ? 'selected' :''}}>Kayu
                                        Tangi</option>
                                    <option value="seijingah" {{old('puskesmas')=='seijingah' ? 'selected' :''}}>Sei
                                        Jingah</option>
                                    <option value="seimesa" {{old('puskesmas')=='seimesa' ? 'selected' :''}}>Sei Mesa
                                    </option>
                                    <option value="terminal" {{old('puskesmas')=='terminal' ? 'selected' :''}}>Terminal
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="nik" value="{{old('nik')}}" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label"></label>
                            <div class="col-sm-10">
                                <button type="submit" class="btn btn-primary btn-block">Check</button>
                            </div>
                        </div> --}}
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
@endsection

@push('js')

@endpush