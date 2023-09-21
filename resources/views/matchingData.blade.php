@extends('layouts.app')
@section('title')
    Matching Data Page
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Matching Data Page </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    <li class="breadcrumb-item">Data</li>
                    <li class="breadcrumb-item active">Matching Data</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->
        @include('layouts.alerts')
        <div class="row">
            <div class="card">

                <div class="card-head">
                    <h5 class="card-title">Matching Data Table</h5>

                    <div class="card-body">

                        <!-- Basic Modal -->

                        <!-- Table with stripped rows -->
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">MatchingData Id</th>
                                    <th scope="col">Arabic</th>
                                    <th scope="col">MappingData </th>
                                    <th scope="col">MappingData Condition</th>
                                    <th scope="col">MainData </th>
                                    {{-- <th scope="col">MAtching Results</th>
                                    <th scope="col">Update Match</th> --}}

                                </tr>
                            </thead>
                            <tbody>

                                @if ($results->isEmpty())
                                    <tr>
                                        <td colspan="8">
                                            <div class="text-center">
                                                NO DATA FOUND !! its New Keyword .
                                                <form action="{{ route('storeMappingData') }}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="description" value="{{ $keyword }}">
                                                    <button type="submit" class="btn btn-success">Store it ?</button>
                                                </form>
                                            </div>

                                        </td>
                                    </tr>
                                @else

                                    @foreach ($results as $result)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $result->id }}</td>
                                            <td>{{ $keyword }}</td>
                                            <td>{{ $result->description }}</td>
                                            <td>{{ $result->condition }}</td>
                                            <td>{{ optional($result->mainData)->description }}</td>
                                        </tr>
                                        <!-- /.modal-content -->
                                    @endforeach
                                @endif
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>

            </section>

    </main><!-- End #main -->
@endsection

