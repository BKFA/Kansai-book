<!-- Modal -->
<div class="modal fade" id="updateModal{{ $tag->idtag}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tag</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="admin/tag/update/{{$tag->idtag}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group row">
                            <label for="txtUpdatetag" class="col-sm-2 col-form-label"> Edit : </label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateTag" name="updateTag" value="{{ $tag->tag}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-outline-secondary btn-sm" >refresh</button>
                            <button type="submit" class="btn btn-outline-primary btn-sm">edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>