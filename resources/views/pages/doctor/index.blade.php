@extends('layouts.app')

@section('title', 'Doctors')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Doctor</h1>
                <div class="section-header-button">
                    <a href="{{ route('doctors.create') }}" class="btn btn-primary">Add New</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Doctor</a></div>
                    <div class="breadcrumb-item">All Doctor</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Doctor</h2>
                <p class="section-lead">
                    You can manage all doctors, such as editing, deleting and more.
                </p>


                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>All Posts</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Action For Selected</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Delete Pemanently</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('doctors.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <tr>
                                            <th>Name</th>
                                            <th>Specialist</th>
                                            <th>Phone</th>
                                            <th>Email</th>
                                            {{-- <th>Photo</th> --}}
                                            {{-- <th>Address</th> --}}
                                            <th>SIP</th>
                                            {{-- <th>Create</th> --}}
                                            <th>Action</th>
                                        </tr>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $doctor->doctor_name }}</td>
                                                <td>{{ $doctor->doctor_specialis }}</td>
                                                <td>{{ $doctor->doctor_phone }}</td>
                                                <td>{{ $doctor->doctor_email }}</td>
                                                {{-- <td>{{ $doctor->doctor_photo }}</td> --}}
                                                {{-- <td>{{ $doctor->doctor_address }}</td> --}}
                                                <td>{{ $doctor->doctor_sip }}</td>
                                                {{-- <td>{{ $doctor->created_at }}</td> --}}
                                                <td>
                                                    <div class="d-flex justify-content-center">
                                                        <a href='{{ route('doctors.edit', $doctor->id) }}'
                                                            class="btn btn-sm btn-info btn-icon">
                                                            <i class="fas fa-edit"></i>
                                                            Edit
                                                        </a>
                                                        <form action="{{ route('doctors.destroy', $doctor->id) }}"
                                                            method="POST" class="ml-2">
                                                            <input type="hidden" name="_method" value="DELETE" />
                                                            <input type="hidden" name="_token"
                                                                value="{{ csrf_token() }}" />
                                                            <!-- Button trigger modal -->
                                                            <button class="btn btn-sm btn-danger btn-icon confirm-delete"
                                                                data-bs-toggle="modal" data-bs-target="#modal">
                                                                <i class="fas fa-times"></i> Delete
                                                            </button>

                                                            <!-- Modal -->
                                                            {{-- <div class="modal fade" id="modal" tabindex="-1"
                                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h1 class="modal-title fs-5"
                                                                                id="exampleModalLabel">Modal title</h1>
                                                                            <button type="button" class="btn-close"
                                                                                data-bs-dismiss="modal"
                                                                                aria-label="Close"></button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            ...
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" class="btn btn-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                            <button type="button"
                                                                                class="btn btn-primary">Save
                                                                                changes</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div> --}}
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </table>
                                </div>

                                <div class="float-right" style="">
                                    {{ $doctors->withQueryString()->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraies -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
