<x-main-layout-component>
    @slot('page_title')
    UpdateMessage
    @endslot

    @slot('page_heading')
    Update Message
    @endslot

    <!-- Main Content -->
    <form method="POST" action="{{ route('messages.update', $message->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="name-1" class="form-lable">Name:</label>
            <input type="text" name="name" id="name-1" class="form-control" value="{{ $message->name }}" disabled><br>z
        </div>

        <div class="col-md-6">
            <label for="content-1" class="form-lable">Content:</label>
            <input type="text" name="content" id="content-1" class="form-control" value="{{ $message->email }}" disabled><br>
        </div>

        <div class="col-md-6">
            <label for="message-1" class="form-lable">Message:</label>
            <input type="text" name="message" id="message-1" class="form-control" value="{{ $message->message }}"><br>
        </div>

        <input type="submit" value="Update Message" class="btn btn-primary"><br>
    </form>

</x-main-layout-component>