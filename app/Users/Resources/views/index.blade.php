@extends('admin.layout')

@section('title', trans('users::info.name'))
@section('description', trans('users::info.description'))

@section('content')
    @include('users::nav')

    @if (isset($users) && count($users) > 0)
        <table class="table table-striped table-hover module-table-index">
            <thead>
                <tr>
                    <th width="30">#</th>
                    <th>{{ trans('users::info.fields.name') }}</th>
                    <th>{{ trans('users::info.fields.email') }}</th>
                    <th width="100"></th>
                </tr>
            </thead>
            <tbody>
            @foreach($users as $count => $user)
                <tr>
                    <td>{{ $count + ($users->perPage() * ($users->currentPage()-1)) + 1 }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td nowrap>
                        <a href="{{ url('admin/users/' . $user->id . '/edit') }}" class="module-action">
                            {{ trans('users::info.actions.edit') }}
                        </a>&nbsp;
                        <a href="#" class="module-action">{{ trans('users::info.actions.delete') }}</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div class="alert alert-warning">
            <p>{{ trans('users::info.messages.no_items') }}</p>
        </div>
    @endif
@endsection
