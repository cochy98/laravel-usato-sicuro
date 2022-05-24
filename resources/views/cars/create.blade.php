@extends('layout.default')
@section('title', 'Create')
@section('content')
    <div class="container">
        <h1 class="text-center py-5">Aggiungi auto al catalogo</h1>
        <div class="wrapper-form">
            <form action="{{ route('cars.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="numero_telaio">Numero di telaio</label>
                    <input type="text" name="numero_telaio" id="numero_telaio" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="model">Modello</label>
                    <input type="text" name="model" id="model" class="form-control">

                </div>
                <div class="mb-3">
                    <label for="porte">Porte</label>
                    <input type="text" name="porte" id="porte" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="data_immatricolazione">Immatricolazione</label>
                    <input type="date" name="data_immatricolazione" id="data_immatricolazione" class="form-control">
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
                    <input type="text" name="alimentazione" id="alimentazione" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="prezzo">Prezzo</label>
                    <input type="text" name="prezzo" id="prezzo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
