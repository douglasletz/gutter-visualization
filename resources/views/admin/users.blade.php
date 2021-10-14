@extends("layouts.admin.master")


@section("title")
Users Page | Rain Gutter Visualizer
@endsection


@section("content")
<!-- Begin Page Content -->
<div class="container">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($users as $key => $user)
                        <tr>
                            <td>
                                {{$user->username}}
                                <input type="hidden" id="username-{{$key}}" value="{{$user->username}}">
                                <input type="hidden" id="email-{{$key}}" value="{{$user->email}}">
                                <input type="hidden" id="phone_number-{{$key}}" value="{{$user->phone_number}}">
                                <input type="hidden" id="address-{{$key}}" value="{{$user->address}}">
                                <input type="hidden" id="edit_action-{{$key}}" value="{{route('admin_user_edit', $user->id)}}">
                            </td>
                            <td>
                                {{$user->email}}
                            </td>
                            <td class="border px-4 py-2">
                                <a href="#" data-toggle="modal" data-target="#ViewUserModal" onclick="viewUser('{{$key}}')" class="cursor-pointer rounded p-1 mx-1">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="#" data-toggle="modal" data-target="#EditUserModal" onclick="editUser('{{$key}}')" class="cursor-pointer rounded p-1 mx-1">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="" onclick="$('#delete_link').attr('href', '{{route('admin_user_delete', $user->id)}}')" data-toggle="modal" data-target="#UserDeleteModal" class="cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-trash"></i>
                                </a>
                                <a href="{{route('admin_project', $user->id)}}" class="cursor-pointer rounded p-1 mx-1 text-red-500">
                                    <i class="fas fa-project-diagram"></i>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->


<!-- View User Modal -->
<div class="modal fade" id="ViewUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="username"></td>
                        <td id="email"></td>
                        <td id="phone_number"></td>
                        <td id="address"></td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>
</div>
<!-- End View User Modal -->


<!-- Edit User Modal -->
<div class="modal fade" id="EditUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body login-section" style="padding: 0 !important">

         <div class="auto-container">
            <div class="row clearfix">

                <!-- Register Form -->
                <div class="login-form register-form" style="width: 100%">

                    <form method="POST" action="" id="edit_form">

                        @csrf
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" id="username-edit" value="{{ old('username') }}" placeholder="Enter Your Username">
                            <div class="validate"></div>

                            @if(old('register') != null)
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Email Address</label>
                            <input type="email" name="email" placeholder="Enter Your Email Address" value="{{ old('email') }}" class="@error('email') is-invalid @enderror" id="email-edit" autocomplete="email">
                            <div class="validate"></div>

                            @if(old('register') != null)
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="number" name="phone_number" id="phone_number-edit" value="{{ old('phone_number') }}" placeholder="Enter Your Phone Number">
                            <div class="validate"></div>
                            @if(old('register') != null)
                            @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                            @endif

                        </div>

                        <div class="form-group">
                            <label>Home Address</label>
                            <br>
                            <textarea name="address" placeholder="Enter Your Home Address" id="address-edit">{{ old('address') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" id="password-edit" value="{{ old('password') }}" placeholder="Enter Your Phone Number">
                        </div>

                        <div class="form-group centered">
                            <input type="submit" name="update" class="theme-btn btn-style-three mt-2" value="Update">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
</div>
<!-- End Edit User Modal -->

<!-- Delete User Modal -->
<div class="modal fade" id="UserDeleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Confirm Deletion</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <div class="modal-body user_delete_body">
            <h2>Confirm Deletion</h2>

            <div class="content">
                <p class="mt-2"> Are you sure?</p>
                <a href="" class="theme-btn btn-style-three mt-5" id="delete_link">Delete User</a>
            </div>
        </div>

    </div>
</div>
</div>
<!-- End Delete User Modal -->

@endsection

@section('script')
<script>
    function viewUser(k){
        $("#username").html($("#username-"+k).val())
        $("#email").html($("#email-"+k).val())
        $("#phone_number").html($("#phone_number-"+k).val())
        $("#address").html($("#address-"+k).val())
    }

    function editUser(k){
        $("#username-edit").val($("#username-"+k).val())
        $("#email-edit").val($("#email-"+k).val())
        $("#phone_number-edit").val($("#phone_number-"+k).val())
        $("#address-edit").html($("#address-"+k).val())
        $("#edit_form").attr('action', $("#edit_action-"+k).val())
    }
</script>
@endsection
