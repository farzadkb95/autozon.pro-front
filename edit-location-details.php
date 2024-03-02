<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:600px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/edit-location-details-api']); ?>
            <?= csrf_field() ?>
            <div class="row gx-5 gy-4 mt-2">

                <div class="col-md-12">
                    <div class="text-muted mb-1 small"><?= t("Complete Address") ?></div>
                    <?= form_textarea('p_user_address', $loginUser->p_user_address ?? '', ['style' => 'max-height:80px'] + $inputDefaultAttr);  ?>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Country Living In") ?></div>
                    <div>
                        <?= form_dropdown('p_user_country', ['' => 'Select'] + \App\Models\CountryModel::dropdownOptions(), $loginUser->p_user_country ?? '', ['id' => 'p_user_country'] + $selectDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("State Living In") ?></div>
                    <div>
                        <?= form_dropdown('p_user_state', ['' => 'Select'] + \App\Models\StateModel::dropdownOptionsByCountry($loginUser->p_user_country ?? ''), $loginUser->p_user_state ?? '', ['id' => 'p_user_state'] + $selectDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("City Living In") ?></div>
                    <div>
                        <?= form_dropdown('p_user_city', ['' => 'Select'] + \App\Models\CityModel::dropdownOptionsByState($loginUser->p_user_state ?? ''), $loginUser->p_user_city ?? '', ['id' => 'p_user_city'] + $selectDefaultAttr);  ?>
                    </div>
                </div>
                <!-- <div class="col-md-6">
                    <div class="text-muted mb-1 small">Ethnic Origin</div>
                    <div>
                        <?= form_dropdown('p_user_ethnicity', $arraydb::optionArray('ethnicity'), $loginUser->p_user_ethnicity ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div> -->
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Zip/Pin Code") ?></div>
                    <?= form_input('p_user_pincode', $loginUser->p_user_pincode ?? '', $inputDefaultAttr);  ?>
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