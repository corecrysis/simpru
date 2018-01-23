@extends('layouts.app')
@section('title', 'Home')
@section('main-content')
      <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
          <div class="container mv-mt-50">
            <ul class="breadcrumb-1-list">
              <li><a href="index.php"><i class="fa fa-home"></i></a></li>
              <li><a>Daftar</a></li>
            </ul>
          </div>
        </div>
      </section>
      <!-- .main-breadcrumb-->

      <section class="mv-main-body login-main mv-bg-gray mv-wrap">
        <div class="container">
          <div class="row">
       
            <div class="col-sm-6 col-centered col-register">
              <div class="mv-form-style-1 mv-box-shadow-gray-1">
                <form method="GET" class="form-register">
                  <div class="form-header">
                    <div class="mv-title-style-13">
                      <div class="text-main">Buat Akun</div>
                      <div class="text-sub">Buat akun untuk memesan, mengetahui ordermu, dan investasi</div>
                    </div>
                  </div>
                  <!-- .form-header-->

                  <div class="form-body">
                    <div class="mv-form-group">
                      <div class="mv-label"> <strong class="text-uppercase">Nama<span class="mv-color-primary"> *</span></strong></div>
                      <div class="mv-field">
                        <input type="nama" name="test127" class="mv-inputbox mv-inputbox-style-1" required/>
                      </div>
                    </div>
					
					<div class="mv-form-group">
                      <div class="mv-label"> <strong class="text-uppercase">NRP/NIP/NIK<span class="mv-color-primary"> *</span></strong></div>
                      <div class="mv-field">
                        <input type="nama" name="test127" class="mv-inputbox mv-inputbox-style-1" required/>
                      </div>
                    </div>
					
					<div class="mv-form-group">
                        <div class="mv-label"><strong class="text-uppercase">Jenis Pengguna<span class="mv-color-primary"> *</span></strong></div>
                            <div class="mv-field">
                                <label class="mv-select mv-select-style-1 h-40">
                                    <select>
                                        <option>Pengguna Internal</option>
                                        <option>Pengguna Eksternal</option>
                                    </select>
                                </label>
                            </div>
                    </div>
					
					<div class="mv-form-group">
                      <div class="mv-label"> <strong class="text-uppercase">Email<span class="mv-color-primary"> *</span></strong></div>
                      <div class="mv-field">
                        <input type="email" name="test127" class="mv-inputbox mv-inputbox-style-1" required/>
                      </div>
                    </div>

                    <div class="mv-form-group">
                      <div class="mv-label"> <strong class="text-uppercase">Kata Sandi</strong></div>
                      <div class="mv-field">
                        <input type="password" name="test127" class="mv-inputbox mv-inputbox-style-1" required/>
                      </div>
                    </div>

                    <div class="mv-form-group">
                      <div class="mv-label"> <strong class="text-uppercase">Ketik Ulang Kata Sandi</strong></div>
                      <div class="mv-field">
                        <input type="password" name="test127" class="mv-inputbox mv-inputbox-style-1" required/>
                      </div>
                    </div>

                    <div class="mv-form-group submit-button mv-mt-30">
                      <button type="submit" class="mv-btn mv-btn-block mv-btn-style-5 btn-signup">Daftarkan saya</button>
                    </div>
                  </div>
                  <!-- .form-body-->
                </form>
                <!-- .form-register-->
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- .mv-main-body-->
@endsection
