<!-- Modal -->
<div class="modal fade" id="delModal{{$tag->idtag}}" tabindex="5" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="tag">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Tag:  <strong>{{$tag->tag}}</strong></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container" align="right">
                    <button class="btn btn-outline-secondary btn-sm" data-dismiss="modal">cancel</button>
                    <a href="admin/tag/delete/{{$tag->idtag}}" title="Delete">
                        <button class="btn btn-outline-danger btn-sm">Delete</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>