<x-main-layout-component>
    @slot('page_title')
    CreateMessages
    @endslot

    @slot('page_heading')
    Create New Messages
    @endslot

    <!-- Main Content -->
    <form class="user" method="POST" action="{{ route('messages.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <input type="text" name="name" id="name-1" class="form-control form-control-user"
                    placeholder="Customer Name"><br>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="email" name="email" id="email-1" class="form-control form-control-user"
                    placeholder="Email"><br>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" name="message" id="message-1" class="form-control form-control-user"
                    placeholder="Write Message Here"><br>
            </div>
        </div>

        <input type="submit" value="Add Message" class="btn btn-primary btn-user"><br>
    </form>

</x-main-layout-component>