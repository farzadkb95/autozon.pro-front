<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:600px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/submit-success-story-api']); ?>
            <?= csrf_field() ?>

            <!--  <div class="p-3 text-white bg-theme-color-1 my-4">
                This will make your account permanentily unusable. You will not be re-register the same user ID.<br>
                <strong>This action is irreversibile.</strong>
            </div> -->


            <div class="row gx-5 gy-4">
                <div class="col-md-12 pt-3">
                    <div class="text-muted mb-1"><?= t("Title") ?> ( Ex : Ram Weds Sita)</small></div>
                    <?= form_input('title', '', $inputDefaultAttr);  ?>
                </div>
                <div class="col-md-12">
                    <div class="text-muted mb-1"><?= t("Your Story") ?></small></div>
                    <?= form_textarea('story', '', ['style' => 'max-height:200px'] + $inputDefaultAttr);  ?>
                </div>
                <div class="col-md-12">
                    <div class="text-muted mb-1 small"><?= t("Upload Couple Images") ?></div>
                    <div>
                        <div class="form-file form-file mb-1">
                            <input type="file" class="form-file-input" type="file" data-valuecol="profile_photo" data-namecol="profile_photo_tmpname" data-imageid="profile_photo_thumb" data-maxwidth="<?= $uploadMaxWidth ?>" data-maxheight="<?= $uploadMaxHeight ?>" id="profile_photo_temp" name="profile_photo_temp" data-base64handle="true">
                            <label class="form-file-label" for="profile_photo_temp">
                                <span class="form-file-text"><?= t("Choose file") ?>...</span>
                                <span class="form-file-button"><?= t("Browse") ?></span>
                            </label>
                            <img src="" id="profile_photo_thumb" style="width:200px; max-width:80%;" class="m-3">
                            <input type="hidden" name="profile_photo" id="profile_photo" value="">
                            <input type="hidden" name="profile_photo_tmpname" value="" id="profile_photo_tmpname">
                        </div>

                    </div>
                </div>


            </div>
            <div class="">
                <button class="btn btn-outline-theme-3 btn-sm px-3"><?= t("Submit") ?> <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
</div>