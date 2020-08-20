@extends('layouts.app')
@section('content')
    <div class="container-fluid app-body">

        <div class="row">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <div class="panel-title">
                           Recent posts moved to buffer
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="custom-search">
                            <div class="col-md-12">
                                <div class="row">


                                        <div id="app">
                                            <history-component></history-component>
                                        </div>



                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')

    <script>


        $(function () {
            $('#datetimepicker').datetimepicker();
        });

    </script>

    @endsection
