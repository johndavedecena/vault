<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Add Employee | Vault</title>
        @include('Includes.css_tb')
        <script type="text/javascript">
			function unitChanger(){
				var unitDiv = "unit";
				var businessLine = document.getElementById("businessLine").value;
				unitDiv+=businessLine;

				@foreach($getBusinessLines as $gbl)
					@if(array_key_exists($gbl->id,$units))
						
					if(unitDiv!="unit{{ $gbl->id }}"){
						document.getElementById("unit{{ $gbl->id }}").style.display="none";
					}

					else{
						document.getElementById("unit{{ $gbl->id }}").style.display="block";
					}
				
					@endif
				@endforeach
			}
        </script>
    </head>
    <body>
        <div class="container">
            <nav class="navbar" role="navigation">
                @include('Includes.Menu.admin_menu')
            </nav><!-- /navbar -->

            <div class="main_contain">
                <div class="space"></div>
                <div class="panel panel-default">
                    <div class="panel-body">
                    	<div class="fleft btn arrow-back"><a href="<?php echo Session::get('page')!=null ? Session::get('page'): URL() ?>"><i class="fa fa-arrow-circle-o-left fa-3x"></i></a></div>
                        <h5>Add New Employee</h5>
		            	@if(Session::get('message'))
		            	<div class="alert alert-danger alert-dismissible text-center" role="alert">
			                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			                <strong>Registration Failed. </strong> {{ Session::get('message') }}
		                </div>
		                @endif
		                @if(Session::get('success'))
		            	<div class="alert alert-success alert-dismissible text-center" role="alert">
			                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			                <strong>Registration Successful. </strong> {{ htmlentities(Session::get('success')) }}
		                </div>
		                @endif
		                @if(Session::get('info'))
		            	<div class="alert alert-info alert-dismissible text-center" role="alert">
			                <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			                <strong>Information. </strong> {{ htmlentities(Session::get('info')) }}
		                </div>
		                @endif
                        {{ Form::open(array('url'=>'employees/submitnewemployee')) }}
                            <div class="form-group">
                                <table class="table table-condensed table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th width="20%"></th>
                                            <th width="30%"></th>
                                            <th width="30%"></th>
                                            <th width="20%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><p style="float:right;font-weight:900">Name</p></td>
                                            <td>First Name *
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('first_name','',array('class'=>'form-control','placeholder'=>'First Name')) }}
                                                </div>
                                            </td>
                                            <td>Last Name *
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('last_name','',array('class'=>'form-control','placeholder'=>'Last Name')) }}
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Nickname
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('nickname','',array('class'=>'form-control','placeholder'=>'Nickname')) }}
                                                </div>
                                            </td>
                                            <td>Username
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('username','',array('class'=>'form-control','placeholder'=>'Username')) }}
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>Employee Number *
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('employee_number','',array('class'=>'form-control','placeholder'=>'Employee Number')) }}
                                                </div>
                                            </td>
                                            <td>Status *
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::select("status", array(
                                                    							""=>"--Select--",
                                                    							"Academy"=>"Academy",
                                                    							"Contractual"=>"Contractual",
                                                    							"Graduate"=>"Graduate",
                                                    							"NSN Guest"=>"NSN Guest",
                                                    							"Obsolete"=>"Obsolete",
                                                    							"OJT"=>"OJT",
                                                    							"OJT Graduate"=>"OJT Graduate",
                                                    							"On-Board"=>"On-Board",
                                                    							"Resigned"=>"Resigned"
                                                    							),
                                                    						  '',
                                                    						  array("class"=>"form-control input-sm")
                                                    				) 
                                                    
                                                    }}
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><p style="float:right;font-weight:900">Manager</p></td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                     {{ Form::select("manager_id",$managers,'',array('class'=>'form-control input-sm','placeholder'=>'Manager')); }}
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><p style="float:right;font-weight:900">Start/End Date</p></td>
                                            <td>Start Date *
                                                <div class="input-group input-group-sm">
                                                    <label for="start-datepicker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                                    {{ Form::text("start_date",'',array("class"=>"form-control","id"=>"start-datepicker","placeholder"=>"Start Date")) }}
                                                </div>
                                            </td>
                                            <td>End Date
                                            	<div class="input-group input-group-sm">
                                                    <label for="start-datepicker" class="input-group-addon btn"><span class="glyphicon glyphicon-calendar"></span></label>
                                                    {{ Form::text("end_date",'',array("class"=>"form-control","id"=>"end-datepicker","placeholder"=>"End Date")) }}
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><p style="float:right;font-weight:900">NSN ID/Email</p></td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('nsn_id','',array('class'=>'form-control','placeholder'=>'NSN ID')) }}
                                                </div>
                                            </td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('email','',array('class'=>'form-control','placeholder'=>'Email')) }}
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><p style="float:right;font-weight:900">Business Line/Unit</p></td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::select('business_line',$businessLines,'',array('class'=>'form-control input-sm','id'=>'businessLine',"onchange"=>"unitChanger()")) }}
                                                </div>
                                            </td>
                                            <td>
                                            	@foreach($getBusinessLines as $gbl)
                                            	@if(array_key_exists($gbl->id,$units))
	                                            	<div id="unit{{ $gbl->id }}"class="input-group" style="display:none">
	                                                    {{ Form::select('unit',$units[$gbl->id],'',array('class'=>'form-control input-sm')) }}
	                                                </div>
                                            	@endif
                                            	@endforeach
	                                            	
                                            </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><p style="float:right;font-weight:900">Subunit</p></td>
                                            <td> 
                                            	<div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('subunit','',array('class'=>'form-control','placeholder'=>'Subunit')) }}
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td><p style="float:right;font-weight:900">Cellphone Number</p></td>
                                            <td>
                                                <div class="input-group input-group-sm">
                                                    <span class="input-group-addon">>></span>
                                                    {{ Form::text('cellphone_number','',array('class'=>'form-control','placeholder'=>'Cellphone Number')) }}
                                                </div>
                                            </td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>
                                                <input type="hidden" name="dateRegistered" />
                                                {{ Form::button('Cancel',array('class'=>'fright btn btn-sm','type'=>'button','onclick'=>"parent.location='".Session::get('page')."'")) }}
                                                {{ Form::button('Submit',array("class"=>"fright btn btn-sm btn-info",'onclick'=>"return confirm('Add new employee?')","type"=>"submit")) }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div><!-- /.container -->
        @include('Includes.footer')
	    <!-- /.footer -->

    <!-- Load JS here for greater good =============================-->
    @include('Includes.Scripts.scripts')
    </body>
</html>