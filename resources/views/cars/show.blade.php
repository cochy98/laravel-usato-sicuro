@extends('layout.default')
@section('title', 'Show')
@section('content')
    <div class="container py-3">
        <div class="row">
            <div class="col-12">
                <h2>{{  ucFirst($car->brand->name) }} - {{ ucFirst($car->model) }}</h2>
                <div class="show-wrapper">
                    <div class="action-wrapper">
                        <a href="{{ route('cars.edit', $car->id) }}" class="btn btn-success btn-sm"><i class="fa-solid fa-pen"></i></a>
                        <form action="{{ route('cars.destroy', $car->id) }}" method="POST" class="delete-card">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></button>
                        </form>
                    </div>
                    <ul>
                        <li><strong>N. telaio:</strong> {{ $car->numero_telaio }}</li>
                        <li><strong>Porte:</strong> {{ $car->porte }}</li>
                        <li><strong>Data immatricolazione:</strong> {{ $car->data_immatricolazione }}</li>
                        <li><strong>Alimentazione:</strong> {{ $car->alimentazione }}</li>
                        <li><strong>Prezzo:</strong> {{ $car->prezzo }}€</li>
                        <li><strong>Condizioni: </strong>
                            @php
                                if($car->is_new){
                                    echo 'Nuovo';
                                } else{ echo 'Usato'; }
                            @endphp
                        </li>
                        <li>
                            <strong>Colore:</strong>
                            @foreach ($car->colors as $color)
                                <span class="badge rounded-pill" style="background-color: {{ $color->color }}">{{ $color->color }}</span>
                            @endforeach
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
