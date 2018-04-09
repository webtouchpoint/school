{{-- Delete Confirmation Modal --}}
<div class="modal fade" id="{{ $modal_id }}">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          &times;
        </button>
        <h4 class="modal-title">Please Confirm</h4>
      </div> <!-- ./modal-header -->
      <div class="modal-body">
        <p class="lead">
          <i class="fa fa-question-circle fa-lg"></i> &nbsp;
            {{ $slot }}
        </p>
      </div> <!-- ./modal-body -->
      <div class="modal-footer">
        <form method="POST" :action="url">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
          <input type="hidden" name="del_tag" id="delete-tag-slug">
          <button type="button" class="btn btn-default" data-dismiss="modal">
            Cancel
          </button>
          <button type="submit" class="btn btn-danger">
            Delete
          </button>
        </form>
      </div> <!-- ./modal-footer -->
    </div> <!-- ./modal-content -->
  </div> <!-- ./modal-dialog -->
</div> <!-- ./modal -->