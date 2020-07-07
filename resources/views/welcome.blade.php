@extends('layouts.main')

@section('content')

{{-- If results are save, spit this session message out. --}}
@if (session('success_message'))
<p class="note note-secondary mt-4">
    <span class="blue-grey-text">Response: </span>
    {{ session('success_message') }}
</p>
@endif

{{-- Table - List all results from the DB --}}
<div class="table-responsive text-nowrap">
    <table class="table table-sm table-hover mt-3">
        <caption>List of all students</caption>

        <thead class="special-color-dark white-text">
            <tr>
                {{-- <th scope="col">#</th> --}}
                <th scope="col">First Name</th>
                <th scope="col">Last Name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone #</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($studentModel as $studentData)

            @if ( $studentData->id )

            <tr>
                {{-- <th scope="row"> {{ $studentData->id }} </th> --}}
                <td> {{ $studentData->first_name }} </td>
                <td> {{ $studentData->last_name }} </td>
                <td> {{ $studentData->email }} </td>
                <td> {{ $studentData->phone }} </td>
                <td>
                    {{-- Edit --}}
                    <a class="btn-floating btn-raised btn-sm btn-outline-warning"
                        href="{{ route('edit', $studentData->id)}}">
                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                    </a>
                    {{-- Delete --}}

                    <form action="{{ route('delete', $studentData->id) }}" method="post"
                        id="delete-record-{{ $studentData->id }}" style="display: none;">
                        @csrf
                        @method('delete')
                    </form>
                    <a class="btn-floating btn-raised btn-sm btn-outline-danger" onclick="if (confirm('Do you wish to remove {{ $studentData->first_name }} {{ $studentData->last_name }}')) {
                        event.preventDefault();
                        document.querySelector('#delete-record-{{ $studentData->id }}').submit()
                        } else {
                            event.preventDefault();
                        }">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </a>
                </td>
            </tr>
            @else

            <tr>
                <td colspan="6"> No student records. </td>
            </tr>

            @endif

            @endforeach
        </tbody>
    </table>

    {{ $studentModel->links() }}
</div>

@endsection