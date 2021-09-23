@extends('layouts')
@section('title')
    View File
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
                        <input type="file" name="file" style="height: 30px !important" required>

                        <button class="btn btn-info" style="margin-left: -60px" title="Import Project">
                            <i class="fas fa-cloud-upload-alt fa-2x"></i> </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{-- <script>
        $(document).ready(function() {
            $(".alert").fadeTo(2000, 2000).slideUp(2000, function() {
                $(".alert").slideUp(10000);
            });
        });
    </script> --}}
@endsection
