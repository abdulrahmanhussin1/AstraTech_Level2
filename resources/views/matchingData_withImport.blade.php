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
                                    <th scope="col">Arabic</th>
                                    <th scope="col">MatchingData Id</th>
                                    <th scope="col">MappingData </th>
                                    <th scope="col">MappingData Condition</th>
                                    <th scope="col">MainData </th>
                                    {{-- <th scope="col">MAtching Results</th> --}}
                                    {{-- <th scope="col">Update Match</th> --}}

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($matchedKeywords as $matchedKeyword => $collection)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>{{ $matchedKeyword }}</td>

                                        @foreach ($collection as $result)
                                            <td>{{ $result->id }}</td>
                                            <td>
                                                {{ $result->description }}
                                            </td>
                                            <td>{{ $result->condition }}</td>
                                            <td>{{ optional($result->mainData)->description }}</td>
                                            <td>
                                            </td>
                                        @endforeach

                                    </tr>
                                    <!-- /.modal-content -->
                                @endforeach
                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>
            </div>
            @if ($unmatchedKeywords)
                <div class="card">
                    <div class="card-head">
                        <h5 class="card-title">UnMatching Data Table</h5>
                        <div class="card-body">
                            <!-- Basic Modal -->
                            <!-- Table with stripped rows -->
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">MappingData </th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($unmatchedKeywords as $unmatchedKeyword)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $unmatchedKeyword }}</td>
                                            <td>
                                                <form action="{{ route('storeUnmatched') }}" method="POST">
                                                    @csrf
                                                    <input type="text" name="description"
                                                        value="{{ $unmatchedKeyword }}" hidden>
                                                    <button class="btn btn-success" type="submit">Add To
                                                        MappingData</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <!-- End Table with stripped rows -->
                        </div>
                    </div>
                </div>
            @endif
        </div>

        </section>

    </main><!-- End #main -->
@endsection
