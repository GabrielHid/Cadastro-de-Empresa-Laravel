@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5 ">
            <form method="POST" action="{{ route('registerCompany') }}">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="social-name">Razão Social</label>
                    <input type="text" class="form-control" name="social-name" required>
                </div>
                <div class="formgroup">
                    <label for="fantasy-name">Nome Fantasia</label>
                    <input type="text" class="form-control" name="fantasy-name" id="fantasy-name" required>
                </div>
                <div class="form-group">
                    <label for="cnpj" >CNPJ</label>
                    <input type="text" class="form-control" name="cnpj" id="cnpj" maxlength="12" required>
                </div>
                <div class="col-xs-12 text-right">
                    <button type="submit" class="btn btn-primary">
                       Cadastrar Empresa
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
