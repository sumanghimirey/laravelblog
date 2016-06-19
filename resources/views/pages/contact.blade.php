@extends('main')
@section('title','|Contact')

@section('content')
        
          <div class="row">
            <div class="col-md-12">

                <h1> Contact Me</h1>
                <hr>
<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">subject</label>
    <input type="subject" class="form-control" id="exampleInputPassword1" placeholder="Password">
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Messege</label>
    <textarea name="messege" class="form-control"></textarea>
  </div>

 
  <button type="submit" class="btn btn-default">Submit</button>
</form>
        
</div>
</div>
@endsection
       

