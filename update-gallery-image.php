<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:600px;">

            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/update-gallery-image-api/' . $imageSr]); ?>

            <?= csrf_field() ?>
            <div class="row gx-5 gy-4 mt-2">
                <div class="col-md-12">
                    <div class="text-muted mb-1 small"><?= t("Upload New Image") ?></div>

                </div>
                <div class="col-md-6">
                    <div>
                        <div class="form-file form-file mb-3">
                            <input type="file" accept="image/*" class="form-file-input" type="file" data-valuecol="profile_photo" data-namecol="profile_photo_tmpname" data-imageid="profile_photo_thumb" data-maxwidth="<?= $uploadMaxWidth ?>" data-maxheight="<?= $uploadMaxHeight ?>" id="profile_photo_temp" name="profile_photo_temp" data-base64handle="true">
                            <label class="form-file-label" for="profile_photo_temp">
                                <span class="form-file-text"><?= t("Choose file") ?>...</span>
                                <span class="form-file-button"><?= t("Browse") ?></span>
                            </label>
                            <img src="" id="profile_photo_thumb" style="width:200px; max-width:80%;" class="m-3">
                            <input type="hidden" name="profile_gallery_image" id="profile_photo">
                            <input type="hidden" name="profile_photo_tmpname" id="profile_photo_tmpname">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3">
                <button class="btn btn-outline-theme-3 btn-sm px-3"><?= t("Save") ?> <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>