@extends('layouts.content')
@section('main-content')
<div class="container">
    @include('components.admin-navbar')
    <div class="container d-flex justify-content-between my-3">
        <h5 >Usuarios registrados</h5>
        <a href="{{ route('user.create') }}" class="btn btn-primary">Añadir nuevo usuario</a>
    </div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif
    <div class="table-responsive">
        <table class="table table-hover">
            <thead class="table-primary">
                <th>#</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Posición</th>
                <th>Salario</th>
                <th>Foto</th>
                <th>Acciones</th>
            </thead>
            <tbody>
                @forelse($users as $index => $row)
                <tr>
                <td>{{ $index + 1 }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->position }}</td>
                    <td>{{ $row->salary }}</td>
                    <td>
                        <div class="showPhoto">
                            <div id="imagePreview" style="@if ($row->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $row->photo }}')@else background-image: url('{{ url('/img/avatar.jpg') }}') @endif;">
                            </div>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('user.edit', ['id' =>$row->id]) }}" class="btn btn-primary">Editar</a>
                        <button class="btn btn-danger"  onClick="deleteFunction('{{ $row->id }}')">Eliminar</button>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No hay usuarios registrados</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@include ('admin.modal_delete')
@endsection
@push('js')
<script>
    function deleteFunction(id) {
        document.getElementById('delete_id').value = id;
        $("#modalDelete").modal('show');
    }
</script>
@endpush
<style>
    .showPhoto {
        width: 3rem;
        height: 3rem;
    }
 
    .showPhoto>div {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
</style>
