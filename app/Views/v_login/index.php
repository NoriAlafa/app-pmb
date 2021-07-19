<?=$this->extend('layouts_peserta/template_peserta')?>

<?=$this->section('header')?>
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">
            <h1 class="logo mr-auto">
                <a href="<?=base_url('/');?>">
                    <span>Alfa University</span>
                </a>
            </h1>
        </div>
    </header>
<?=$this->endSection()?>

<?=$this->section('content')?>
    <main id="main">
        <!-- ======BREADCRUMBS====== -->
        <section class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Login</h2>
                    <ol>
                        <li><a href="<?= base_url('/');?>">HOME</a></li>
                        <li>Login</li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- ======AKHIR BREADCRUMBS====== -->


        <!-- ======LOGIN====== -->
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">
                <div class="section-title">
                    <h3><span>Halaman Login</span></h3>
                    <p>Pendaftaran Mahasiswa Alfa University</p>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-6" data-aos="zoom-out" data-aos-delay="100">
                        <img src="/assets/BizLand/img/about.jpg" class="img-fluid" alt="">
                    </div>
                    <div class="col-lg-6">
                        <form id="formLogin" role="form" class="php-email-form">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="icofont-email"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control" name="email" placeholder="Masukkan EmailMu">
                            </div>
                            <small id="email-error" class="form-text text-danger mb-3"></small>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span  id ="basic-addon1" class="input-group-text">
                                        <i id="show-password" class="icofont-eye-blocked"></i>
                                    </span>
                                </div>
                                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                            </div>
                            <small id="password-error" class="form-text text-danger mb-3"></small>
                            <div class="text-center mb-2">
                                <button class="col-lg" id="btn-login" type="submit">Login</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- ======AKHIR LOGIN====== -->    
    </main>
<?=$this->endSection()?>

<?=$this->section('script')?>
    <script>
        $(document).ready(function(){
            //show password
            $('#show-password').on('click',function(){
                if($(this).hasClass('icofont-eye-blocked')){
                    $('#password').attr('type' , 'text');
                    $(this).removeClass('icofont-eye-blocked');
                    $(this).addClass('icofont-eye');
                }else{
                    $('#password').attr('type' , 'password');
                    $(this).removeClass('icofont-eye');
                    $(this).addClass('icofont-eye-blocked');
                }
            });

            //submit pendaftaran user
            $('#btn-login').on('click' , function(){
                const formLogin = $('#formLogin');

                $.ajax({
                    url:"login/cekUser",
                    method:"POST",
                    data:formLogin.serialize(),
                    dataType:"JSON",
                    success: function(data){
                        //login error
                        if(data.error){
                            if(data.login_error['email']!='') $('#email_error').html(data.login_error['email']);
                            else $('#email_error').html('');

                            if(data.login_error['password']!='') $('#password_error').html(data.login_error['password']);
                            else $('#password_error').html('');
                        }

                        //login succes
                        if(data.success){
                            formLogin.trigger('reset');
                            $('#email_error').html('');
                            $('#password_error').html('');
                            Swall.fire({
                                position:'top-end',
                                icon:'success',
                                title:'Login Berhasil',
                                showConfirmButton:false,
                                timer:1500
                            });
                            window.location.replace(data.link);
                        }
                    }
                });
            });
        });
    </script>
<?=$this->endSection()?>