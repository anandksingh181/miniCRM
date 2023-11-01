<!DOCTYPE html>
<html lang="en">

<head>
    @include('layout.css')
</head>
<body>

  @include('layout.header')
  <!-- ======= Sidebar ======= -->
  @include('layout.sidebar')

  <main id="main" class="main">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-8">
                <div class="card mt-3 p-3">
               @if ($message= Session::get('success'))
               <div class="alert alert-success alert-block">
                <strong>{{$message}}</strong>
               </div>

               @endif

                    <form action="{{url('admin/company')}}" method="post" enctype="multipart/form-data">
                        @csrf


                        <div class="form-group mt-3">
                            <label for="">Name</label>
                            <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              @if($errors->has('name'))
                              <span class="text-danger">{{$errors->first('name')}}</span>
                              @endif
                          </div>

                          <div class="form-group mt-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              @if($errors->has('email'))
                              <span class="text-danger">{{$errors->first('email')}}</span>
                              @endif
                          </div>


                        <div class="form-group">
                            <label for="">Logo</label>
                            <input type="file" name="logo" id="" class="form-control" placeholder="" aria-describedby="helpId">
                            @if($errors->has('logo'))
                            <span class="text-danger">{{$errors->first('logo')}}</span>
                            @endif
                          </div>


                          <div class="form-group mt-3">
                            <label for="">Website</label>
                            <input type="text" name="website" id="" class="form-control" placeholder="" aria-describedby="helpId">
                              @if($errors->has('website'))
                              <span class="text-danger">{{$errors->first('website')}}</span>
                              @endif
                          </div>


                          <button type="submit" class="btn btn-primary mt-4 ">Submit</button>



                    </form>
                </div>

            </div>
        </div>
    </div>

  <!-- Vendor JS Files -->

 @include('layout.script')

</body>

</html>
