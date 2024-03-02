<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:700px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/edit-description-details-api']); ?>
            <?= csrf_field() ?>
            <div class="row gx-5 gy-4 mt-2">
                <div class="col-12">
                    <div class="text-muted mb-1 small"><?= t("Personality, Family Details, Career, Partner Expectations etc.") ?></div>
                    <div>
                        <textarea name="p_user_description" rows="10" class="form-control form-control-sm"><?= $loginUser->display_description ?></textarea>
                    </div>
                </div>


            </div>
            <div class="mt-4">
                <button class="btn btn-outline-theme-3 btn-sm px-3"><?= t("Save") ?> <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
</div>