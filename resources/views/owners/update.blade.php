
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Automobilių sąvininkai</div>

                        <div class="card-body">

                            <form method="post" action="{{ route("owners.save",$owner->id) }}">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Vardas</label>
                                    <input class="form-control" type="text" name="name" value="{{ $owner->name }}">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Pavardė</label>
                                    <input class="form-control" type="text" name="surname" value="{{ $owner->surname }}">
                                </div>
                                <button class="btn btn-success">Išsaugoti pakeitimus</button>
                            </form>
                        </div>
                    </div>

                    <div class="card mt-3">
                        <div class="card-header"><b>{{ $owner->name }} {{ $owner->surname }}</b> priklausantys automobiliai</div>
                        <div class="card-body">
                            <table class="table">
                                @foreach($owner->cars as $car)
                                    <tr>
                                        <td>
                                            <b>{{ $car->brand }} {{ $car->model }}</b>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
