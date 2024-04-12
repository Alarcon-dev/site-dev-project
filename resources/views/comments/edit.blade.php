{{-- <div class="modal fade" id="editCommentModal{{ $comentario->id_comment }}" tabindex="-1" role="dialog" aria-labelledby="editCommentModalLabel{{ $comentario->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCommentModalLabel{{ $comentario->id_comment }}">Editar Comentario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('comment.update', $comentario->id_comment) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="comment_content">Contenido del Comentario</label>
                        <textarea class="form-control" id="comment_content" name="comment_content" rows="3">{{ $comentario->comment_content }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="comment_image">Imágenes</label>
                        <input type="file" class="form-control-file" id="comment_image" name="comment_image[]" multiple>
                        <small class="form-text text-muted">Puedes subir varias imágenes.</small>
                    </div>

                    <button type="submit" class="btn btn-primary">Actualizar Comentario</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div> --}}

  <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Save changes</button>
          </div>
        </div>
      </div>
    </div>