<div class="modal fade" id="@slot('modal-fade-id')" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready
                    to Delete?</h5>
                <button class="close" type="button" data-dismiss="modal"
                    aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">@slot('message')</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button"
                    data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#"
                    onclick="event.preventDefault();
                    document.getElementById(@slot('delete-form-id')).submit();">{{ __('Delete') }}
                </a>
                <form id="@slot('delete-form-id')"
                    action="@slot('action-route')"
                    method="POST" class="d-none">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
</div>