<x-main-layout-component>
    @slot('page_title')
    Log
    @endslot

    @slot('page_heading')
    Log Table
    @endslot

    <!-- DataTales Example -->

    @if(session()->has('status'))
    <hr>
    <span class="col-lg-6 h6">{{ session()->get('status') }}</span>
    <hr>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">log</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">

                <!-- users table -->

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>Event</th>
                            <th>Auditable</th>
                            <th>Old Values</th>
                            <th>New Values</th>
                            <th>Date Created</th>

                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($logs as $log)

                        <tr>
                            <td>{{ $log['user'] }}</td>
                            <td>{{ $log['event'] }}</td>
                            <td>{{ $log['auditable'] }}</td>
                            <td>
                                @foreach ($log['old_values'] as $val)
                                <label>{{ $val }}</label>
                                @endforeach

                            </td>
                            <td>
                                @foreach ($log['new_values'] as $val)
                                <label>{{ $val }}</label>
                                @endforeach
                            </td>
                            <td>{{ $log['created_at'] }}</td>

                        </tr>

                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>
    </div>

    <hr>
    <form action="{{ route('audits.import') }}" method="post" style="display: inline" enctype="multipart/form-data">
        @csrf
        <input type="submit" class="btn btn-primary" value="Import Logs">
        <input type="file" name="excel_file">
    </form>
    <hr>
    <form action="{{ route('audits.export') }}" method="get" style="display: inline">
        <input type="submit" class="btn btn-primary" value="Download Log File">
    </form>
    <hr>

</x-main-layout-component>