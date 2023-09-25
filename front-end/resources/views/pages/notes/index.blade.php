@extends('base')
@section('content')
    <div class="content-page">
        <div class="container-fluid note-details">
            <div class="desktop-header">
                <div class="card card-block topnav-left">
                    <div class="card-body write-card">
                        <div class="d-flex align-items-center justify-content-between">
                            <div class="iq-note-callapse-menu">
                                <a href="{{ route('add-note') }}" class="iq-note-callapse-btn show-note-button"
                                    aria-expanded="false">
                                    <i class="las la-pencil-alt pr-2"></i>Write Your Note
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-block card-stretch">
                        <div class="card-body custom-notes-space">
                            <h3 class="">Your Notes</h3>
                            <div class="iq-tab-content">
                                <div class="col-12">
                                    <hr>
                                </div>
                                <div class="note-content tab-content">
                                    <div id="note1" class="tab-pane fade active show">
                                        <div class="icon active animate__animated animate__fadeIn i-grid">
                                            <div class="row">
                                                @if (Session::has('success'))
                                                    <div class="col-lg-12">
                                                        <div class="alert  bg-primary" role="alert">
                                                            <div class="iq-alert-icon">
                                                                <i class="ri-alert-line"></i>
                                                            </div>
                                                            <div class="iq-alert-text">{{ Session::get('success') }}
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <i class="ri-close-line"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endif
                                                @foreach ($data as $d)
                                                    <div class="col-lg-4 col-md-6">
                                                        <div
                                                            class="card card-block card-stretch card-height card-bottom-border-danger note-detail">
                                                            <div class="card-header d-flex justify-content-between pb-1">
                                                                <div class="icon iq-icon-box-2 icon-border-danger rounded">
                                                                    <svg width="23" height="23" class="svg-icon"
                                                                        id="iq-main-04" xmlns="http://www.w3.org/2000/svg"
                                                                        fill="none" viewBox="0 0 24 24"
                                                                        stroke="currentColor">
                                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                                            stroke-width="2"
                                                                            d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                                                    </svg>
                                                                </div>
                                                                <div class="card-header-toolbar d-flex align-items-center">

                                                                    <div
                                                                        class="card-header-toolbar d-flex align-items-center">
                                                                        <div class="dropdown">
                                                                            <span class="dropdown-toggle dropdown-bg"
                                                                                id="note-dropdownMenuButton7"
                                                                                data-toggle="dropdown" aria-expanded="false"
                                                                                role="button">
                                                                                <i class="ri-more-fill"></i>
                                                                            </span>
                                                                            <div class="dropdown-menu dropdown-menu-right"
                                                                                aria-labelledby="note-dropdownMenuButton7"
                                                                                style="">
                                                                                <a href="{{ route('show-note', ['id' => $d['id']]) }}"
                                                                                    class="dropdown-item edit-note1"><i
                                                                                        class="las la-pen mr-3"></i>Edit</a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="card-body rounded">
                                                                <h4 class="card-title">{{ $d['judul_notes'] }}</h4>
                                                                <hr>
                                                                <p>{{ $d['isi_notes'] }}
                                                                </p>

                                                            </div>
                                                            <div class="card-footer">
                                                                <div
                                                                    class="d-flex align-items-center justify-content-between note-text note-text-danger">
                                                                    <a href="#" class=""><i
                                                                            class="las la-user mr-2 font-size-20"></i>
                                                                        {{ $d['user']['email'] }}</a>
                                                                    <a href="#" class=""><i
                                                                            class="las la-calendar mr-2 font-size-20"></i>
                                                                        {{ \Carbon\Carbon::parse($d['created_at'])->translatedFormat('d F Y') }}</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach

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
@endsection
