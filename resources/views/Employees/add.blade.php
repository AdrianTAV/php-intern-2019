@extends('Employees.layout')
@section('content')
    <form method="POST" action="/employees/add">

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
                <input type="text" name="name" placeholder="write your name" class="form-control" required>
            </div>

            <div class="form-group">
                <select name="company_id" class="form-control form-control-sm">
                    @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                    @endforeach

                </select>
                <button type="submit" class="btn btn-outline-primary , addEmployee">Add employee</button>
            </div>
        </div>
    </form>

@endsection