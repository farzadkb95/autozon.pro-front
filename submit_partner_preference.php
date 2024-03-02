<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>
<?php $row = \App\Models\PartnerpreferenceModel::byUser($loginUser->p_user_id);
?>
<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:700px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/edit_partner_preference_api']); ?>
            <?= csrf_field() ?>

            <!--  <div class="p-3 text-white bg-theme-color-1 my-4">
                This will make your account permanentily unusable. You will not be re-register the same user ID.<br>
                <strong>This action is irreversibile.</strong>
            </div> -->


            <div class="row gx-5 gy-4">

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Gender") ?></div>
                    <div>
                        <?= form_dropdown('gender', $arraydb::optionArray('gender'), $row->pu_preu_preference_gender ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Marital Status") ?></div>
                    <?= form_dropdown('marital_status', $arraydb::optionArray('maritalstatus'), $row->pu_preu_preference_marital_status ?? '', $selectDefaultAttr);  ?>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Height") ?></div>
                    <div class="row">
                        <div class="col-md-5">
                            <?= form_dropdown('height_from', $arraydb::optionArray('height'), $row->pu_preu_preference_height_from ?? '', $selectDefaultAttr);  ?>
                        </div>
                        <div class="col-md-2 text-center"> - </div>
                        <div class="col-md-5">
                            <?= form_dropdown('height_to', $arraydb::optionArray('height'), $row->pu_preu_preference_height_to ?? '', $selectDefaultAttr);  ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Age") ?></div>
                    <div class="row">
                        <div class="col-md-5">
                            <?php $age = array_combine(range(18, 100), range(18, 100)); ?>
                            <?= form_dropdown('age_from', $age, $row->pu_preu_preference_age_from ?? '', $selectDefaultAttr);  ?>
                        </div>
                        <div class="col-md-2 text-center"> - </div>
                        <div class="col-md-5">
                            <?= form_dropdown('age_to', $age, $row->pu_preu_preference_age_to ?? '', $selectDefaultAttr);  ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Gothra/Gothram") ?></div>
                    <div>
                        <?= form_dropdown('gothara', $arraydb::optionArray('gothara'), $row->pu_preu_preference_gotra ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Clan") ?>/वंश</div>
                    <div>
                        <?= form_dropdown('clan', $arraydb::optionArray('clan'), $row->pu_preu_preference_clan ?? '', $selectDefaultAttr);  ?>

                    </div>
                </div>

            </div>
            <div class=" mt-4">
                <button class="btn btn-outline-theme-3 btn-sm px-3"><?= t("Submit") ?> <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>
</div>