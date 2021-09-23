@extends('layouts')
@section('title')
    Index Page
@endsection
@section('content')


    <a href="{{ route('employee.view') }}" class="link-primary">Home</a>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    @if (count($errors) > 0)
        <div class="row">
            <div class="col-md-8 col-md-offset-1">
                <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-ban"></i> Error!</h4>
                    @foreach ($errors->all() as $error)
                        {{ $error }} <br>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <table class="table table-bordered table-responsive-lg table-hover">
        <thead>
            <tr class="table-primary">
                <th scope="col">code</th>
                <th scope="col">name</th>
                <th scope="col">email</th>
                <th scope="col">gender</th>
                <th scope="col">dob</th>
                <th scope="col">address</th>
                <th scope="col">gender</th>
                <th scope="col">phone_number</th>
                <th scope="col">marital_status</th>
                <th scope="col">experience</th>
                <th scope="col">current_salary</th>
                <th scope="col">designations</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee->code }}</td>
                    <td>{{ $employee->name }}</td>
                    <td>{{ $employee->email }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->dob }}</td>
                    <td>{{ $employee->address }}</td>
                    <td>{{ $employee->gender }}</td>
                    <td>{{ $employee->phone_number }}</td>
                    <td>{{ $employee->marital_status }}</td>
                    <td>{{ $employee->experience }}</td>
                    <td>{{ $employee->current_salary }}</td>
                    <td>{{ $employee->designation }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function() {
            $(".alert").fadeTo(2000, 2000).slideUp(2000, function() {
                $(".alert").slideUp(5000);
            });
        });
    </script>
@endsection
