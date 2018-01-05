@extends('layouts.base2')

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
                    <hr />
                </div>
            </div>
        </div>
	</div>


@stop

@section('js')
    @parent 
    <script src="{!! asset('/plugins/jQuery/jQuery-2.1.4.min.js') !!}">
    slkadjlaksjdlk
    </script>

@stop