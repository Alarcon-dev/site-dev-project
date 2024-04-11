@include('includes.alerts')
<div class="col-md-10">
    <form method="POST" action="{{ route('comment.store') }}">
        @csrf
         <div class="row justify-content-center">
                    <div class="col-md-10">
                        <form method="POST" action="{{ route('comment.store') }}" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="publication_id" value="{{ $publication->id_publication }}">
                            <div class="form-group row mb-4">
                                <input type="text" id="comment_content_{{ $publication->id_publication }}"
                                    class="form-control col-10 @error('comment_content_' . $publication->id_publication) is-invalid @enderror"
                                    name="comment_content_{{ $publication->id_publication }}"
                                    required>{{ old('comment_content_' . $publication->id_publication) }}

                                @error('comment_content_' . $publication->id_publication)
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                                <label for="files_{{ $publication->id_publication }}" class="btn btn-light col-2">
                                    <i class="fas fa-image fa-5x mr-2"></i>
                                </label>
                                <input type="file" id="files_{{ $publication->id_publication }}"
                                    name="comment_image_{{ $publication->id_publication }}[]" accept="image/*" multiple
                                    style="display: none;">
                                <div id="imagePreview_{{ $publication->id_publication }}"></div>
                            </div>
                            
                            <div class="row mb-2">
                                <div class="col-md-7 offset-md-0">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Crear comentario') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

        </div>
    </form>
</div>