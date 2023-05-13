<x-main-layout-component>
    @slot('page_title')
    UpdateClients
    @endslot

    @slot('page_heading')
    Update Client
    @endslot

    <form method="POST" action="{{ route('clients.update', $client->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="name-1" class="form-lable">Name:</label>
            <input type="text" name="name" id="name-1" class="form-control" value="{{ $client->name }}">

            <label for="name-2" class="form-lable">Name(Arabic):</label>
            <input type="text" name="name_ar" id="name-2" class="form-control"
                value="{{ $client->getTranslation('name','ar') }}"><br>
        </div>

        <div class="col-md-6">
            <label for="comment-1" class="form-lable">Comment:</label>
            <input type="text" name="comment" id="comment-1" class="form-control" value="{{ $client->comment }}">

            <label for="comment-2" class="form-lable">Comment(Arabic):</label>
            <input type="text" name="comment_ar" id="comment-2" class="form-control"
                value="{{ $client->getTranslation('comment','ar') }}"><br>
        </div>

        <div class="col-md-6">
            <label for="rating-1" class="form-lable">Rating:</label>
            <input type="number" name="rating" id="rating-1" class="form-control" value="{{ $client->rating }}"><br>
        </div>

        <div class="col-md-6">
            <label for="image-1" class="form-lable">Image:</label>
            <input type="file" name="image" id="image-1" class="form-control"><br>
        </div>

        <input type="submit" value="Update Client" class="btn btn-primary"><br>
    </form>

</x-main-layout-component>