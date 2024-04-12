<!-- create_comment.blade.php -->

<div class="row justify-content-center">
    <div class="col-md-10">
        <form method="POST" action="{{ route('comment.store') }}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="publication_id" value="{{ $publication->id_publication }}">
            <div class="form-group row mb-4">
                <input type="text" id="comment_content{{ $publication->id_publication }}" class="form-control col-10 @error('comment_content' . $publication->id_publication) is-invalid @enderror" name="comment_content" required>{{ old('comment_content') }}
                @error('comment_content')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="files_{{ $publication->id_publication }}" class="btn btn-light col-2">
                    <i class="fas fa-image fa-5x mr-2"></i>
                </label>
                <input type="file" id="files_{{ $publication->id_publication }}" name="comment_image[]" accept="image/*" multiple style="display: none;">
                <div id="imagePreview_{{ $publication->id_publication }}"></div>
            </div>
            <script>
                document.getElementById('files_{{ $publication->id_publication }}').addEventListener('change', function() {
                    var imagePreview = document.getElementById('imagePreview_{{ $publication->id_publication }}');
                    imagePreview.innerHTML = "";

                    for (var i = 0; i < this.files.length; i++) {
                        var file = this.files[i];

                        if (!file.type.startsWith('image/')) {
                            continue;
                        }

                        var reader = new FileReader();
                        reader.onload = function(e) {
                            var img = document.createElement('img');
                            img.src = e.target.result;
                            img.classList.add('img-thumbnail', 'mr-2', 'mb-2');
                            img.style.maxWidth = '150px';
                            imagePreview.appendChild(img);
                        };
                        reader.readAsDataURL(file);
                    }
                });
            </script>
            <div class="row mb-2">
                <div class="col-md-7 offset-md-0">
                    <button type="submit" class="btn btn-primary">{{ __('Crear comentario') }}</button>
                </div>
            </div>
        </form>
    </div>
</div>
