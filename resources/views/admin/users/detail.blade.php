<x-master-layout>
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">Account Settings</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Profile</a>
                                    </li>
                                    <li class="breadcrumb-item active"> Account Settings
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                @if (session()->has('message'))
                <div class="alert alert-primary alert-dismissible fade show" role="alert">
                    <div class="alert-body"><strong>{{ session('message') }}</strong></div>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                <section id="page-account-settings">
                    <div class="row">
                        <div class="col-md-3 mb-2 mb-md-0">
                            <ul class="nav nav-pills flex-column nav-left">
                                <li class="nav-item">
                                    <a class="nav-link active" id="account-pill-general" data-toggle="pill" href="#account-vertical-general" aria-expanded="true">
                                        <i data-feather="user" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">General</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="account-pill-password" data-toggle="pill" href="#account-vertical-password" aria-expanded="false">
                                        <i data-feather="lock" class="font-medium-3 mr-1"></i>
                                        <span class="font-weight-bold">Change Password</span>
                                    </a>
                                </li>
                                </ul>
                        </div>
                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general" aria-labelledby="account-pill-general" aria-expanded="true">
                                            <form action="{{ route('update.profile.setting') }}" method="POST" enctype="multipart/form-data" class="validate-form mt-2">
                                                @csrf
                                                <div class="form-group">
                                                    <div class="media">
                                                        <div class="media-body mt-75">
                                                            <div class="form-group mb-2">
                                                                <div class="row">
                                                                    <div class="col-6">
                                                                        <div class="media flex-column">
                                                                            <div class="media-body mt-1 w-100">
                                                                                <div class="d-inline-block">
                                                                                    <div class="form-group mb-0">
                                                                                        <div class="custom-file mb-1">
                                                                                            <input name="image" type="file" class="custom-file-input" id="image-crop" accept="image/png, image/jpeg, image/jpg" />
                                                                                            @if ($errors->has('image'))<span class="text-danger">{{$errors->first('image')}}</span>@endif
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-6">
                                                                        <input type="hidden" name="16_9_width" id="16_9_width"/>
                                                                        <input type="hidden" name="16_9_height" id="16_9_height"/>
                                                                        <input type="hidden" name="16_9_x" id="16_9_x"/>
                                                                        <input type="hidden" name="16_9_y" id="16_9_y"/>

                                                                        <input type="hidden" name="4_3_width" id="4_3_width"/>
                                                                        <input type="hidden" name="4_3_height" id="4_3_height"/>
                                                                        <input type="hidden" name="4_3_x" id="4_3_x"/>
                                                                        <input type="hidden" name="4_3_y" id="4_3_y"/>

                                                                        <input type="hidden" name="1_1_width" id="1_1_width"/>
                                                                        <input type="hidden" name="1_1_height" id="1_1_height"/>
                                                                        <input type="hidden" name="1_1_x" id="1_1_x"/>
                                                                        <input type="hidden" name="1_1_y" id="1_1_y"/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <p>Hanya JPG atau PNG. Maksimal ukuran 1 Mb</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <h5 class="text-primary" for="account-name">Name</h5>
                                                            <input type="hidden" class="form-control" id="account-name" name="id" value="{{ $data['user']->id }}" />
                                                            <input type="text" class="form-control" id="account-name" name="name" placeholder="Name" value="{{ $data['user']->name }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <h5 class="text-primary" for="account-e-mail">E-mail</h5>
                                                            <input type="email" class="form-control" id="account-e-mail" name="email" placeholder="Email" value="{{ $data['user']['email'] }}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary mt-2 mr-1">Simpan</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                        <div class="tab-pane fade" id="account-vertical-password" role="tabpanel" aria-labelledby="account-pill-password" aria-expanded="false">
                                            <form id="jquery-val-form" action="{{ route('password-profile') }}" method="post">
                                                @csrf
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <h5 class="text-primary" for="account-new-password">Password Baru</h5>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" id="password" name="password" class="form-control" placeholder="New Password" />
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer">
                                                                        <i data-feather="eye"></i>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <h5 class="text-primary" for="account-retype-new-password">Konfirmasi Password</h5>
                                                            <div class="input-group form-password-toggle input-group-merge">
                                                                <input type="password" class="form-control" id="confirm_password" name="confirm-new-password" placeholder="New Password" />
                                                                <div class="input-group-append">
                                                                    <div class="input-group-text cursor-pointer"><i data-feather="eye"></i></div>
                                                                </div>
                                                            </div>
                                                            <span id='message'></span>
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <button type="submit" disabled class="btn btn-primary mr-1 mt-1">Save changes</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    @include('admin.components.imagecropuser')

    @push('styles')
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('app-assets/css/plugins/forms/pickers/form-flat-pickr.css')}}">
    @endpush

    @push('scripts')
        <script src="{{asset('app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js')}}"></script>
        <script src="{{asset('app-assets/js/scripts/forms/pickers/form-pickers.js')}}"></script>
        <script src="{{asset('app-assets')}}/vendors/js/charts/apexcharts.min.js"></script>
        <script src="{{asset('app-assets')}}/vendors/js/extensions/toastr.min.js"></script>
        <script src="{{asset('app-assets/js/scripts/pages/dashboard-ecommerce.js')}}"></script>

        <script>
            $('#password, #confirm_password').on('keyup', function () {
                if ($('#password').val() == $('#confirm_password').val()) {
                    $('#message').html('Konfirmasi Password Benar.').css('color', 'green');
                    $(':input[type="submit"]').prop('disabled', false);
                }else{
                    $('#message').html('Password tidak sama').css('color', 'red');
                }
            });


        </script>

    @endpush
</x-master-layout>
