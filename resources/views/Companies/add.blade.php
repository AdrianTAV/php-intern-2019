@extends('Companies.layout')
@section('content')
    <form method="POST" action="/companies/add">

        {{csrf_field()}}

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="container">
            <div class="form-group">
                <label>Name</label>
                <input type="text" name="name" placeholder="Write company names" class="form-control" required>
            </div>

            <div class="form-group">
                <label>Name</label>
                <textarea type="text" name="description" placeholder="Write a company description" class="form-control" required></textarea>
            </div>
                <button type="submit" class="btn btn-outline-primary , addEmployee">Add company</button>
            </div>
        </div>
    </form>

@endsection