<x-main-layout-component>
    @slot('page_title')
    FeaturesTable
    @endslot

    @slot('page_heading')
    Features Table
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

    <form action="{{ route('features.create') }}" method="GET" style="display: inline">
        <input type="submit" class="btn btn-primary" value="Add +">
    </form>

    <a type="submit" class="btn btn-danger" onclick="event.preventDefault();
    document.getElementById('deleteFeaturesGroup').submit();">
        Delete Selected -
    </a>

    <hr>

    <!-- DataTales Example -->

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Features</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <!-- Features table -->
                <form id="deleteFeaturesGroup" action="{{ route('features.deleteSelected') }}" method="POST"
                    style="display: inline">
                    @csrf
                    @method('delete')
                    
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <form></form>
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

                                <td>
                                    <input type="checkbox" name="select_to_delete[]" value="{{ $feature->id }}">
                                </td>

                                <!--Delete user modal-->
                                
                                <x-delete-modal-component>
                                    @slot('modal_fade_id')
                                    deleteFeature{{ $feature->id }}
                                    @endslot
                                    @slot('message')
                                    Ready to Delete?
                                    @endslot
                                    @slot('message2')
                                    Select "Delete" below if you are ready to delete the feature: {{ $feature->name }}.                                    @endslot
                                    @slot('action')
                                    {{ route('features.delete', $feature->id) }}
                                    @endslot
                                    @slot('form_id')
                                    deleteFeature{{ $feature->id }}-form
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
    <form action="{{ route('features.import') }}" method="post" style="display: inline" enctype="multipart/form-data">
        @csrf
        <label style="display: block">The Laoded File must be Excel File of Type: .xls, .xlsx</label>
        <input type="submit" class="btn btn-primary" value="Import Logs">
        <input type="file" name="excel_file">
    </form>
    <hr>
    <form action="{{ route('features.export') }}" method="get" style="display: inline">
        <input type="submit" class="btn btn-primary" value="Download Features Data">
    </form>
    <hr>
    
</x-main-layout-component>