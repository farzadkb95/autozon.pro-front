<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:600px;">

            <h2 class="text-theme-color-1 font-weight-bold"><?= $title ?></h2>
            <hr>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/update-profile-banner-api']); ?>

            <?= csrf_field() ?>
            <div class="row gx-5 gy-4 mt-2">
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Upload New Photo") ?><Br></div>
                    <div>
                        <div class="form-file form-file mb-3">
                            <input type="file" class="form-file-input" type="file" data-valuecol="profile_photo" data-namecol="profile_photo_tmpname" data-imageid="profile_photo_thumb" data-maxwidth="<?= $uploadBannerMaxWidth ?>" data-maxheight="<?= $uploadBannerMaxHeight ?>" id="profile_photo_temp" name="profile_photo_temp" data-base64handle="true">

                            <img src="" id="profile_photo_thumb" style="width:200px; max-width:80%;" class="m-3">
                            <input type="hidden" name="profile_photo" id="profile_photo" value="">
                            <input type="hidden" name="profile_photo_tmpname" value="" id="profile_photo_tmpname">
                        </div>

                    </div>
                </div>
                <div class="col-md-12"></div>


            </div>

            <div class=" ">
                <button class="btn btn-theme-1 btn-sm px-3"><?= t("Save") ?> <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>

            <?= form_close() ?>
        </div>
    </div>
</div>