<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:600px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/edit-reference-details-api']); ?>
            <?= csrf_field() ?>
            <div class="row gx-5 gy-4 mt-2">

                <div class="col-md-12">
                    <div class="text-muted mb-1"><?= t("Reference 1") ?> <br><small><?= t("Name / Father Name/Mobile No. / Thikana / Occupation") ?></small></div>
                    <?= form_textarea('p_user_reference_1', $loginUser->p_user_reference_1 ?? '', ['style' => 'max-height:80px'] + $inputDefaultAttr);  ?>
                </div>
                <div class="col-md-12">
                    <div class="text-muted mb-1"><?= t("Reference 2") ?> <br><small><?= t("Name / Father Name/Mobile No. / Thikana / Occupation") ?></small></div>
                    <?= form_textarea('p_user_reference_2', $loginUser->p_user_reference_2 ?? '', ['style' => 'max-height:80px'] + $inputDefaultAttr);  ?>
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