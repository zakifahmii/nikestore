<section class="loker" id="loker">
    <div class="container">
        <div class="main-text">
            <h1 class="text-success-emphasis"><span>.S</span>nickers</h1>
        </div>
        <div class="row">
            <div class="col-md-3 py-md-0">
                <div class="casd">

                </div>
            </div>
            <div class="col-md-6 py-3 py-md-2 ">
                <?= $this->session->flashdata('pesan'); ?>
                <form class="user" method="post" action="<?= base_url('auth'); ?>">
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" value="<?= set_value('username'); ?>"
                            id="username" placeholder="Masukkan Username" name="username">
                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control form-control-user" id="password"
                            placeholder="Password" name="password">
                        <?= form_error(
                            'password',
                            '<small class="text-danger pl-3">',
                            '</small>'
                        ); ?>
                    </div><br>
                    <button type="submit" class="btn btn-primary btn-user btn-block">
                        Masuk
                    </button>
                </form>
                <div class="text-center">
                    <a class="small" href="<?=
                                            base_url('auth/lupaPassword'); ?>">Lupa Password?</a>
                </div>
                <div class="text-center">
                    <a class="small" href="<?=
                                            base_url('auth/registrasi'); ?>">Daftar Member!</a>
                </div>
            </div>
        </div>
</section>