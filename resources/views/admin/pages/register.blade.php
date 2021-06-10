@extends('.admin/layouts/index')

@section('content')
    <div class="page-title-box">
        <div class="row align-items-center">
            <div class="col-sm-6">
                <h4 class="page-title">Dashboard</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-right">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Stexo</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </div>
        </div>
        <!-- end row -->
    </div>
    <!-- end page-title -->
    <div class="row justify-content-center">
        <div class="col-lg-4">
            <div class="card card-pages shadow-none">
                <div class="card-body">
                    <div class="text-center m-t-0 m-b-15">
                        <a href="#" class="logo logo-admin"><img src="{{asset('images/logo-dark.png')}}" alt="" height="24"></a>
                    </div>
                    <h5 class="font-18 text-center">Register</h5>

                    <form class="form-horizontal m-t-30" action="" method="post" id="user-registration-form">
                        @csrf
                        <div class="form-group">
                            <div class="col-12">
                                <label>Full name:</label>
                                <input class="form-control" type="text" required="" placeholder="Full Name" name="fullname">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Email:</label>
                                <input class="form-control" parsley-type="email" type="text" required="" placeholder="Email" name="email">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Profile Preview:</label>
                                <div style="position: relative;width: 100%;height: 200px;">
                                    <img id="photo_preview" src="{{asset('images/no-img.jpg')}}" alt="" style="height: 100%;width: 100%;object-fit: cover">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Select Profile:</label>
                                <input class="form-control-file" type="file" name="avatar" onchange="document.getElementById('photo_preview').src = window.URL.createObjectURL(this.files[0])">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-12">
                                <label>Password:</label>
                                <div>
                                    <input type="password" id="pass2" class="form-control"
                                           data-parsley-minlength="6"
                                           name="password"
                                           required
                                           placeholder="Password"/>
                                </div>
                                <div class="m-t-10">
                                    <input type="password" class="form-control" required
                                           data-parsley-equalto="#pass2"
                                           data-parsley-minlength="6"
                                           placeholder="Re-Type Password"/>
                                </div>
                            </div>
                        </div>

                        <div class="form-group text-center m-t-20">
                            <div class="col-12">
                                <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        setTimeout(function () {
            $('#user-registration-form').on('submit', function (event) {
                event.preventDefault();
                let formData = new FormData(this);
                console.log('submitted')
                $.ajax({
                    url: "{{route('register.store')}}",
                    type: "POST",
                    data:formData,
                    error: function(error){
                        console.log(error)
                        error.responseJSON.forEach(function (err) {
                            alertify.error(err)
                        })
                    },
                    beforeSend: function(){
                        console.log('processing');
                        alertify.success('Processing...')
                    },
                    success: function (response) {
                        alertify.success('User Created Successfully!');
                        let url = '{{asset('images/no-img.jpg')}}';
                        $('#photo_preview').attr('src', url)
                        document.getElementById('user-registration-form').reset();
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                })
            })
        }, 100)
    </script>
    @endsection