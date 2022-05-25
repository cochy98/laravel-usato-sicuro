@extends('layout.default')
@section('title', 'Edit')
@section('content')
    <div class="container">
        <h1 class="text-center py-5">Modifica info auto</h1>
        @if ($errors->any())
            <div class="alert alert-warning">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="wrapper-form">
            <form action="{{ route('cars.update', $car) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="numero_telaio">Numero di telaio</label>
                    <input type="text" name="numero_telaio" id="numero_telaio" value="{{ $car->numero_telaio }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="model">Modello</label>
                    <input type="text" name="model" id="model" value="{{ $car->model }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="porte">Porte</label>
                    <input type="text" name="porte" id="porte" value="{{ $car->porte }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="data_immatricolazione">Immatricolazione</label>
                    <input type="text" name="data_immatricolazione" id="data_immatricolazione" value="{{ $car->data_immatricolazione }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="brand_id">Marca</label>
                    <select name="brand_id" id="brand_id" class="form-select">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alimentazione">Alimentazione</label>
                    <input type="text" name="alimentazione" id="alimentazione" value="{{ $car->alimentazione }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="prezzo">Prezzo</label>
                    <input type="text" name="prezzo" id="prezzo" value="{{ $car->prezzo }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="porte">Colore</label>
                    @foreach ($colors as $color)
                        <input class="form-check-input" type="checkbox" name="color[]" value="{{$color->id}}" {{ $car->colors->contains($color) ? 'checked' : '' }}>
                        <label for="colors" class="badge rounded-pill me-3" style="background-color: {{ $color->color }}">{{ $color->color }}</label>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

@endsection
