@extends('admin.layout')

@section('title', trans('users::info.name'))
@section('description', trans('users::info.description'))

@section('content')
    @include('users::nav')

    <form action="{{ url('admin/users') }}" method="POST" class="form-base row">
        {{--{!! csrf_field() !!}--}}

        <div class="col-xs-3">
            <div class="form-group">
                <label class="checkbox">Situação</label>

                <div class="radio">
                    <label><input type="radio" name="status" value="1" {{ is_null(old('status')) || old('status') == 1 ? 'checked' : '' }}>Ativo</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="status" value="0" {{ !is_null(old('status')) && old('status') == 0 ? 'checked' : '' }}>Inativo</label>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <br/>

        <div class="col-xs-6">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control" required>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control" required>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-6">
            <div class="form-group">
                <label for="password">Senha</label>
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="password_confirmation">Confirmação de senha</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
        </div>

        <div class="clearfix"></div>
        <br/>

        <div class="col-xs-6">
            <div class="form-group">
                <label class="checkbox">Tipo de usuário</label>

                <div class="radio">
                    <label>
                        <input type="radio" name="role" value="1" {{ is_null(old('role')) || old('role') == 1 ? 'checked' : '' }} onchange="setVisibility(false, 'users__modules')">Administrador
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="role" value="2" {{ !is_null(old('role')) && old('role') == 2 ? 'checked' : '' }} onclick="setVisibility(true, 'users__modules')">Usuário
                    </label>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="set_expires" onclick="Users.setExpires(this);" {{ old('expires') != '' ? 'checked' : '' }}>Adicionar validade
                    </label>
                </div>
                <input type="date" name="expires" value="{{ old('expires') }}" class="form-control" id="expires" {!! old('expires') == null ? 'style="display:none;"' : '' !!}>
            </div>
        </div>

        <div class="clearfix"></div>
        <br/>

        <div class="col-xs-12">
            <input class="btn btn-primary" type="submit" value="Salvar">
            <br/><br/>
        </div>
    </form>
@endsection
