<!DOCTYPE html>
<html>
    <head>
        <title>
            admin login
        </title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-4" style="padding-top:40px;">
            <form class="form-group">
                {{ csrf_field() }}
              <label class="sr-only" for="admin">Username</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon">@</div>
                <input type="text" class="form-control" placeholder="Username" name="admin">
              </div>
              <br>
              <label class="sr-only" for="password">Your password</label>
              <input type="text" class="form-control mb-2 mr-sm-2 mb-sm-0" placeholder="password" name="password">
              <br>
              <button type="submit" class="btn">Submit</button>
            </form>
            </div>
            <div class="col-md-4"></div>
        </div>
    </body>
</html>