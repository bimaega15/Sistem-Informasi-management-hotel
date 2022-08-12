<div class='loader'>
    <div class='spinner-grow text-primary' role='status'>
        <span class='sr-only'>Loading...</span>
    </div>
</div>
<div class="connect-container align-content-stretch d-flex flex-wrap">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="auth-form">
                    <?php $this->view('session'); ?>
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <div class="col">
                            <div class="logo-box"><a href="#" class="logo-text">Connect</a></div>
                            <form method="post" action="<?= base_url('Login/process') ?>">
                                <input type="hidden" name="redirect" value="<?= @$_GET['redirect'] ?>">
                                <div class="form-group">
                                    <input name="username" type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-submit">Sign In</button>
                                <div class="auth-options">
                                    <div class="custom-control custom-checkbox form-group">
                                        <input name="remember" type="checkbox" class="custom-control-input" id="exampleCheck1">
                                        <label class="custom-control-label" for="exampleCheck1">Remember me</label>
                                    </div>
                                    <a href="<?= base_url('Forgot') ?>" class="forgot-link">Forgot Password?</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block d-xl-block">
                <div class="auth-image"></div>
            </div>
        </div>
    </div>
</div>