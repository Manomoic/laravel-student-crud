@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 col-sm-12">
        <div class="card shadow-lg mt-5 mx-auto" style="width: 30rem;">
            <div class="card-body">

                @if ($errors->any())

                @endif
                <h5 class="card-title lead h5 text-muted text-center"> Add Student </h5>

                <form action="{{ route('store') }}" method="post">
                    {{-- {{ csrf_field() }} --}}
                    @csrf

                    <div class="form-row mb-2">
                        <div class="col">
                            <label class="small mb-1" for="firstnme">First Name *</label>
                            <input type="text" name="firstname"
                                class="form-control @error('firstname') is-invalid @enderror"
                                value="{{ old('firstname') }}" />
                            @error('firstname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror

                        </div>
                        <div class="col">
                            <label class="small mb-1" for="lastname">Last Name *</label>
                            <input type="text" name="lastname"
                                class="form-control @error('lastname') is-invalid @enderror"
                                value="{{ old('lastname') }}" />
                            @error('lastname')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <label class="small mb-1" for="email">Email *</label>
                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                                autocomplete="off" value="{{ old('email') }}" />
                            @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <label class="small mb-1" for="phone">Contacts *</label>
                            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror"
                                value="{{ old('phone') }}" />
                            @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <button class="btn btn-outline-dark my-4 btn-block" type="submit">Save</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection