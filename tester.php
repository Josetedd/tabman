<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Demo</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"/>
  <link rel="stylesheet" href="jquery-ui/test.css" type="text/css" /> 
</head>
<body>
 <div class="container">
<div class="row">
         <form class="form-horizontal" action="/action_page.php">
             <div class="col-md-10 col-md-offset-1" style="background-color: #4cb14d; ">
              <h2>Tablet Replacement</h2>
              <div class="col-md-6 " style="border-right: 1px solid #f4eded">
                 <span style="center">You are Replacing</span>
    <div class="form-group"> 
      <label class="control-label col-md-3" for="fcode">Code:</label>
      <div class="col-md-9"><input type="text" class="form-control" id="fcode" value="here" disabled></div>
    </div>
    <div class="form-group"> 
      <label class="control-label col-md-3" for="fsch">From:</label>
      <div class="col-md-9">        
          <input type="text" class="form-control" id="fsch" value="School Name" disabled>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-md-3" for="fsch">Date:</label>
      <div class="col-md-9">          
          <input type="time" class="form-control" id="fsch" value="Date" disabled>
      </div>
         </div>
              </div>
         <div class="col-md-6 ">
             <span>Replacement</span>
             <div class="form-group"> 
      <label class="control-label col-md-3" for="rcode">Squid Code:</label>
      <div class="col-md-9">          
          <input type="text" class="form-control" name="rcode">
      </div>
         </div>
             <div class="form-group"> 
      <label class="control-label col-md-3" for="rime">IMEI1:</label>
      <div class="col-md-9">          
          <input type="text" class="form-control" name="rime">
      </div>
         </div>
        <div class="form-group">
            <div class="col-md-offset-4">
      <button type="submit" class="btn btn-default">Save & generate Delivery</button>
            </div>
            </div>
         
  </div>
  </div>          
  </form>
</div>
</div>    
</body>
</html>