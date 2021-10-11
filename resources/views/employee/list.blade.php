@extends('layouts')
@section('title')
    List Page
@endsection
@section('content')

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
                <th scope="col">CODE</th>
                <th scope="col">NAME</th>
                <th scope="col">Email</th>
                <th scope="col">Gender</th>
                <th scope="col">DOB</th>
                <th scope="col">Address</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Marital Status</th>
                <th scope="col">Experience</th>
                <th scope="col">Current Salary</th>
                <th scope="col">Designation</th>
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
