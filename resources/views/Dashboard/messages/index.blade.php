<x-main-layout-component>
    @slot('page_title')
    MessagesTable
    @endslot

    @slot('page_heading')
    Messages Table
    @endslot

    <form action="{{ route('messages.create') }}" method="GET" style="display: inline">
        <input type="submit" class="btn btn-primary" value="Add +">
    </form>
    <a type="submit" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteMessagesGroup').submit();">
        Delete Selected -
    </a>

    <hr>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Messages</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <!-- Messages table -->
                <form id="deleteMessagesGroup" action="{{ route('messages.deleteSelected') }}" method="POST"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form></form>
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
                                <td>{{ $message->id }}</td>
                                <td>{{ $message->email }}</td>
                                <td>{{ $message->message }}</td>

                                <td>
                                    <form action="{{ route('messages.edit', $message->id) }}" method="GET"
                                        style="display: inline">
                                        <button type="submit" class="btn-circle btn-secandary ">
                                            <i class="fas fa-fw fa-wrench"></i>
                                        </button>
                                    </form>
                                    &nbsp&nbsp|&nbsp&nbsp
                                    <a id="message{{ $message->id }}" class="btn btn-circle btn-danger "
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
                                    Select "Delete" below if you are ready to delete the message: {{ $message->name }}.                                    @endslot
                                    @slot('action')
                                    {{ route('messages.delete', $message->id) }}
                                    @endslot
                                    @slot('form_id')
                                    deleteMessage{{ $message->id }}-form
                                    @endslot
                                </x-delete-modal-component>
                                
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </form>

            </div>
        </div>
    </div>
    
</x-main-layout-component>