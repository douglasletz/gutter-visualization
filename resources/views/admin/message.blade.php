@extends("layouts.admin.master")


@section("title")
    Messages | Rain Gutter Visualizer
@endsection


@section("content")
    <!-- Begin Page Content -->
    <div class="container">


        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Messages</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Subject</th>
                            <th>Actions</th>
                        </tr>
                        </tfoot>
                        <tbody>
                        @foreach($messages as $key => $message)
                            <tr>
                                <td>
                                    {{$message->name}}
                                    <input type="hidden" id="name-{{$key}}" value="{{$message->name}}">
                                    <input type="hidden" id="email-{{$key}}" value="{{$message->email}}">
                                    <input type="hidden" id="subject-{{$key}}" value="{{$message->subject}}">
                                    <input type="hidden" id="message-{{$key}}" value="{{$message->message}}">
                                </td>
                                <td>{{$message->email}}</td>
                                <td>{{$message->subject}}</td>
                                <td class="border px-4 py-2">

                                    <a href="#" data-toggle="modal" data-target="#ViewUserMessageModal" onclick="viewMessage('{{$key}}')" class="cursor-pointer rounded p-1 mx-1">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="#" data-toggle="modal" onclick="$('#delete_link').attr('href', '{{route('admin_message_delete', $message->id)}}')" data-target="#UserDeleteMessageModal" class="cursor-pointer rounded p-1 mx-1 text-red-500">
                                        <i class="fas fa-trash"></i>
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

    <!-- Edit User Modal -->

    <div class="modal fade" id="centeredFormModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id='form_id' class="w-full">
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                       for="grid-first-name">
                                    First Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white-500"
                                    id="grid-first-name" type="text" placeholder="Jane">
                                <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-light mb-1"
                                       for="grid-last-name">
                                    Last Name
                                </label>
                                <input
                                    class="appearance-none block w-full bg-gray-200 text-grey-darker border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white-500 focus:border-gray-600"
                                    id="grid-last-name" type="text" placeholder="Doe">
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-6">
                            <div class="w-full px-3">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                       for="grid-password">
                                    Password
                                </label>
                                <input
                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                    id="grid-password" type="password" placeholder="******************">
                                <p class="text-grey-dark text-xs italic">Make it as long and as crazy as
                                    you'd like</p>
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                       for="grid-city">
                                    City
                                </label>
                                <input
                                    class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                    id="grid-city" type="text" placeholder="Albuquerque">
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                       for="grid-state">
                                    State
                                </label>
                                <div class="relative">
                                    <select
                                        class="block appearance-none w-full bg-grey-200 border border-grey-200 text-grey-darker py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                        id="grid-state">
                                        <option>New Mexico</option>
                                        <option>Missouri</option>
                                        <option>Texas</option>
                                    </select>
                                    <div
                                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-grey-darker">
                                        <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                             viewBox="0 0 20 20">
                                            <path
                                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-grey-darker text-xs font-light mb-1"
                                       for="grid-zip">
                                    Zip
                                </label>
                                <input class="appearance-none block w-full bg-grey-200 text-grey-darker border border-grey-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-grey"
                                    id="grid-zip" type="text" placeholder="90210">
                            </div>
                        </div>

                        <div class="mt-5">
                            <button class='bg-green-500 hover:bg-green-800 text-white font-bold py-2 px-4 rounded'>Submit</button>
                            <span class='close-modal cursor-pointer bg-red-200 hover:bg-red-500 text-red-900 font-bold py-2 px-4 rounded'>Close</span>
                        </div>
                    </form>
                </div>


            </div>
        </div>
    </div>


    <!-- View User Message Modal -->
    <div class="modal fade" id="ViewUserMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <th>Subject</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td id="name"></td>
                            <td id="email"></td>
                            <td id="subject"></td>
                            <td id="message"></td>
                        </tr>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!-- End View User Message Modal -->


    <!-- Delete User Message Modal -->
    <div class="modal fade" id="UserDeleteMessageModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body delete_modal_body">
                    <h2>Confirm Deletion</h2>

                    <div class="content">
                        <p class="mt-2"> Are you sure?</p>
                        <a href="" class="theme-btn btn-style-three mt-5" id="delete_link">Delete Message</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Delete User Message Modal -->

@endsection

@section('script')
    <script>
        function viewMessage(k){
            $("#name").html($("#name-"+k).val())
            $("#email").html($("#email-"+k).val())
            $("#subject").html($("#subject-"+k).val())
            $("#message").html($("#message-"+k).val())
        }
    </script>
@endsection
