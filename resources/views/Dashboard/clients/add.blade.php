<x-main-layout-component>
    @slot('page_title')
    CreateClients
    @endslot

    @slot('page_heading')
    Create New Client
    @endslot

    <form class="user" action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input name="name" type="text" class="form-control form-control-user" placeholder="Full name">
                <input name="name_ar" type="text" class="form-control form-control-user" placeholder="الاسم الكامل">
                @error('name')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group">
            <input name="comment" type="text" class="form-control form-control-user" placeholder="Client Review">
            <input name="comment_ar" type="text" class="form-control form-control-user" placeholder="مراجعة الزبون">

        </div>

        <div class="form-group row">
            <div class="col-sm-2 mb-3 mb-sm-0">
                <input name="rating" type="number" class="form-control form-control-user" placeholder="Rate from 5">
                @error('rating')
                {{ $message }}
                @enderror
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-6 mb-3 mb-sm-0">
                <input name="image" type="file" class="form-control form-control-user"
                    placeholder="Choose Your Personal Photo">
                @error('image')
                {{ $message }}
                @enderror
            </div>
        </div>
        <br>
        <input type="submit" class="btn btn-primary btn-user" value="Add Client">

    </form>

</x-main-layout-component>