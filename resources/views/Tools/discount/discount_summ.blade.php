<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
    * {
      box-sizing: border-box;
      }
input[type=text], select, textarea {
  width: 55%;
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

input[type=submit] {
  background-color: #3869d4;
  color: white;
  padding: 8px 8px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  float: right;
}
input[type=submit]:hover {
  background-color: #3869d4;
}
.container {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 5px;
}

.col-20 {
  float: left;
  width: 20%;
  margin-top: 6px;
}

.col-55 {
  float: left;
  width: 55%;
  margin-top: 6px;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}
/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
table {
  border-collapse: collapse;
  border-spacing: 0;
  width: 100%;
  border: 1px solid #ddd;
}
th, td {
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #f2f2f2;
}
</style>
<div class="row-fluid">
	<div class="span12"> 
		<h4 class="page-title">
			Discount Level Data Summary
		</h4>
			<div class="portlet box light-grey">
				<div class="portlet-title">
					<!--
					<div class="caption"> Discount Level Data Summary </div>
						<div class="tools">
							<a href="javascript:void(0);" class="collapse"></a>
						</div>
					</div>
					-->
				<div class="portlet-body">
				<div class="row-fluid table-toolbar" style="margin-bottom: 0px;">
						<div class="btn-group span2">
							<button id="add_new" class="btn green">
								<ul class="nav navbar-nav">
          							<li><a href="{{ URL::to('/create') }}">Add new </a>
        						</ul>
							</button>
							<button id="print" class="btn">
							<ul class="nav navbar-nav">
          							<li><a href="{{ URL::to('/') }}">Print  </a>
        						</ul>
							</button>
						</div>
					</div>
					
					<div class="row-fluid">
						<div class="span12" style="overflow:auto;">
							<table border="1" class="table table-striped table-hover table-bordered" style="width:100% !important;" id="my_editable">
								
                                <thead>
									<tr>
										<th>DISCOUNT NUMBER</th>
									    <th>DISCOUNT NAME</th>
										<th>DISCOUNT DESCRIPTION</th>
										<th>TOTAL PERCENTAGE</th>
										<th>DATE FROM</th>
										<th>DATE TO</th>
										<th>CREATED</th>
										<th>ACTION</th>
									</tr>
										@foreach($discounts as $disc)
											<tr>
												<td>{{$disc->id}}</td>
												<td>{{$disc->discname}}</td>
												<td>{{$disc->desname}}</td>
												<td>{{$disc->percent}}</td>
												<td>{{$disc->datefrom}}</td>
												<td>{{$disc->dateto}}</td>
												<td>{{$disc->created_at}}</td>
												<td><a href="{{route('discount.edit',['discounts'=>$discounts])}}">UPDATE</a>
												</td>
											</tr>
										@endforeach
								</thead>
							    <tfoot>

							    </tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
			<!-- END EXAMPLE TABLE PORTLET-->
		</div>
	</div>
</div>