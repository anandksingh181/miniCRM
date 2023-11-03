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
                          <h5 class="card-title">Company List</h5>



                          <!-- Table with hoverable rows -->
                          <table class="table table-hover">
                            <thead>
                              <tr>
                                <th scope="col">Sno.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Logo</th>
                                <th scope="col">Website</th>
                                <th scope="col">Action</th>


                              </tr>
                            </thead>
                            <tbody>
                             @foreach ($companies as $comp )
                             <tr>
                                <td>{{$loop->index+1}}</td>
                                <td>{{$comp->name}}</td>
                                <td>{{$comp->email}}</td>
                                <td><img src="{{ asset('storage/' . $comp->logo) }}" alt="" class="rounded-circle" width="50px" height="50px"></td>
                                <td>{{$comp->website}}</td>
                                <td>
                                     <form action="{{ route('company.destroy', $comp->id) }}" method="post">
                                            @csrf
                                           @method('DELETE')

                                            <a href="{{ route('company.edit', $comp->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>

                                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this company?');"><i class="bi bi-trash"></i> Delete</button>
                                      </form>
                                </td>
                             </tr>

                             @endforeach
                            </tbody>
                          </table>
                          <!-- End Table with hoverable rows -->
                          <div class="mt-5">
                            {{ $companies->links() }}
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
