@extends('Companies.layout')
@section('content')


    <div class='container-fluid'>
        <div class='row'>
            <div class="col-xs-12 col-sm-12 col-md-12 table">
                <table class="table table-dark" style="width: 100%">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Actions</th>

                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>{{$company['name']}}</td>
                            <td>{{$company['description']}}</td>

                            <td>
                                <div class="btn-toolbar">
                                    <form method="POST" action="/companies/{{$company->id}}">
                                        {{ csrf_field() }}
                                        <input name="_method" type="hidden" value="DELETE">
                                        <button type="submit" class="btn btn-primary">delete</button>
                                    </form>
                                    <a href="/companies/edit/{{$company->id}}" class="btn btn-primary , editButton" >edit</a>
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
