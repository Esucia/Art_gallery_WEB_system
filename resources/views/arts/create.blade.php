
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="row justify-content-center my-5">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Gallery/div>

                            <div class="card-body">

                                <form method="post" action="{{ route("cars.store") }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">Art</label>
                                        <input class="form-control" type="text" name="reg_number">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Style</label>
                                        <input class="form-control" type="text" name="brand">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Cost</label>
                                        <input class="form-control" type="text" name="model">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Creator</label>
                                        <input class="form-control" type="text" name="model">
                                        <select class="form-select" name="owner_id">
                                            @foreach($owners as $owner)
                                                <option value="{{ $owner->id }}">{{ $owner->name }} {{ $owner->surname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <button class="btn btn-success">Add</button>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection

