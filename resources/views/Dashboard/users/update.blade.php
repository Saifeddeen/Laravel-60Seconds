<x-main-layout-component>
    @slot('page_title')
    UpdateUsers
    @endslot

    @slot('page_heading')
    Update User
    @endslot

    <form method="POST" action="{{ route('users.update', $user->id) }}">
        @csrf
        <div class="col-md-6">
            <label for="name-1" class="form-lable">Name:</label>
            <input type="text" name="name" id="name-1" class="form-control" value="{{ $user->name }}"><br>
        </div>

        <div class="col-md-6">
            <label for="comment-1" class="form-lable">Comment:</label>
            <input type="text" name="email" id="comment-1" class="form-control" value="{{ $user->email }}"><br>
        </div>

        @if(strcmp(strtoupper(Auth::user()->admin_type), strtoupper('super')) == 0)
        <div class="col-md-6">
            <select name="admin_type" class="form-control">
                <option value="super">super admin</option>
                <option value="admin">admin</option>
                <option value="">user</option>
            </select><br>
        </div>
        @endif

        <input type="submit" value="Update" class="btn btn-primary"><br>
    </form>

</x-main-layout-component>