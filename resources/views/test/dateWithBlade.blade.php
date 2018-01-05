@extends('layouts.base')
@section('head')
    @parent
    <script src="{!! asset('/plugins/jQuery/jQuery-2.1.4.min.js') !!}"></script>
@stop

@section('body')
	
	<div class="content-wrapper">
	 <div class="container">
        <div class="row">                
            <div class="col-md-9" role="main">
                <hr />
                <h3 id="linked-pickers">Linked Pickers</h3>
                <div class="container">
                    <div class='col-md-5'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker6'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-5'>
                        <div class="form-group">
                            <div class='input-group date' id='datetimepicker7'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    </div>

                    <script type="text/javascript">
                        $(function () {
                            $('#datetimepicker6').datetimepicker({
                                format: 'DD/MM/YYYY'
                            });
                            $('#datetimepicker7').datetimepicker({
                                useCurrent: false,
                                format: 'DD/MM/YYYY'
                            });
                            $("#datetimepicker6").on("dp.change", function (e) {
                                $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                            });
                            $("#datetimepicker7").on("dp.change", function (e) {
                                $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                            });
                        });
                    </script>
                    <hr />
                </div>
            </div>
        </div>
	</div>


@stop