
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Automobilių sąvininkai</div>

                        <div class="card-body">
                            <div class="clearfix">
                                <a href="{{ route("owners.create") }}" class="btn btn-success float-end">Sukurti naują sąvininką</a>
                            </div>
                            <hr>
                            <form method="post" action="{{ route('owners.search') }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Vardas</label>
                                    <input class="form-control" type="text" value="{{ $name }}" name="name">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pavardė</label>
                                    <input class="form-control" type="text" value="{{ $surname }}" name="surname">
                                </div>
                                <button class="btn btn-info">Ieškoti</button>
                            </form>
                            <form class="mt-2" method="post" action="{{ route("owners.forget") }}">
                                @csrf
                                <button class="btn btn-info">Išvalyti paiešką</button>
                            </form>
                            <hr>

                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Vardas</th>
                                    <th>Pavardė</th>
                                    <th>Automobiliai</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($owners as $owner)
                                    <tr>
                                        <td>{{ $owner->name }}</td>
                                        <td>{{ $owner->surname }}</td>
                                        <td>
                                            @if (Auth::user()!==null)
                                                @foreach($owner->cars as $car)
                                                    {{ $car->brand }} {{ $car->model }} <br>
                                                @endforeach
                                            @else
                                                <i>Rodoma tik prisijungus</i>
                                            @endif
                                        </td>
                                        @if (Auth::user()!==null && Auth::user()->type=='admin')
                                            <td>
                                                <a href="{{ route("owners.update", $owner->id) }}" class="btn btn-success">Redaguoti</a>
                                            </td>
                                            <td>
                                                @if ($owner->cars->count()==0)
                                                    <a href="{{ route("owners.delete", $owner->id) }}" class="btn btn-danger">Ištrinti</a>
                                                @endif
                                            </td>
                                        @else
                                            <td><i>tik admin vartotojams</i></td>
                                            <td><i>tik admin vartotojams</i></td>
                                        @endif

                                    </tr>
                                @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="mt-3">
                        Komentarai:
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
