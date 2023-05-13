<div class="modal fade" id="{{ $modal_fade_id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                    {{ $message }}
                </h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">{{ $message2 }}</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="#" onclick="event.preventDefault();
            document.getElementById('{{ $form_id }}').submit();">
                    Delete
                </a>
                <form id="{{ $form_id }}" action="{{ $action }}" method="POST" class="d-none">
                    @csrf
                    @method('delete')
                </form>
            </div>
        </div>
    </div>
</div>