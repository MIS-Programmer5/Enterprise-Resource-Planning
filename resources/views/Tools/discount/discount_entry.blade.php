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
</head>
    <title>My Task</title> 
  <body>
      <h4>Discount Level Data Entry</h4>
        <div class="container">
                <form method ="post" action ="{{route('discount.store')}}">
                  @csrf
                  @method('post')
                  <div class="row">
                        <div class="row">
                          <div class="col-100">
                          <label for="datefrom">Date From:</label>
                             <input type="date" id="datefrom" name="datefrom">
                          <label for="dateto">Date To:</label>
                             <input type="date" id="dateto" name="dateto">
                            <input type="submit" value="Save"/>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-20">
                            <label for="Discname">Discount Name</label>
                          </div>
                          <div class="col-55">
                            <input type="text" name="discname" placeholder="Discount name..">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-20">
                            <label for="Desname">Description Name</label>
                          </div>
                          <div class="col-55">
                            <input type="text" name="desname" placeholder="Description name..">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-20">
                            <label for="Discpercnt">Discount Percentage</label>
                          </div>
                          <div class="col-55">
                            <input type="text" name="percent" placeholder="Discount percentage..">
                          </div>
                        </div>
                          <div class="row">
                            <div class="col-20">
                              <label for="vehicle1"> Applicable Customer Type</label><br>
                            </div>
                            <div class="col-55">  
                              <select class="form-control" id="exampleFormControlSelect1">
                                <option selected>Choose...</option>
                                <option>WALK-IN</option>
                                <option>ON ACCOUNT</option>
                                <option>CLAN</option>
                                <option>COMPANY</option>
                                <option>OTHER COMPANY</option>
                                <div class="checkbox">
                                  <label><input type="checkbox" name="appcheck"></label>
                                  <button type="addrow" class="btn btn-default">Add</button>
                              </select>
                            </div>
                          </div>  
                        </div>   
                    </form>
                  </div>
                <table>
                  <tr>
                    <th style="width:45%;">CUSTOMER TYPE</th>
                    <th style="width:45%;">REMARKS</th>
                    <th style="width:10%;">ACTION</th>
                  </tr>
                <tr>
              </tr>
            </body>
          </html>
          <script src="js/js.js"></script>
