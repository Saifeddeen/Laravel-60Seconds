<x-main-layout-component>
    @slot('page_title')
    ClientsTable
    @endslot

    @slot('page_heading')
    Clients Table
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

    <form action="{{ route('clients.create') }}" method="GET" style="display: inline">
        <input type="submit" class="btn btn-primary" value="Add +">
    </form>
    <a type="submit" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteClientsGroup').submit();">
        Delete Selected -
    </a>

    <hr>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Clients</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <!-- Clients table -->
                <form id="deleteClientsGroup" action="{{ route('clients.deleteSelected') }}" method="POST"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form></form>
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
                                        style="display: inline">
                                        <button class="btn-circle btn-secandary " onclick="event.preventDefault();
                                        document.getElementById('clientEdit{{ $client->id }}').submit();">
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
                                
                                <x-delete-modal-component>
                                    @slot('modal_fade_id')
                                    deleteClient{{ $client->id }}
                                    @endslot
                                    @slot('message')
                                    Ready to Delete?
                                    @endslot
                                    @slot('message2')
                                    Select "Delete" below if you are ready to delete the client: {{ $client->name }}.                                    @endslot
                                    @slot('action')
                                    {{ route('clients.delete', $client->id) }}
                                    @endslot
                                    @slot('form_id')
                                    deleteClient{{ $client->id }}-form
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

    <hr>
    <form action="{{ route('clients.import') }}" method="post" style="display: inline" enctype="multipart/form-data">
        @csrf
        <label style="display: block">The Laoded File must be Excel File of Type: .xls, .xlsx</label>
        <input type="submit" class="btn btn-primary" value="Import Logs">
        <input type="file" name="excel_file">
    </form>
    <hr>
    <form action="{{ route('clients.export') }}" method="get" style="display: inline">
        <input type="submit" class="btn btn-primary" value="Download Clients Data">
    </form>
    <hr>

</x-main-layout-component>