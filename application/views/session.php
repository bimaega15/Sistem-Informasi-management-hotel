<?php
if ($this->session->has_userdata('success')) { ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success! </strong> <?= $this->session->flashdata('success') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php $this->session->unset_userdata('success'); ?>
<?php
}
if ($this->session->has_userdata('error')) { ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Failed! </strong> <?= $this->session->flashdata('error') ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <?php $this->session->unset_userdata('error'); ?>
<?php
}
