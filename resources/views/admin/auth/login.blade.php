<!DOCTYPE html>
<html>
  <head>
    @include('admin.head')
    <style>
      body {
        background-image: url('http://www.banarsidesigns.com/blog/wp-content/uploads/2016/10/what-is-batik-embellishments.jpg');
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
      }
    </style>
  </head>
  <body>
    <div class="wrapper-page">
      <div class="panel panel-color panel-primary panel-pages">
        <div class="panel-heading bg-img">
          <div class="bg-overlay"></div>
          <h3 class="text-center m-t-10 text-white"> Masuk Admin </h3>
        </div>
        <div class="panel-body">
          <form class="form-horizontal m-t-20" role="form" method="POST" action="{{ url('admin/login') }}">
            {{ csrf_field() }}
            <div class="form-group ">
              <div class="col-xs-12">
                <input class="form-control input-lg" name="username" type="text" placeholder="Username">
                @if ($errors->has('username'))
                    <span class="help-block">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group">
              <div class="col-xs-12">
                <input class="form-control input-lg" name="password" type="password" placeholder="Password">
                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
              </div>
            </div>
            <div class="form-group text-center m-t-40">
              <div class="col-xs-12">
                <button class="btn btn-primary btn-lg w-lg waves-effect waves-light" type="submit">Log In</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    @include('admin.script')
  </body>
</html>
