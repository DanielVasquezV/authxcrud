<!-- Modal -->
<div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="modalDeleteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="{{ route('user.delete') }}" method="post">
                {{ csrf_field() }}
                <input type="hidden" name="user_id" id="delete_id"> 
                <div class="modal-body">
                    <center>
                        <h1 class="mt-4">Estas seguro?</h1>
                        <h6>Esta acción es irreversible</h6>
                    </center>
                </div>
                <div class="row" style="margin-bottom: 50px; text-align: center;">
                    <div class="col-sm-3"></div>
                    <div class="col-sm-3">
                        <button type="button" class="btn btn-danger btn-modal" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-success btn-modal">Si, eliminar</button>
                    </div>
                    <div class="col-sm-3"></div>
                </div>
            </form>
        </div>
    </div>
</div>