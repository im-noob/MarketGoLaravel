<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <form action="{{url('/')}}/admin/login" method="post">
    <div class="row">
        <div class="col-md-3">
        </div>
        <div class="col-md-6">
            <div class="card"> 
            <h2>Admin Login</h2>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email"  placeholder="Enter email" name="email" required>
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            </div>
            <div class="form-group">
                <label for="pwd">Password:</label>
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd" required>
            </div>
            <button type="submit" class="btn btn-default">Submit</button>
        </div>
        </div>
    </div>
  </form>
</div>

</body>
</html>
