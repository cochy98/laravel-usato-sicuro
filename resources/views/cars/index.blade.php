@extends('layout.default')

@section('title', 'Index')

@section('content')
    <div class="container">
        <div class="row">
            @if (session('message'))
                <div class="col-12 pt-5">
                    <div class="alert alert-success">
                        {{ session('message') }}
                    </div>
                </div>
            @endif
            <div class="col-12 pt-3">
                <h1>Lista auto</h1>
            </div>
        </div>
        <div class="row gy-4 pb-5">
            @foreach ($cars as $car)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card">
                        <div class="action-wrapper">
                            <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                            <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="delete-card">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                        <div class="card-header">
                            <h4><a href="{{ route('cars.show', $car->id) }}">{{  ucFirst($car->brand->name) }} - {{ ucFirst($car->model) }}</a></h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text"><strong>Alimentazione: </strong>{{ ucFirst($car->alimentazione) }}</p>
                            <p class="card-text"><strong>Numero Porte: </strong>{{ $car->porte }}</p>
                            <p class="card-text"><strong>Prezzo:</strong> {{ $car->prezzo }}€</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
