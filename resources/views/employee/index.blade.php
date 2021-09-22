@extends('layouts')

@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Excel File Upload </h2>
            </div>
            <div class="d-flex flex-row-reverse flex-column">
                <div class="d-flex">
                    <form action="{{ route('importProject') }}" method="POST" enctype="multipart/form-data"
                        class="d-flex">
                        @csrf
                        <input type="file" name="file" style="height: 30px !important">

                        <button class="btn btn-info" style="margin-left: -60px" title="Import Project">
                            <i class="fas fa-cloud-upload-alt fa-2x"></i> </button>
                    </form>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered table-responsive-lg table-hover">
            <thead class="thead-dark">
                <tr>
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
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- small modal -->
        <div class="modal fade" id="smallModal" tabindex="-1" role="dialog" aria-labelledby="smallModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="smallBody">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- medium modal -->
        <div class="modal fade" id="mediumModal" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="mediumBody">
                        <div>
                            <!-- the result to be displayed apply here -->
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <script>
            // display a modal (small modal)
            $(document).on('click', '#smallButton', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#smallModal').modal("show");
                        $('#smallBody').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            });

            // display a modal (medium modal)
            $(document).on('click', '#mediumButton', function(event) {
                event.preventDefault();
                let href = $(this).attr('data-attr');
                $.ajax({
                    url: href,
                    beforeSend: function() {
                        $('#loader').show();
                    },
                    // return the result
                    success: function(result) {
                        $('#mediumModal').modal("show");
                        $('#mediumBody').html(result).show();
                    },
                    complete: function() {
                        $('#loader').hide();
                    },
                    error: function(jqXHR, testStatus, error) {
                        console.log(error);
                        alert("Page " + href + " cannot open. Error:" + error);
                        $('#loader').hide();
                    },
                    timeout: 8000
                })
            });
        </script>

    @endsection
