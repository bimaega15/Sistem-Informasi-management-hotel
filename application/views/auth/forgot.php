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
                    <div class="row">
                        <div class="col">
                            <div class="logo-box"><a href="#" class="logo-text">Forgot Password</a></div>
                            <form method="post" action="<?= base_url('Forgot/process') ?>">
                                <input type="hidden" name="redirect" value="<?= @$_GET['redirect'] ?>">

                                <div class="form-group">
                                    <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Enter username">
                                </div>
                                <button type="submit" class="btn btn-primary btn-block btn-submit">Submit</button>
                                <div class="auth-options">

                                    <a href="#" class="forgot-link">Already Account? Sign in</a>
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