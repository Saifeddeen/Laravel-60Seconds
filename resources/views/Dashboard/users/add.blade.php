<x-main-layout-component>
    @slot('page_title')
    CreateUsers
    @endslot

    @slot('page_heading')
    Create New User
    @endslot

    <form class="user" action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input name="name" type="text" class="form-control form-control-user" id="exampleFirstName"
                    placeholder="Full name">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>
        <div class="form-group">
            <input name="email" type="email" class="form-control form-control-user" id="exampleInputEmail"
                placeholder="Email Address">
            @error('email')
            {{ $message }}
            @enderror
        </div>
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input name="password" type="password" class="form-control form-control-user" id="exampleInputPassword"
                    placeholder="Password">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="col-sm-6">
                <input name="password_confirmation" type="password" class="form-control form-control-user"
                    id="exampleRepeatPassword" placeholder="Repeat Password">
            </div>
        </div>
        <input type="submit" class="btn btn-primary btn-user btn-block" value="Register Account">

    </form>

</x-main-layout-component>