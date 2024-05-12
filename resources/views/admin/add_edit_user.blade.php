@extends('layouts.content')
@section('main-content')
<div class="container">
    @include('components.admin-navbar')
    <div class="col-md-12">
        <div class="form-appl">
            <h5 class="my-4 text-center">{{ $title }}</h5>
            <form class="form1 shadow-md mb-4" method="post" action="@if (isset($edit->id)) {{ route('user.update', ['id' => $edit->id]) }}@else{{ route('user.store') }} @endif" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12 mb-3">
                    <label for="" class="mb-2">Nombre</label>
                    <input class="form-control" type="text" name="name" id="name" placeholder="Ingresa el nombre" value="@if (isset($edit->id)) {{ $edit->name }}@else {{ old('name') }} @endif">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-12 mb-3">
                    <label for="" class="mb-2">Email</label>
                    <input class="form-control" type="text" name="email" placeholder="Ingresa el correo electrónico" value="@if (isset($edit->id)) {{ $edit->email }}@else {{ old('email') }} @endif">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-12 mb-3">
                    <label for="" class="mb-2">Puesto laboral</label>
                    <input class="form-control" type="text" name="position" placeholder="Ingresa la posisión laboral" value="@if (isset($edit->id)) {{ $edit->position }}@else {{ old('position') }} @endif">
                    @error('position')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-12 mb-3">
                    <label for="" class="mb-2">Salario</label>
                    <input class="form-control" type="text" name="salary" placeholder="Ingresa el salario" value="@if (isset($edit->id)) {{ $edit->salary }}@else {{ old('salary') }} @endif">
                    @error('salary')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group col-md-12 mb-5">
                    <label for="" class="mb-2">Foto de perfil</label>
                    <div class="avatar-upload">
                        <div class="">
                            <input class="form-control lol" type='file' id="imageUpload" name="photo" accept=".png, .jpg, .jpeg" onchange="previewImage(this)" />
                            <!-- <label for="imageUpload"></label> -->
                        </div>
                        <div class="avatar-preview">
                            <div id="imagePreview" style="@if (isset($edit->id) && $edit->photo != '') background-image:url('{{ url('/') }}/uploads/{{ $edit->photo }}')@else background-image: url('{{ url('/img/avatar.jpg') }}') @endif"></div>
                        </div>
                    </div>
                    @error('photo')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="d-flex w-full justify-content-end gap-2">
                    <a class="btn btn-danger" href="{{ route('dashboard') }}">Cancelar</a>
                    <input type="submit" class="btn btn-primary" value="Enviar">
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
@push('js')
<script type="text/javascript">
    function previewImage(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $("#imagePreview").css('background-image', 'url(' + e.target.result + ')');
                $("#imagePreview").hide();
                $("#imagePreview").fadeIn(700);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
<style>
    .avatar-upload {
        position: relative;
        max-width: 205px;
    }
 
    .avatar-upload .avatar-preview {
        width: 67%;
        height: 147px;
        position: relative;
        border-radius: 3%;
        margin: 1rem 0rem 1rem 0rem;
    }
 
    .avatar-upload .avatar-preview>div {
        width: 100%;
        height: 100%;
        border-radius: 3%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    .form1 {
        width: 60%;
        margin: 0 auto 0 auto;
        display: flex;
        flex-direction: column;
        gap: 1rem;
        padding: 1.5rem;
        border-radius: 20px;
        border: 1px solid #EEEEEE;
        background-color: #F8F8F8;
    }
    #imageUpload {
        width: 23rem !important;
    }
</style>