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
                <div class="col-sm-12">
                    <div class="card mt-3 p-2">
                        <div class="card-body">
                          <h5 class="card-title">Employee List</h5>



                          <!-- Table with hoverable rows -->
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Sno.</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Company</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Profile Picture</th>
                                <th scope="col">Action</th>


                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($employee as $emp )
                             <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$emp->first_name}}</td>
                                <td>{{$emp->last_name}}</td>
                                <td>{{$emp->company}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->phone}}</td>


                                <td><img src="{{ asset('storage/' . $emp->profile_picture) }}" alt="" class="rounded-circle" width="50px" height="50px"></td>
                                <td>
                                     <form action="{{ route('employee.destroy', $emp->id) }}" method="post">
                                            @csrf
                                           @method('DELETE')

                                            <a href="{{ route('employee.edit', $emp->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this employee?');"><i class="bi bi-trash"></i> Delete</button>
                                      </form>
                                </td>
                             </tr>

                             @endforeach
                            </tbody>
                          </table>
                          <!-- End Table with hoverable rows -->
                          <div class="mt-5">
                            {{ $employee->links() }}
                          </div>
                        </div>
                      </div>
                </div>
            </div>
        </div>




  </main>
  <!-- Vendor JS Files -->
 @include('layout.script')
</body>

</html>
