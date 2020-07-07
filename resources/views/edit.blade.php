@extends('layouts.main')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12 col-sm-12">
        <div class="card shadow-lg mt-5 mx-auto" style="width: 30rem;">
            <div class="card-body">
                <h5 class="card-title lead h5 text-muted text-center"> Edit Student Results</h5>

                <form action="{{ route('update', $studentModel->id) }}" method="post">

                    @csrf

                    <div class="form-row mb-2">
                        <div class="col">
                            <label class="small mb-1" for="firstnme">First Name *</label>
                            <input type="text" name="firstname" class="form-control"
                                value="{{ $studentModel->first_name }}" />
                        </div>
                        <div class="col">
                            <label class="small mb-1" for="lastname">Last Name *</label>
                            <input type="text" name="lastname" class="form-control"
                                value="{{ $studentModel->last_name }}" />
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <label class="small mb-1" for="email">Email *</label>
                            <input type="email" name="email" class="form-control" autocomplete="off"
                                value="{{ $studentModel->email }}" />
                        </div>
                    </div>

                    <div class="form-row mb-2">
                        <div class="col">
                            <label class="small mb-1" for="phone">Contacts *</label>
                            <input type="text" name="phone" class="form-control" value="{{ $studentModel->phone }}" />
                        </div>
                    </div>

                    <button class="btn btn-outline-dark my-4 btn-block" type="submit">Update</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection