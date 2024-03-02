<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:600px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/deactivate-profile-api']); ?>
            <?= csrf_field() ?>

            <div class="p-3 text-white bg-theme-color-1 my-4">
                <?= t(" This will make your account permanentily unusable. You will not be re-register the same user ID.") ?><br>
                <strong><?= t("This action is irreversibile") ?>.</strong>
            </div>


            <div class="row gx-5 gy-4">

                <div class="col-md-12">
                    <div class="text-muted mb-1"><?= t("Please enter you password") ?>.</small></div>
                    <?= form_input('user_d_pass', '', ['type' => 'password'] + $inputDefaultAttr);  ?>
                </div>

                <div class="col-md-12">
                    <div class="text-muted mb-1"><?= t("Reason for Deactivate") ?></small></div>
                    <?= form_textarea('p_user_deactivate_reason', '', ['style' => 'max-height:80px'] + $inputDefaultAttr);  ?>
                </div>


            </div>
            <div class="mt-4">
                <button class="btn btn-outline-theme-3 btn-sm px-3"><?= t("Deactivate Account") ?> <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
</div>