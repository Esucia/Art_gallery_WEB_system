

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Automobiliai/div>

                            <div class="card-body">

                                <form method="post" action="{{ route("cars.update", $car->id) }}">
                                    @csrf
                                    @method("put")
                                    <div class="mb-3">
                                        <label class="form-label">Creator</label>
                                        <input class="form-control" type="text" name="reg_number" value="{{ $car->reg_number }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Style</label>
                                        <input class="form-control" type="text" name="brand" value="{{ $car->brand }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cost</label>
                                        <input class="form-control" type="text" name="model" value="{{ $car->model }}">
                                    </div>
                                    <div class="mb-3">
                                        <select class="form-select" name="owner_id">
                                            @foreach($owners as $owner)
                                                <option value="{{ $owner->id }}" {{ ($owner->id==$car->owner_id)?'selected':'' }}>{{ $owner->name }} {{ $owner->surname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-success">Save</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
