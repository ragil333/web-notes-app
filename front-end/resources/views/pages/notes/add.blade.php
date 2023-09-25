@extends('base')
@section('content')
    <div class="content-page">
        <div class="container-fluid note-details">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card card-block card-stretch">
                        <div class="card-body custom-notes-space">
                            <h3 class="">Write Your Notes</h3>
                            <div class="iq-tab-content">
                                <hr>
                                <br>
                                <br>
                                <div class="note-content tab-content">
                                    <form action="{{ route('post-note') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            @if ($errors->any())
                                                @foreach ($errors->all() as $err)
                                                    <div class="col-lg-12">
                                                        <div class="alert  bg-warning" role="alert">
                                                            <div class="iq-alert-icon">
                                                                <i class="ri-alert-line"></i>
                                                            </div>
                                                            <div class="iq-alert-text">{{ $err }}
                                                            </div>
                                                            <button type="button" class="close" data-dismiss="alert"
                                                                aria-label="Close">
                                                                <i class="ri-close-line"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
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
                                            <div class="col-lg-12">
                                                <div class=" form-group">
                                                    <label>Judul Note</label>
                                                    <input class="form-control" name="judul_notes" required type="text"
                                                        placeholder=" ">

                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class=" form-group">
                                                    <label>Isi Note</label>
                                                    <textarea class="form-control" name="isi_notes" id="" rows="10"></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <button type="submit" class="btn btn-primary w-100">SAVE</button>
                                    </form>
                                    <br>
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
