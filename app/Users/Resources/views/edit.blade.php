@extends('admin.layout')

@section('title', trans('users::info.name'))
@section('description', trans('users::info.description'))

@section('content')
    @include('users::nav')

    <form action="{{ url('admin/users/' . $user->id) }}" method="POST" class="form-base">
        {!! csrf_field() !!}
        <input type="hidden" name="_method" value="PUT">

        <div class="col-xs-6">
            <div class="form-group">
                <label class="checkbox">Situação</label>

                <div class="radio">
                    <label><input type="radio" name="status" value="1" {{ $user->status == 1 ? 'checked' : '' }}>Ativo</label>
                </div>
                <div class="radio">
                    <label><input type="radio" name="status" value="0" {{ $user->status == 0 ? 'checked' : '' }}>Inativo</label>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <br/>

        <div class="col-xs-6">
            <div class="form-group">
                <label for="name">Nome</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control" required>
            </div>
        </div>
        <div class="col-xs-6">
            <div class="form-group">
                <label for="email">E-mail</label>
                <input type="email" name="email" id="email" value="{{ $user->email }}" class="form-control" required>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="col-xs-12">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="update_password" value="1" onclick="setVisibility(this.checked, 'users__password');">Atualizar senha
                    </label>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div id="users__password" hidden>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
            </div>
            <div class="col-xs-6">
                <div class="form-group">
                    <label for="password_confirmation">Confirmação de senha</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <br/>

        <div class="col-xs-6">
            <div class="form-group">
                <label class="checkbox">Tipo de usuário</label>

                <div class="radio">
                    <label>
                        <input type="radio" name="role" value="1" {{ $user->role == 1 ? 'checked' : '' }} onchange="setVisibility(false, 'users__modules')">Administrador
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="role" value="2" {{ $user->role == 2 ? 'checked' : '' }} onchange="setVisibility(true, 'users__modules')">Usuário
                    </label>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>

        <div class="col-xs-6">
            <div class="form-group">
                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="set_expires" onclick="Users.setExpires(this);" {{ $user->expires != null ? 'checked' : '' }}>Adicionar validade
                    </label>
                </div>
                <input type="date" name="expires" class="form-control" id="expires" value="{{ $user->expires != null ? \Carbon\Carbon::parse($user->expires)->toDateString() : '' }}" {{ $user->expires == null ? 'style=display:none;' : '' }}>
            </div>
        </div>

        <div class="clearfix"></div>
        <br/>

        <div class="col-xs-12">
            <input class="btn btn-primary" type="submit" value="Salvar"/>
            <br/><br/>
        </div>
    </form>
@endsection
