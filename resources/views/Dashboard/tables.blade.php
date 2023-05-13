<x-main-layout-component>
    @slot('page_title')
    Tables
    @endslot

    @slot('page_heading')
    Tables
    @endslot
    {{ $ids=1 }}
    @if(strcmp(strtoupper($tableName),strtoupper('users')) == 0)
    <form action="{{ route('users.create') }}" method="GET" style="display: inline">
        @csrf
        <button type="submit" class="btn btn-primary"> Add + </button>
    </form>
    <a type="submit" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteUsersGroup').submit();">
        Delete Selected -
    </a>

    @elseif ((strcmp(strtoupper($tableName),strtoupper('clients')) == 0))
    <form action="{{ route('clients.create') }}" method="GET" style="display: inline">
        @csrf
        <button type="submit" class="btn btn-primary"> Add + </button>
    </form>
    <a type="submit" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteClientsGroup').submit();">
        Delete Selected -
    </a>

    @elseif ((strcmp(strtoupper($tableName),strtoupper('features')) == 0))
    <form action="{{ route('features.create') }}" method="GET" style="display: inline">
        @csrf
        <button type="submit" class="btn btn-primary"> Add + </button>
    </form>
    <a type="submit" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteFeaturesGroup').submit();">
        Delete Selected -
    </a>

    @elseif ((strcmp(strtoupper($tableName),strtoupper('messages')) == 0))
    <form action="{{ route('messages.create') }}" method="GET" style="display: inline">
        @csrf
        <button type="submit" class="btn btn-primary"> Add + </button>
    </form>
    <a type="submit" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteMessagesGroup').submit();">
        Delete Selected -
    </a>

    @endif

    <hr>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">{{ $tableName }}000</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <!-- Users table -->
                @if(strcmp(strtoupper($tableName),strtoupper('users')) == 0)
                <form id="deleteUsersGroup" action="{{ route('users.deleteSelected') }}" method="POST"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ready
                                                    to Delete?</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select "Delete" below if you are
                                                ready to delete the user {{ $user->name }}.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                            document.getElementById('deleteUser{{ $user->id }}-form').submit();">{{ __('Delete') }}
                                                </a>
                                                <form id="deleteUser{{ $user->id }}-form"
                                                    action="{{ route('users.delete', $user->id) }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                                <input type="checkbox" name="select_to_delete[]"
                                                    value="{{ $user->id }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif

                            </tr>
                            @endif

                            @endforeach
                        </tbody>
                    </table>
                </form>
                @endif

                <!-- Clients table -->
                @if(strcmp(strtoupper($tableName),strtoupper('clients')) == 0)
                <form id="deleteClientsGroup" action="{{ route('clients.deleteSelected') }}" method="POST"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Openion</th>
                                <th>Rating out of 5</th>
                                <th>Update | Delete</th>
                                <th>Delete Selected</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <th>Icon</th>
                            <th>Name</th>
                            <th>Openion</th>
                            <th>Rating out of 5</th>
                            <th>Update | Delete</th>
                            <th>Delete Selected</th>
                        </tfoot>
                        <tbody>
                            @foreach ($clients as $client)
                            <tr>
                                <td> <img src="{{ asset($client->image) }}" alt="image"> </td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->comment }}</td>

                                <td>
                                    <div class="star-rating">
                                        <span style="width:{{ $client->rating*20 }}%"><strong
                                                class="rating">{{ $client->rating }}</strong> out of
                                            5</span>
                                    </div>
                                </td>

                                <td>
                                    <form id="clientEdit{{ $client->id }}"
                                        action="{{ route('clients.edit', $client->id) }}" method="GET"
                                        style="display: inline" onclick="event.preventDefault();
                                        document.getElementById('clientEdit{{ $client->id }}').submit();">
                                        @csrf
                                        <button type="button" class="btn-circle btn-secandary ">
                                            <i class="fas fa-fw fa-wrench"></i>
                                        </button>
                                    </form>
                                    &nbsp&nbsp|&nbsp&nbsp
                                    <a type="submit" id="client{{ $client->id }}" class="btn btn-circle btn-danger "
                                        data-toggle="modal" data-target="#deleteClient{{ $client->id }}" href="#">
                                        <i class="fas fa-trash"></i>
                                    </a>

                                </td>

                                <td><input type="checkbox" name="select_to_delete[]" value="{{ $client->id }}"></td>

                                <!--Delete user modal-->
                                <div class="modal fade" id="deleteClient{{ $client->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Ready
                                                    to Delete?</h5>
                                                <button class="close" type="button" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">×</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">Select "Delete" below if you are
                                                ready to delete the client {{ $client->name }}.</div>
                                            <div class="modal-footer">
                                                <button class="btn btn-secondary" type="button"
                                                    data-dismiss="modal">Cancel</button>
                                                <a class="btn btn-primary" href="{{ route('logout') }}"
                                                    onclick="event.preventDefault();
                                            document.getElementById('deleteClient{{ $client->id }}-form').submit();">{{ __('Delete') }}
                                                </a>
                                                <form id="deleteClient{{ $client->id }}-form"
                                                    action="{{ route('clients.delete', $client->id) }}" method="POST"
                                                    class="d-none">
                                                    @csrf
                                                    @method('delete')
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                @endif

                <!-- Features table -->
                @if(strcmp(strtoupper($tableName),strtoupper('features')) == 0)
                <form id="deleteFeaturesGroup" action="{{ route('features.deleteSelected') }}" method="POST"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Discription</th>
                                <th>Update | Delete</th>
                                <th>Delete Selected</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Discription</th>
                                <th>Update | Delete</th>
                                <th>Delete Selected</th>

                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($features as $feature)
                            <tr>
                                <td><img src="{{ asset($feature->icon) }}" alt=""></td>
                                <td>{{ $feature->name }}</td>
                                <td>{{ $feature->content }}</td>

                                <td>
                                    <form action="{{ route('features.edit', $feature->id) }}" method="GET"
                                        style="display: inline">
                                        @csrf
                                        <button type="submit" value="" class="btn-circle btn-secandary ">
                                            <i class="fas fa-fw fa-wrench"></i>
                                        </button>
                                    </form>
                                    &nbsp&nbsp|&nbsp&nbsp
                                    <a type="submit" id="feature{{ $feature->id }}" class="btn btn-circle btn-danger "
                                        data-toggle="modal" data-target="#deleteFeature{{ $feature->id }}" href="#">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                                <td><input type="checkbox" name="select_to_delete[]" value="{{ $feature->id }}"></td>

                                <!--Delete user modal-->

                                <x-delete-modal-component>

                                    @slot('modal_fade_id')
                                    deleteFeature{{ $feature->id }}
                                    @endslot

                                    @slot('message')
                                    Ready to Delete?
                                    @endslot

                                    @slot('message2')
                                    Select "Delete" below if you are
                                    ready to delete the feature: {{ $feature->name }}
                                    @endslot

                                    @slot('form_id')
                                    deleteFeature{{ $feature->id }}form
                                    @endslot

                                    @slot('action_name')
                                    {{ __('Delete') }}
                                    @endslot

                                    @slot('action_route')
                                    {{ route('features.delete', $feature->id) }}
                                    @endslot

                                    @slot('at_method')
                                    delete
                                    @endslot

                                </x-delete-modal-component>

                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                @endif

                <!-- Messages table -->
                @if(strcmp(strtoupper($tableName),strtoupper('messages')) == 0)
                <form id="deleteMessagesGroup" action="{{ route('messages.deleteSelected') }}" method="POST"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Client Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Update | Delete</th>
                                <th>Delete Selected</th>

                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>Client Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Update | Delete</th>
                                <th>Delete Selected</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($messages as $message)
                            <tr>
                                <td>{{ $message->name }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->message }}</td>

                                <td>
                                    <form action="{{ route('messages.edit', $message->id) }}" method="GET"
                                        style="display: inline">
                                        @csrf
                                        <button type="submit" value="" class="btn-circle btn-secandary ">
                                            <i class="fas fa-fw fa-wrench"></i>
                                        </button>
                                    </form>
                                    &nbsp&nbsp|&nbsp&nbsp
                                    <a type="submit" id="message{{ $message->id }}" class="btn btn-circle btn-danger "
                                        data-toggle="modal" data-target="#deleteMessage{{ $message->id }}" href="#">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>

                                <td>

                                    <input type="checkbox" name="select_to_delete[]" value="{{ $message->id }}">

                                </td>

                                <!--Delete user modal-->
                                <x-delete-modal-component>

                                    @slot('modal_fade_id')
                                    deleteMessage{{ $message->id }}
                                    @endslot

                                    @slot('message')
                                    Ready to Delete?
                                    @endslot

                                    @slot('message2')
                                    Select "Delete" below if you are
                                    ready to delete the message of {{ $message->name }}.
                                    @endslot

                                    @slot('form_id')
                                    deleteMessage{{ $message->id }}-form
                                    @endslot

                                    @slot('action_name')
                                    {{ __('Delete') }}
                                    @endslot

                                    @slot('action_route')
                                    {{ route('messages.delete', $message->id) }}
                                    @endslot

                                    @slot('at_method')
                                    delete
                                    @endslot

                                </x-delete-modal-component>


                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>
                @endif


            </div>
        </div>
    </div>
    @slot('logout_fade')

    @slot('modal_fade_id')
    logoutModal
    @endslot

    @slot('message')
    Ready to Leave?
    @endslot

    @slot('message2')
    Click "Logout" button under.
    @endslot

    @slot('form_id1')
    logout-form
    @endslot
    @slot('form_id2')
    logout-form
    @endslot

    @slot('action_name')
    {{ __('Logout') }}
    @endslot

    @slot('action_route1')
    {{ route('logout') }}
    @endslot
    @slot('action_route2')
    {{ route('logout') }}
    @endslot

    @slot('at_method')
    post
    @endslot

    @endslot

</x-main-layout-component>