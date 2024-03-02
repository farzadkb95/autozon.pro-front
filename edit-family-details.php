<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>


<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:900px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/edit-family-details-api']); ?> <?= csrf_field() ?> <div class="row gx-5 gy-4 mt-2">
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Father's Name") ?></div>
                    <div>
                        <?= form_input('p_user_father_name', $loginUser->p_user_father_name ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Father’s Occupation") ?></div>
                    <div>
                        <?= form_dropdown('p_user_father_status', $arraydb::optionArray('fatherStatus'), $loginUser->p_user_father_status ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Father's Occupation Details / Post") ?></div>
                    <div>
                        <?= form_input('p_user_father_occupation_details', $loginUser->p_user_father_occupation_details ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-12"></div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Mother's Name") ?></div>
                    <div>
                        <?= form_input('p_user_mother_name', $loginUser->p_user_mother_name ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Mother's Occupation") ?></div>
                    <div>
                        <?= form_dropdown('p_user_mother_status', $arraydb::optionArray('motherStatus'), $loginUser->p_user_mother_status ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Mother's Occupation Details / Post") ?></div>
                    <div>
                        <?= form_input('p_user_mother_occupation_details', $loginUser->p_user_mother_occupation_details ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Family Location (Current City/Village)") ?></div>
                    <div>
                        <?= form_input('p_user_family_location', $loginUser->p_user_family_location ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Native Place - District - State") ?></div>
                    <div>
                        <?= form_input('p_user_native_place', $loginUser->p_user_native_place ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("No. of Brother's") ?></div>
                    <div class="row">
                        <div class="col">
                            <i><small class="text-muted small"><?= t("Not married") ?></small></i>
                            <?= form_input('p_user_unmarried_brother', $loginUser->p_user_unmarried_brother ?? '', ['min' => 0] + $inputDefaultAttr, 'number');  ?>
                        </div>
                        <div class="col">
                            <i><small class="text-muted small"><?= t("Married") ?></small></i>
                            <?= form_input('p_user_married_brother', $loginUser->p_user_married_brother ?? '', ['min' => 0] + $inputDefaultAttr, 'number');  ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("No. of Sister's") ?></div>
                    <div class="row">
                        <div class="col">
                            <i><small class="text-muted small"><?= t("Not married") ?></small></i>
                            <?= form_input('p_user_unmarried_sister', $loginUser->p_user_unmarried_sister ?? '', ['min' => 0] + $inputDefaultAttr, 'number');  ?>
                        </div>
                        <div class="col">
                            <i><small class="text-muted small"><?= t("Married") ?></small></i>
                            <?= form_input('p_user_married_sister', $loginUser->p_user_married_sister ?? '', ['min' => 0] + $inputDefaultAttr, 'number');  ?>
                        </div>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="bg-light p-3 border">
                        <strong><?= t("Details of Siblings") ?></strong>
                        <div class="row mt-2">
                            <div class="col small"><?= t("Name") ?></div>
                            <div class="col small"><?= t("Education") ?></div>
                            <div class="col small"><?= t("Occupation") ?></div>
                            <div class="col small"><?= t("If Married – Name") ?></div>
                            <div class="col small"><?= t("Son/Daughter of") ?></div>
                            <div class="col small"><?= t("Thikana - District - State") ?></div>
                        </div>
                        <?php foreach (range(1, 3) as $i) { ?>
                            <div class="row mt-2">
                                <div class="col small">
                                    <?= form_input('p_user_siblings_name_' . $i, $loginUser->{'p_user_siblings_name_' . $i} ?? '', $inputDefaultAttr); ?>
                                </div>
                                <div class="col small">
                                    <?= form_input('p_user_siblings_education_' . $i, $loginUser->{'p_user_siblings_education_' . $i} ?? '', $inputDefaultAttr); ?>
                                </div>
                                <div class="col small">
                                    <?= form_input('p_user_siblings_occupation_' . $i, $loginUser->{'p_user_siblings_occupation_' . $i} ?? '', $inputDefaultAttr); ?>
                                </div>
                                <div class="col small">
                                    <?= form_input('p_user_siblings_marrieddetails_' . $i, $loginUser->{'p_user_siblings_marrieddetails_' . $i} ?? '', $inputDefaultAttr); ?>
                                </div>
                                <div class="col small">
                                    <?= form_input('p_user_siblings_marriedson_daughter_' . $i, $loginUser->{'p_user_siblings_marriedson_daughter_' . $i} ?? '', $inputDefaultAttr); ?>
                                </div>
                                <div class="col small">
                                    <?= form_input('p_user_siblings_thikana_' . $i, $loginUser->{'p_user_siblings_thikana_' . $i} ?? '', $inputDefaultAttr); ?>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Family Type") ?></div>
                    <?= form_dropdown('p_user_family_type', $arraydb::optionArray('familyType'), $loginUser->p_user_family_type ?? '', $selectDefaultAttr);  ?>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Family values") ?></div>
                    <?= form_dropdown('p_user_family_values', $arraydb::optionArray('familyValues'), $loginUser->p_user_family_values ?? '', $selectDefaultAttr);  ?>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Family Affluence") ?></div>
                    <?= form_dropdown('p_user_family_affluence', $arraydb::optionArray('familyAffluence'), $loginUser->p_user_family_affluence ?? '', $selectDefaultAttr);  ?>
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