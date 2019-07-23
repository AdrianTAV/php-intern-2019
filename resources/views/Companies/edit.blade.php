@extends('Companies.layout')
@section('content')
    <form method="POST" action="/companies/{{$id}}">
        {{ csrf_field() }}

        <input name="_method" type="hidden" value="PUT">

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
                <input type="text" name="name" placeholder="Write company names" class="form-control"
                       value="{{$company -> name}}" required>
            </div>

            <div class="form-group">
                <label>Descriptions</label>
                <textarea type="text" name="description" placeholder="Write a company description" class="form-control"
                          required>{{$company -> description}}</textarea>
            </div>
            <button type="submit" class="btn btn-outline-primary , addEmployee">Edit company</button>
        </div>
        </div>
    </form>

@endsection