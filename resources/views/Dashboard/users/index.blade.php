<x-main-layout-component>
    @slot('page_title')
    UsersTables
    @endslot

    @slot('page_heading')
    Users Table
    @endslot
    
    @if(session()->has('status'))
    <hr>
    <span class="col-lg-6 h6">{{ session()->get('status') }}</span>
    <hr>
    @endif

    @error('excel_file')
        <hr>
        <span class="col-lg-6 h6 text-danger">{{ $message }}</span>
        <hr>
    @enderror

    <form action="{{ route('users.create') }}" method="GET" style="display: inline">
        <input type="submit" class="btn btn-primary" value="Add +">
    </form>
    <a type="submit" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteUsersGroup').submit();">
        Delete Selected -
    </a>
    
    <hr>
    
    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">users</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <!-- users table -->
                <form id="deleteUsersGroup" action="{{ route('users.deleteSelected') }}" method="POST"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form></form>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin Type</th>
                                <th>Update | Delete</th>
                                <th>Delete Selected</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Admin Type</th>
                                <th>Update | Delete</th>
                                <th>Delete Selected</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                            
                            @if($user != Auth::user())
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->admin_type }}</td>

                                <td>
                                    @if($user->admin_type == null ||
                                    (strcmp(strtoupper(Auth::user()->admin_type),strtoupper('super')) == 0))
                                    <form action="{{ route('users.edit', $user->id) }}" method="GET"
                                        style="display: inline">
                                        <button type="submit" value="" class="btn-circle btn-secandary ">
                                            <i class="fas fa-fw fa-wrench"></i>
                                        </button>
                                    </form>
                                    &nbsp&nbsp|&nbsp&nbsp
                                    <a type="submit" id="{{ $user->id }}" class="btn btn-circle btn-danger "
                                        data-toggle="modal" data-target="#deleteUser{{ $user->id }}" href="#"
                                        onclick="getId(id);">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                                <td><input type="checkbox" name="select_to_delete[]" value="{{ $user->id }}"></td>

                                <!--Delete user modal-->

                                <x-delete-modal-component>
                                    @slot('modal_fade_id')
                                    deleteUser{{ $user->id }}
                                    @endslot
                                    @slot('message')
                                    Ready to Delete?
                                    @endslot
                                    @slot('message2')
                                    Select "Delete" below if you are ready to delete the user: {{ $user->name }}.
                                    @endslot
                                    @slot('action')
                                    {{ route('users.delete',$user->id) }}
                                    @endslot
                                    @slot('form_id')
                                    deleteUser{{ $user->id }}-form
                                    @endslot
                                </x-delete-modal-component>
                                @endif

                            </tr>
                            @endif
                            @endforeach
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>

    <hr>
    <form action="{{ route('users.import') }}" method="post" style="display: inline" enctype="multipart/form-data">
        @csrf
        <label style="display: block">The Laoded File must be Excel File of Type: .xls, .xlsx</label>
        <input type="submit" class="btn btn-primary" value="Import Users">
        <input type="file" name="excel_file">
    </form>
    <hr>
    <form action="{{ route('users.export') }}" method="get" style="display: inline">
        <input type="submit" class="btn btn-primary" value="Download Users Data">
    </form>
    <hr>

</x-main-layout-component>