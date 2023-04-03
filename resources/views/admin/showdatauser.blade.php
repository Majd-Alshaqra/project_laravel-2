@extends('parent')
@section('cont')
    <div class="card-body table-responsive p-0 container">
        <table class="table text-nowrap table-striped">
            <thead class="bg-info">
                <tr>
                    <th>img</th>
                    <th>title</th>
                    <th>message</th>
                    <th>Your_student_number</th>
                    <th>name_student</th>
                    <th>email</th>
                    <th>type</th>
                    <th>urgent</th>
                    <th>status</th>
                    <th>response</th>
                    <th>closed_date</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $item)
                    <tr>
                        <td><img class="img-circle img-bordered-sm" height="65" width="65"
                                src="{{ Storage::url($item->image) }}" alt="img error"></td>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->message }}</td>
                        <td>{{ $item->Your_student_number }}</td>
                        <td>{{ $item->name_student }}</td>
                        <td> {{ $item->email }}</td>
                        <td> {{ $item->type }}</td>
                        @if ($item->urgent == 0)
                            <td> Normal</td>
                        @else
                            <td style="color:red"> urgent</td>
                        @endif
                        <td>{{ $item->status }}</td>
                        @if ($item->response == '')
                            <td>
                                <div>
                                    <form action="{{ route('add_response', $item->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <textarea name="response" id="" cols="30" rows="1"></textarea>
                                        <button style="margin-top:-30px;" type="submit"
                                            class="btn btn-info">submit</button>
                                    </form>
                                </div>
                            </td>
                        @else
                            <td>
                                {{ $item->response }}

                            </td>
                        @endif

                        {{-- {{ $item->response }} --}}
                        @if ($item->closed_date == '' && $item->response != '')
                            {
                            <form action="{{ route('Adit_status', $item->id) }}" method="post">
                                @csrf
                                @method('PUT')
                                <td class="text-center"><button class="btn btn-info "> status change </button> {{ $item->closed_date }}</td>
                            </form>
                            }
                        @else
                                <td>
                                    Sent or no response was sent
                                </td>
                             
                        @endif


                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>
@endsection
