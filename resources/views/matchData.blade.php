@extends('layouts.app')
@section('title')
    Match Page
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Match Page </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Dashboard</li>
                    <li class="breadcrumb-item active">Match</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        @include('layouts.alerts')


        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#matchData">
            Match Data
        </button>
        <div class="modal fade" id="matchData" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Match Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('showData') }}" method="POST">
                        @csrf
                        <div class="modal-body">
                            <div class="mb-3">
                                <label for="" class="form-label">Keyword</label>
                                <input type="text" class="form-control" name="keyword" placeholder="Enter Your Keyword">
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-success">Confirm</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        </div>




        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importMatchData">
            Import To Match Data
        </button>


        <div class="modal fade" id="importMatchData" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Match Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('ReadExcelSheet') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row mb-3">
                                <div class="">
                                    <input class="form-control" name="excel_file" type="file" id="formFile" required>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-15">
                                    <button type="submit" class="btn btn-success">Import</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main><!-- End #main -->
@endsection
