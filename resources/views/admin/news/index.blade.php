@extends('admin.layouts.index')

@section('content')
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked + .slider {
            background-color: #02C58D;
        }

        input:focus + .slider {
            box-shadow: 0 0 1px #02C58D;
        }

        input:checked + .slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }
    </style>
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">News</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">E Samachar</a></li>
                    <li class="breadcrumb-item active">News</li>
                </ol>
            </div>
        </div>
    </div>

    @include('admin.news.add')
    @include('admin.news.edit')
    <div class="row">
        <div class="col-lg-3 col-md-12">
            <div style="position: relative;margin-top: 26px">
                <button class="btn btn-primary" data-toggle="modal" data-target="#news-add-modal"><i class="fas fa-plus mr-2"></i>Create New</button>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card mt-2">
                <div class="card-body">
                    <table id="news-datatable" class="table table-bordered table-striped table-responsive-lg table-responsive-xl table-responsive-md nowrap" style="border-collapse: collapse;border-spacing: 0;width: 100%!important;">
                        <thead>
                        <tr>
                            <th>Title</th>
                            <th>Tag</th>
                            <th>Category</th>
                            <th>Content</th>
                            <th>Video</th>
                            <th>Thumbnail</th>
                            <th>Status</th>
                            <th style="max-width: 200px">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>

        setTimeout(function () {
            $('#news-datatable').DataTable({
                "processing": true,
                "severside": true,
                "ajax": "{{route('news.getNews')}}",
                "columns": [
                    {"data": null, "render": function (data) {
                            let len = data.title.length;
                            let desc = data.title;
                            if(len > 30){
                                desc = desc.substring(1, 30)
                                return desc+'...'
                            }else {
                                return desc
                            }
                        }},
                    {"data": "tag"},
                    {"data": "category"},
                    {"data": null, "render": function (data) {
                            let len = data.news_content.length;
                            let desc = data.news_content;
                            if(len > 20){
                                desc = desc.substring(1, 20)
                                return desc+'...'
                            }else {
                                return desc
                            }
                        }},
                    {"data": null, "render": function (data) {
                            if(data.video != null){
                                let len = data.video.length;
                                let desc = data.video;
                                if(len > 20){
                                    desc = desc.substring(1, 20)
                                    return desc+'...'
                                }else {
                                    return desc
                                }
                            }else {
                                return ''
                            }
                        }},
                    {"data": null, "render": function (data) {
                            return '<img src="{{asset('')}}'+''+data.thumbnail+'" height="80px" width="80px" style="object-fit: cover;" />'
                        }},
                    {"data": null, "render": function (data) {
                            if (data.status == true){
                                return '<label class="switch">\n' +
                                    '  <input type="checkbox" onclick="changeStatus('+data.id+')" checked>' +
                                    '  <span class="slider round"></span>\n' +
                                    '</label>'
                            }else {
                                return '<label class="switch">\n' +
                                    '  <input type="checkbox" onclick="changeStatus('+data.id+')">' +
                                    '  <span class="slider round"></span>' +
                                    '</label>'
                            }
                        }},
                    {"data": null, "render": function (data) {
                            return '<div style="width: 100%;position: relative;"><button type="submit" class="btn btn-danger waves-effect waves-light delBtn" onclick="destroyNews('+data.id+')"><i class="fas fa-trash-alt mr-1"></i>Delete</button><button class="btn btn-primary waves-effect waves-light ml-1" onclick="editNews('+data.id+')"><i class="far fa-edit mr-1"></i>Edit</button></div>'
                        }
                    },
                ],
            });
        }, 500);

        function changeStatus(id) {
            let url = '{{route('news.status', ':id')}}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                error: function(error){
                    console.log(error)
                },
                beforeSend: function(){
                    alertify.success('Changing...')
                },
                success: function () {
                    $('#news-datatable').DataTable().ajax.reload(null, false);
                    alertify.success('Status changed successfully!')
                }
            })
        }

        function destroyNews(id) {
            let url = '{{route('news.destroy', ':id')}}';
            url = url.replace(':id', id);
            alertify.confirm('Are you sure to continue?',
                function () {
                    $.ajax({
                        url: url,
                        type: "GET",
                        error: function (error) {
                            console.log(error)
                        },
                        beforeSend: function () {
                            alertify.success('Deleting...')
                        },
                        success: function (response) {
                            if(response.status == true){
                                alertify.success('Deleted successfully!')
                            }else if(response.status == false){
                                alertify.error('Operation failed!')
                            }
                            $('#news-datatable').DataTable().ajax.reload(null, false);
                        }
                    })
                }, function () {
                    alertify.error('Cancelled')
                });
        }


        function editNews(id) {
            let url = '{{route('news.edit', ':id')}}';
            url = url.replace(':id', id);
            $.ajax({
                url: url,
                type: "GET",
                error: function (err) {
                    console.log(err)
                },
                beforeSend: function () {
                    alertify.success('Loading...')
                },
                success: function (response) {
                    let image_path="{{asset('')}}";
                    $('#news-edit-modal').modal('toggle');
                    $('#news_id').val(response.data.id);
                    $('#news_title').val(response.data.title);
                    $('#news_tag').val(response.data.tag);
                    $('#news_video').val(response.data.video);
                    document.getElementById('news_photo_preview_edit').src = image_path+response.data.thumbnail;
                    CKEDITOR.instances['news_content_edit'].setData(response.data.news_content);
                    $('#news_category').val(response.data.category_id);
                }
            })
        }
    </script>
@endsection

