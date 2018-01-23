@extends('layouts.app')
@section('title', 'Dashboard')
@section('beranda-active', 'active')
@section('main-content')
    <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
            <div class="container mv-mt-50">
                <ul class="breadcrumb-1-list">
                    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i></a></li>
                    <li><a>{{ Auth::user()->name }}</a></li>
                    <li><a>Profil</a></li>
                </ul>
            </div>
        </div>
    </section>
    <section class="mv-main-body product-grid-3-main  mv-bg-pattern-subtle mv-wrap">
        <div class="container">
            <div class="row">
                <div class="mv-c-s-content col-xs-12 col-md-12 col-lg-12">
                    <div class="block-style">
                        <div class="mv-block-style-32">
                            <div class="block-32-form mv-box-shadow-gray-1" style="margin-top: -3em;">
                                <!-- .block-32-form-title-->
                                <div class="mv-title-style-2" style="margin:-5em 0 2em 0;">
                                    <div class="title-2-inner"><span class="main">PROFIL PENGGUNA</span></div>
                                </div>
                                <div class="block-32-form-main">
                                    <form method="POST" class="form-contact mv-form-horizontal" action="{{ url('pengguna/update') }}">
                                        {{ method_field('PUT') }}
                                        {{ csrf_field() }}
                                        @if(session()->has('messages'))
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="alert alert-{{ session()->get('messages')[1] }} alert-dismissible">
                                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                                        <h5><i class="icon fa fa-{{ session()->get('messages')[2] }}"></i> {{ ucfirst(session()->get('messages')[1]) }}</h5>
                                                        {{ session()->get('messages')[0] }}
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                        <div class="row">

                                            {{--<div class="col-md-3 text-center mv-mt-30">--}}
                                                {{--<a class="dp-edit" href="javascript:void(0)">--}}
                                                    {{--<div class="new-profile-pic-container" style="border-radius:0%">--}}
                                                        {{--<div id="image-preview" class="filled-state">--}}
                                                            {{--<img id="img-dp" src="" alt=""/>--}}
                                                        {{--</div>--}}
                                                        {{--<div class="empty-state" style="border-radius:0%;">--}}
                                                            {{--<div class="overlay">--}}
                                                                {{--<h1>+</h1>--}}
                                                                {{--<p>UPLOAD PICTURE</p>--}}
                                                            {{--</div>--}}
                                                        {{--</div>--}}
                                                    {{--</div>--}}
                                                {{--</a>--}}
                                                {{--<input type="file" id="file" class="dp-upload"/>--}}
                                            {{--</div>--}}

                                            <div class="col-md-12">
                                                <div class="col-sm-12">
                                                    <div class="mv-form-group">
                                                        <div class="col-md-3 mv-label"><strong class="text-uppercase">Nama
                                                                Lengkap</strong></div>
                                                        <div class="col-md-9 mv-field">
                                                            <div class="mv-inputbox-icon">
                                                                <input type="text" name="name" value="{{ $data->name }}"
                                                                       class="mv-inputbox mv-inputbox-style-2"/><i
                                                                        class="icon fa fa-user"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="mv-form-group">
                                                        <div class="col-md-3 mv-label"><strong class="text-uppercase">NRP/NIP/NIK</strong>
                                                        </div>
                                                        <div class="col-md-9 mv-field">
                                                            <div class="mv-inputbox-icon">
                                                                <input type="text" name="identifier" value="{{ $data->identifier }}"
                                                                       class="mv-inputbox mv-inputbox-style-2"/><i
                                                                        class="icon fa fa-list-ol"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="mv-form-group">
                                                        <div class="col-md-3 mv-label"><strong class="text-uppercase">Jenis
                                                                Pengguna</strong></div>
                                                        <div class="col-md-9 mv-field">
                                                            <div class="mv-radio-list">
                                                                <label class="mv-radio mv-radio-style-1 mv-radio-inline">
                                                                    <input type="radio" name="tipe" value="internal" {{ $data->keanggotaan =='internal' ? 'checked' : '' }}
                                                                           class="hidden"/><span
                                                                            class="radio-after-input"><span
                                                                                class="radio-visual-box"><span
                                                                                    class="icon-checked fa fa-check"></span></span><span
                                                                                class="radio-text">Pengguna Internal</span></span>
                                                                </label>
                                                                <label class="mv-radio mv-radio-style-1 mv-radio-inline">
                                                                    <input type="radio" name="tipe" value="eksternal" {{ $data->keanggotaan =='eksternal' ? 'checked' : '' }}
                                                                           class="hidden"/><span
                                                                            class="radio-after-input"><span
                                                                                class="radio-visual-box"><span
                                                                                    class="icon-checked fa fa-check"></span></span><span
                                                                                class="radio-text">Pengguna Eksternal</span></span>
                                                                </label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="mv-form-group">
                                                        <div class="col-md-3 mv-label"><strong
                                                                    class="text-uppercase">Email</strong></div>
                                                        <div class="col-md-9 mv-field">
                                                            <div class="mv-inputbox-icon">
                                                                <input type="text" name="email" value="{{ $data->email }}"
                                                                       class="mv-inputbox mv-inputbox-style-2"/><i
                                                                        class="icon fa fa-envelope"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-sm-12">
                                                    <div class="mv-form-group">
                                                        <div class="col-md-3 mv-label"><strong class="text-uppercase">Nomor
                                                                Telepon</strong></div>
                                                        <div class="col-md-9 mv-field">
                                                            <div class="mv-inputbox-icon">
                                                                <input type="text" name="no_hp" value="{{ $data->no_hp }}"
                                                                       class="mv-inputbox mv-inputbox-style-2"/><i
                                                                        class="icon fa fa-phone"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="mv-form-group submit-button mv-mt-20">
                                                    <div class="col-md-12 mv-field">
                                                        <button type="submit" class="mv-btn mv-btn-style-1" style="float: right;"><span
                                                                    class="btn-inner"><i
                                                                        class="btn-icon fa fa-edit"></i><span
                                                                        class="btn-text">UBAH DATA</span></span></button>
                                                    </div>
                                                </div>

                                            </div>

                                        </div>
                                    </form>
                                    <!-- .form-contact-->
                                </div>
                                <!-- .block-32-form-main-->
                            </div>
                        </div>
                        <!-- .mv-c-s-content-->
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
    <script>
        function changedp() {
            var x = $(".new-profile-pic-container img").length;
            if (x > 0) {
                $(".new-profile-pic-container .empty-state p").text("Change picture");
            }
            ;

            $(".dp-edit").click(function () {
                $(".dp-upload").click();
            });
        }

        changedp();
        $(document).ready(function (e) {
            $(function () {
                $("#file").change(function () {
                    $("#message").empty(); // To remove the previous error message
                    var file = this.files[0];
                    var imagefile = file.type;
                    var match = ["image/jpeg", "image/png", "image/jpg"];
                    if (!((imagefile == match[0]) || (imagefile == match[1]) || (imagefile == match[2]))) {
//                        $('#img-dp').attr('src', 'avatar/display.png');
                        alert('File yang diunggah bukan images!');
                        return false;
                    }
                    else {
                        var reader = new FileReader();
                        reader.onload = imageIsLoaded;
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            });

            function imageIsLoaded(e) {
                $('#image_preview').css("display", "block");
                $('#img-dp').attr('src', e.target.result);
            };
        });

    </script>
@endsection
