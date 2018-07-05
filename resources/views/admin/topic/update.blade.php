<!-- Modal -->
<div class="modal fade" id="EditModal{{$tp->idtopic}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Topic</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container">
                    <form action="admin/topic/update/{{$tp->idtopic}}" method="POST">
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="form-group row">
                            <label for="txtNameTopic" class="col-sm-2 col-form-label">Name Topic</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateNameTopic" name="updateNameTopic" value="{{$tp->nametopic}}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="txttxtAnsinameTopic" class="col-sm-2 col-form-label">Name Topic</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="updateSuaVien" name="updateansiNameTopic" value="{{$tp->ansinametopic}}">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="reset" class="btn btn-secondary" >Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>