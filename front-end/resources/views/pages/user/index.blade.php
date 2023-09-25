@extends('base')
@section('content')
    <link href="{{ asset('DataTables/datatables.min.css') }}" rel="stylesheet">

    <script src="{{ asset('DataTables/datatables.min.js') }}"></script>
    <div class="content-page">
        <div class="container-fluid note-details">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-block card-stretch">
                        <div class="card-body custom-notes-space">
                            <h3 class="">Data User</h3>
                            <div class="iq-tab-content">
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="note-content tab-content">
                                    <div id="note1" class="tab-pane fade active show">
                                        <div class="icon active animate__animated animate__fadeIn i-grid">
                                            <div class="row">

                                                <div class="col-lg-12">
                                                    <div class="card card-block card-stretch card-height note-table">
                                                        <div class="card-body custom-notes-space">
                                                            <div class="table-responsive">
                                                                <table id="table"
                                                                    class="table tree mb-0 tbl-server-info">
                                                                    <thead class="bg-white text-uppercase">
                                                                        <tr class="ligth">
                                                                            <th style="color: white !important"
                                                                                class="text-center">Nama</th>
                                                                            <th style="color: white !important"
                                                                                class="text-center">Email</th>
                                                                            <th style="color: white !important"
                                                                                class="text-center">Role</th>
                                                                            {{-- <th style="color: white !important"
                                                                                class="text-center">Action</th> --}}
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        @foreach ($data as $d)
                                                                            <tr data-id="1" data-parent="0"
                                                                                data-level="1">
                                                                                <td>{{ $d['name'] }}</td>
                                                                                <td>{{ $d['email'] }}</td>
                                                                                <td>{{ $d['role']['nama_role'] }}</td>
                                                                                {{-- <td>
                                                                                    <div>
                                                                                        <a href="#"
                                                                                            class="badge badge-success mr-3 edit-note"
                                                                                            data-toggle="modal"
                                                                                            data-target="#edit-note"><i
                                                                                                class="las la-pen mr-0"></i></a>
                                                                                        <a href="#"
                                                                                            class="badge badge-danger"
                                                                                            data-extra-toggle="delete"
                                                                                            data-closest-elem="tr"><i
                                                                                                class="las la-trash-alt mr-0"></i></a>
                                                                                    </div>
                                                                                </td> --}}
                                                                            </tr>
                                                                        @endforeach
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Page end  -->
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>
@endsection
