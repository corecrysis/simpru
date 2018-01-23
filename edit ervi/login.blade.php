@extends('layouts.app')
@section('title', 'Home')
@section('main-content')
	<div class="clearfix">
      <section class="main-breadcrumb mv-wrap">
        <div class="mv-breadcrumb-style-1">
          <div class="container mv-mt-50">
            <ul class="breadcrumb-1-list">
              <li><a href="index.php"><i class="fa fa-home"></i></a></li>
              <li><a>Masuk</a></li>
            </ul>
          </div>
        </div>
      </section>
      <!-- .main-breadcrumb-->

      <section class="mv-main-body login-main mv-bg-gray mv-wrap">
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-centered col-login">
              <div class="mv-form-style-1 mv-box-shadow-gray-1">
                <form method="POST" class="form-login">
                  <div class="form-header mv-mb-0">
                    <div class="mv-title-style-13">
                      <div class="text-main">Masuk</div>
                    </div>
                    <hr>
                  </div>
                  <!-- .form-header-->

                  <div class="form-body">
					  
                    <div class="mv-form-group">
                      <div class="mv-label"> <strong class="text-uppercase">NRP/NIP/NIK</strong></div>
                      <div class="mv-field">
                        <input type="nrp" name="test127" class="mv-inputbox mv-inputbox-style-1" required/>
                      </div>
                    </div>

                    <div class="mv-form-group">
                      <div class="mv-label"> <strong class="text-uppercase">Kata Sandi</strong></div>
                      <div class="mv-field">
                        <input type="password" name="test127" class="mv-inputbox mv-inputbox-style-1" required/>
                      </div>
                    </div>

                    <div class="mv-form-group submit-button mv-mb-0" style="display: inline-block;vertical-align: baseline;">
                      <label class="mv-checkbox mv-checkbox-style-1 checkbox-remember">
                        <input type="checkbox" name="test138" class="hidden"/><span class="checkbox-after-input"><span class="checkbox-visual-box"><span class="icon-checked fa fa-check"></span></span><span class="checkbox-text">Ingat saya</span></span>
                      </label>
                    </div>
                    <div class="mv-form-group submit-button mv-mb-0" style="display: inline-block;vertical-align: baseline;float:right;">
                      <div class="mv-form-group"><a href="lupa-password.php" class="btn-forgot-pass">Lupa password?</a></div>
                    </div>
                    <div class="mv-mb-20">
                      <button type="submit" class="mv-btn mv-btn-block mv-btn-style-5 btn-login">Masuk</button>
                   </div>
                    <div class="mv-form-group submit-button mv-mb-0">
                      <div class="mv-form-group">Belum punya akun? <a href="signup.php" class="btn-forgot-pass">Daftar disini</a></div>
                    </div>
                  </div>
                  <!-- .form-body-->
                </form>
                <!-- .form-login-->
              </div>
            </div>
         </div>
        </div>
      </section>
      <!-- .mv-main-body-->
	</div>
@endsection
