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
                    <h3 class="text-muted">Employee Edit </h3>

               @if ($message= Session::get('success'))
               <div class="alert alert-success alert-block">
                <strong>{{$message}}</strong>
               </div>

               @endif

                    <form action="{{ route('employee.update', ['employee'=>$emp->id]) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="form-group mt-3">
                            <label for="">First Name</label>
                            <input type="text" name="first_name" id="" class="form-control" value="{{old('first_name', $emp->first_name)}}" placeholder="" aria-describedby="helpId">
                              @if($errors->has('first_name'))
                              <span class="text-danger">{{$errors->first('first_name')}}</span>
                              @endif
                          </div>

                          <div class="form-group mt-3">
                            <label for="">Last Name</label>
                            <input type="text" name="last_name" id="" class="form-control"  value="{{old('last_name', $emp->last_name)}}" placeholder="" aria-describedby="helpId">
                              @if($errors->has('last_name'))
                              <span class="text-danger">{{$errors->first('last_name')}}</span>
                              @endif
                          </div>


                          <div class="form-group">
                            <label for>Company</label>
                            <select name="company" id="company" class="form-control">
                                <option value="">Select A Company</option>
                                @foreach ($comp as $c)
                                <option value="{{ $c->id }}"
                                    @if(isset($comp))
                                        @if($emp->company  == $c->id) Selected @endif
                                    @endif
                                    >{{ $c->name }}</option>
                                @endforeach
                            </select>

                        </div>

                          <div class="form-group mt-3">
                            <label for="">Email</label>
                            <input type="text" name="email" id="" class="form-control"  value="{{old('email', $emp->email)}}" placeholder="" aria-describedby="helpId">
                              @if($errors->has('email'))
                              <span class="text-danger">{{$errors->first('email')}}</span>
                              @endif
                          </div>

                          <div class="form-group mt-3">
                            <label for="">Phone Number</label>
                            <input type="text" name="phone" id="" class="form-control"  value="{{old('phone', $emp->phone)}}" placeholder="" aria-describedby="helpId">
                              @if($errors->has('phone'))
                              <span class="text-danger">{{$errors->first('phone')}}</span>
                              @endif
                          </div>

                        <div class="form-group">
                            <label for="">Profile picture</label>
                            <input type="file" name="profile_picture" id="" class="form-control"   value="{{old('profile_picture', $emp->profile_picture)}}" placeholder="" aria-describedby="helpId">
                            @if($errors->has('profile_picture'))
                            <span class="text-danger">{{$errors->first('profile_picture')}}</span>
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
