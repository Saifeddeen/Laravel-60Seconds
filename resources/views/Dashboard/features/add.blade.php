<x-main-layout-component>
    @slot('page_title')
    CreateFeatures
    @endslot

    @slot('page_heading')
    Create New Feature
    @endslot

    <form class="user" method="POST" action="{{ route('features.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group row">
            <div class="col-sm-4 mb-3 mb-sm-0">
                <input type="text" name="name" id="name-1" class="form-control form-control-user"
                    placeholder="Feature Name">
                <input type="text" name="name_ar" id="name-2" class="form-control form-control-user"
                    placeholder="اسم الميزة"><br>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" name="content" id="content-1" class="form-control form-control-user"
                    placeholder="Content">
                <input type="text" name="content_ar" id="content-2" class="form-control form-control-user"
                    placeholder="المحتوى"><br>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="file" name="icon" id="icon-1" class="form-control form-control-user"
                    placeholder="Icon"><br>
            </div>
        </div>

        <input type="submit" value="Add Feature" class="btn btn-primary btn-user"><br>
    </form>

</x-main-layout-component>