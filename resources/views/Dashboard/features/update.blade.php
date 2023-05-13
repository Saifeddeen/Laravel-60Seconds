<x-main-layout-component>
    @slot('page_title')
    CreateFeatures
    @endslot

    @slot('page_heading')
    Create New Feature
    @endslot

    <form method="POST" action="{{ route('features.update', $feature->id) }}" enctype="multipart/form-data">
        @csrf
        <div class="col-md-6">
            <label for="name-1" class="form-lable">Name:</label>
            <input type="text" name="name" id="name-1" class="form-control" value="{{ $feature->name }}">

            <label for="name-2" class="form-lable">Name(Arabic):</label>
            <input type="text" name="name_ar" id="name-2" class="form-control"
                value="{{ $feature->getTranslation('name', 'ar') }}"><br>
        </div>

        <div class="col-md-6">
            <label for="content-1" class="form-lable">Content:</label>
            <input type="text" name="content" id="content-1" class="form-control" value="{{ $feature->content }}">

            <label for="content-2" class="form-lable">Content(Arabic):</label>
            <input type="text" name="content_ar" id="content-2" class="form-control"
                value="{{ $feature->getTranslation('content', 'ar') }}"><br>
        </div>

        <div class="col-md-6">
            <label for="icon-1" class="form-lable">Icon:</label>
            <input type="file" name="icon" id="icon-1" class="form-control"><br>
        </div>

        <input type="submit" value="Update Feature" class="btn btn-primary"><br>
    </form>

</x-main-layout-component>