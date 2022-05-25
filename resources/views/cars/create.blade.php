@extends('layout.default')
@section('title', 'Create')
@section('content')
    <div class="container">
        <h1 class="text-center py-5">Aggiungi auto al catalogo</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="wrapper-form">
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="numero_telaio">Numero di telaio</label>
                    <input type="text" name="numero_telaio" id="numero_telaio" class="form-control" value="{{ old('numero_telaio') }}">
                </div>
                <div class="mb-3">
                    <label for="model">Modello</label>
                    <input type="text" name="model" id="model" class="form-control" value="{{ old('model') }}">

                </div>
                <div class="mb-3">
                    <label for="porte">Porte</label>
                    <input type="text" name="porte" id="porte" class="form-control" value="{{ old('porte') }}">
                </div>
                <div class="mb-3">
                    <label for="data_immatricolazione">Immatricolazione</label>
                    <input type="date" name="data_immatricolazione" id="data_immatricolazione" class="form-control" value="{{ old('data_immatricolazione') }}">
                </div>
                <div class="mb-3">
                    <label for="brand_id">Marca</label>
                    <select name="brand_id" id="brand_id" class="form-select">
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}" {{(old('brand_id') == $brand->id) ? 'selected' : ''}}>{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3">
                    <label for="alimentazione">Alimentazione</label>
                    <input type="text" name="alimentazione" id="alimentazione" class="form-control" value="{{ old('alimentazione') }}">
                </div>
                <div class="mb-3">
                    <label for="prezzo">Prezzo</label>
                    <input type="text" name="prezzo" id="prezzo" class="form-control" value="{{ old('prezzo') }}">
                </div>
                <div class="mb-3">
                    <label for="porte">Colore</label>
                    <div>
                        @foreach ($colors as $color)
                            {{-- <input class="form-check-input" type="checkbox" name="color[]" value="{{$color->id}}"
                            {{(old('color[]') == $color->id) ? 'checked' : ''}}> --}}
                            <input class="form-check-input" type="checkbox" name="color[]" value="{{old('color[]') ?? $color->id}}">
                            <label for="colors" class="badge rounded-pill me-3" style="background-color: {{ $color->color }}">{{ $color->color }}</label>
                        @endforeach
                    </div>
                    @dump(old('color'))
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
