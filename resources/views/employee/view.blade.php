@extends('layouts')
@section('title')
    View Page
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
    <div class="col-12 col-sm-9 col-md-3">
        <form action="{{ route('employee.acceptEvent') }}" method="POST">
            {{ csrf_field() }}
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
                    @foreach ($employees as $row)
                        @foreach ($row as $key => $employee)
                            <tr>
                                <td>{{ $employee['code'] }}</td>
                                <td>{{ $employee['name'] }}</td>
                                <td>{{ $employee['email'] }}</td>
                                <td>{{ $employee['gender'] }}</td>
                                <td>{{ transformDate($employee['dob']) }}</td>
                                <td>{{ $employee['address'] }}</td>
                                <td>{{ $employee['phone_number'] }}</td>
                                <td>{{ $employee['marital_status'] }}</td>
                                <td>{{ $employee['experience'] }}</td>
                                <td>{{ $employee['current_salary'] }}</td>
                                <td>{{ $employee['designation'] }}</td>
                            </tr>
                            <textarea name="employees[]" hidden>{{ $employee['code'] }} {{ $employee['name'] }} {{ $employee['email'] }} {{ $employee['gender'] }} {{ transformDate($employee['dob']) }} {{ $employee['address'] }} {{ $employee['phone_number'] }} {{ $employee['marital_status'] }} {{ $employee['experience'] }} {{ $employee['current_salary'] }} {{ $employee['designation'] }} 
                                </textarea>
                        @endforeach
                    @endforeach
                </tbody>
            </table>

            {{-- <input type="hidden" name="employees[]" value="{{$employee['code']}}"> --}}
            <button class="btn btn-primary btn-lg" id="accept" type="submit">Accept</button>
        </form>
    </div>
    <div class="col-sm-10">
        <form action="{{ route('employee.rejectEmployee') }}">
            <button class="btn btn-danger btn-lg" type="submit">Reject </button>
        </form>
    </div>
    <script>
        $(document).ready(function() {
            $(".alert").fadeTo(2000, 2000).slideUp(2000, function() {
                $(".alert").slideUp(5000);
            });
        });
    </script>
@endsection
