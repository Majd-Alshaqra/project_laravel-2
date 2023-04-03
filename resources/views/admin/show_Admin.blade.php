@extends('parent')
@section('cont')
    <div class="card-body table-responsive p-0 container">
        {{-- <table class="table table-hover text-nowrap table-bordered"> --}}
            <table class="table table-hover text-nowrap table-striped">
            <thead class="bg-info">
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>email</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td>{{ $loop->index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td><a href="{{ route('edit', $item->id) }}" class="btn btn-outline-info">edit</a></td>

                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
