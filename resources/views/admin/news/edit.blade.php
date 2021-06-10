<div class="modal fade" id="news-edit-modal" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0">Edit News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="news-edit-form" class="form-horizontal m-t-5" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="news_id" name="news_id" value="">
                    <div class="form-group">
                        <div class="col-12">
                            <label>Title:</label>
                            <input class="form-control" type="text" required="" placeholder="Eg: Some title, etc" name="title" id="news_title">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <label>Tag:</label>
                            <input class="form-control" type="text" required="" placeholder="Eg: Vacation, etc" name="tag" id="news_tag">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <label>Video:</label>
                            <input class="form-control" type="text" placeholder="Eg: Youtube link" name="video" id="news_video">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <label>Category:</label>
                            <select class="form-control" required="" name="category_id" id="news_category">
                                @forelse($categories as $category)
                                    <option value="{{$category->id}}">{{$category->type}}</option>
                                @empty
                                    <option value="" disabled selected>No categories</option>
                                @endforelse
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <label>Thumbnail Preview:</label>
                            <div style="position: relative;width: 100%;height: 200px;">
                                <img id="news_photo_preview_edit" src="{{asset('images/no-img.jpg')}}" alt="" style="height: 100%;width: 100%;object-fit: cover;object-position: top">
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>Thumbnail:</label>
                            <input class="form-control-file" type="file" name="thumbnail" onchange="document.getElementById('news_photo_preview_edit').src = window.URL.createObjectURL(this.files[0])">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-12">
                            <label for="">Content</label>
                            <textarea name="" id="news_content_edit" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Update</button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace( 'news_content_edit' );
    setTimeout(function () {
        $('#news-edit-form').on('submit', function (e) {
            e.preventDefault();
            let formData = new FormData(this);
            formData.append('news_content', CKEDITOR.instances['news_content_edit'].getData());
            $.ajax({
                url: "{{route('news.update')}}",
                type: "POST",
                data: formData,
                error: function (error) {
                    console.log(error);
                    alertify.error('Seems like some technical error. Please try again.')
                },
                beforeSend: function () {
                    alertify.success('Processing...')
                },
                success: function (response) {
                    if(response.status == true){
                        alertify.success('Updated successfully!')
                    }else if(response.status == false){
                        alertify.error('Operation failed!')
                    }
                    document.getElementById('news-add-form').reset();
                    $('#news-edit-modal').modal('toggle');
                    $('#news-datatable').DataTable().ajax.reload(null, false);
                },
                cache: false,
                contentType: false,
                processData: false
            })
        })
    },100)
</script>