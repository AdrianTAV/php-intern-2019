@extends('Employees.layout')
@section('content')

    <div class='container-fluid'>
        <div class='row'>
            <div class="col-xs-12 col-sm-12 col-md-12 table">
                <table class="table table-dark" style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Company</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($employees as $employee)
                        <tr>
                            <td>{{$employee['name']}}</td>
                            <td>{{$employee['company_name']}}</td>

                            <td>
                                <div class="btn-toolbar">
                                    <form method="POST" action="/employees/{{$employee->id}}">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-primary">delete</button>
                                    </form>
                                    <a href="/employees/edit/{{$employee->id}}" class="btn btn-primary , editButton" >edit</a>
                                </div>
                            </td>
                        </tr>

                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
