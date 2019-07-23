@extends('Employees.layout')
@section('content')
    <form method="POST" action="/employees/{{$id}}">
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
                <input name="name" type="text" class="form-control" value="{{$employee -> name}}" required>
            </div>


            <div class="form-group">
                <select name="company_id" class="form-control form-control-sm">

                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach

                </select>

                <button type="submit" class="btn btn-outline-primary , addEmployee">Edit employee</button>
            </div>
        </div>
    </form>

@endsection