@extends('students.layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Laravel 10 CRUD Example from scratch</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Product</a>
        </div>
    </div>
</div>


@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Email</th>
        <th>Mobile</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($students as $product)
    <tr>
        <td>{{ $product->id }}</td>
        <td>{{ $product->name }}</td>
        <td>{{ $product->email }}</td>
        <td>{{ $product->mobile }}</td>
        <td>
            <form action="{{ route('students.destroy',$product->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('students.show',$product->id) }}">Show</a>

                <a class="btn btn-primary" href="{{ route('students.edit',$product->id) }}">Edit</a>

                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>

{{-- {!! $students->links() !!} --}}

@endsection
