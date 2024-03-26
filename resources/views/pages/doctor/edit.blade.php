@extends('layouts.app')

@section('title', 'Edit Doctor')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('library/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Advanced Forms</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Forms</a></div>
                    <div class="breadcrumb-item">Edit Doctor</div>
                </div>
            </div>

            <div class="section-body">
                <h2 class="section-title">Edit Doctor</h2>

                <div class="card">
                    <form action="{{ route('doctors.update', ['doctor' => $doctor->doctor_sip]) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="card-header">
                            <h4>Input Text</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="doctor_name"
                                    class="form-control @error('doctor_name')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_name }}">
                                @error('doctor_name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Spesialist</label>
                                <input type="text" name="doctor_specialis"
                                    class="form-control @error('doctor_specialis')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_specialis }}">
                                @error('doctor_specialis')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="number" name="doctor_phone"
                                    class="form-control @error('doctor_phone')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_phone }}">
                                @error('doctor_phone')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="doctor_email"
                                    class="form-control @error('doctor_email')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_name }}">
                                @error('doctor_email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="form-label">Photo</label>
                                <input type="file" class="form-control" name="doctor_photo"
                                    @error('doctor_photo') is-invalid @enderror>

                                @error('doctor_photo')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="doctor_address"
                                    class="form-control @error('doctor_address')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_address }}">
                                @error('doctor_address')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>SIP</label>
                                <input type="text" name="doctor_sip"
                                    class="form-control @error('doctor_sip')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->doctor_sip }}">
                                @error('doctor_sip')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>ID IHS</label>
                                <input type="text" name="id_ihs"
                                    class="form-control @error('id_ihs')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->id_ihs }}">
                                @error('id_ihs')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>NIK</label>
                                <input type="text" name="nik"
                                    class="form-control @error('nik')
                                is-invalid
                            @enderror"
                                    value="{{ $doctor->nik }}">
                                @error('nik')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="card-footer text-right">
                            <button class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>

            </div>
        </section>
    </div>
@endsection

@push('scripts')
@endpush
