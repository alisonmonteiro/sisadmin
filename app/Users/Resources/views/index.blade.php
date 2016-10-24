@extends('admin.layout')

@section('title', trans('users::info.name'))
@section('description', trans('users::info.description'))

@section('content')
    <h3>{{ trans('users::info.name') }}</h3>

    @if (isset($users) && count($users) > 0)
        <table class="table table-striped table-hover module-table-index">
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $count => $user)
                <tr>
                    <td>{{ $count + ($users->perPage() * ($users->currentPage()-1)) + 1 }}</td>
                    <td><a href="{{ url('admin/users/' . $user->id . '/edit') }}">{{ $user->name }}</a></td>
                    <td><a href="{{ url('admin/users/' . $user->id . '/edit') }}">{{ $user->email }}</a></td>
                    <td nowrap>
                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="module-action">Editar</a>&nbsp;
                        <a href="#" class="module-action">Excluir</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <p>Nenhum item encontrado.</p>
        </div>
    @endif
@endsection
