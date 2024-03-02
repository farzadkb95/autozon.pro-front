<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:600px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/edit-education-details-api']); ?>
            <?= csrf_field() ?>
            <div class="row gx-5 gy-4 mt-2">
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Qualification") ?></div>
                    <div>
                        <?= form_dropdown('p_user_higest_qualification', $qualificationList, $loginUser->p_user_higest_qualification ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Medium of school/College") ?></div>
                    <div>
                        <?= form_dropdown('p_user_qualification_medium', $arraydb::optionArray('eudationMedium'), $loginUser->p_user_qualification_medium ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("College Attended") ?></div>
                    <div>
                        <?= form_input('p_user_college_attended', $loginUser->p_user_college_attended ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Occuption") ?></div>
                    <div>
                        <?= form_dropdown('p_user_working_with', $arraydb::optionArray('workingWith'), $loginUser->p_user_working_with ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Working As") ?></div>
                    <div>
                        <?= form_dropdown('p_user_working_as', $occupationList, $loginUser->p_user_working_as ?? '', $selectDefaultAttr);  ?>

                        <?php
                        $otherInput = $inputDefaultAttr;
                        $otherInput['class'] .= ' mt-2';
                        $otherInput['placeholder'] = 'Other';
                        echo form_input('p_user_working_as_other', $loginUser->p_user_working_as_other ?? '', $otherInput);  ?>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Employer Name") ?></div>
                    <?= form_input('p_user_employer_name', $loginUser->p_user_employer_name ?? '', $inputDefaultAttr);  ?>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Annual Income") ?></div>
                    <?= form_dropdown('p_user_annual_income', $arraydb::optionArray('annualIncome'), $loginUser->p_user_annual_income ?? '', $selectDefaultAttr);  ?>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Annual Income Visible") ?></div>
                    <?= form_dropdown('p_user_annual_income_visible', $arraydb::optionArray('annualIncomeVisible'), $loginUser->p_user_annual_income_visible ?? '', $selectDefaultAttr);  ?>
                </div>

            </div>
            <div class="mt-4">
                <button class="btn btn-outline-theme-3 btn-sm px-3"><?= t("Save") ?> <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>
            <?= form_close() ?>

            <script type="text/javascript">
                $("[name='p_user_working_as']").change(function() {

                    if ($(this).val() == 86) {
                        $("[name='p_user_working_as_other']").show();
                    } else {
                        $("[name='p_user_working_as_other']").val('').hide();
                    }
                    if ($(this).val() == 83 || $(this).val() == 84 || $(this).val() == 85) {
                        $("[name='p_user_employer_name'],[name='p_user_annual_income'],[name='p_user_annual_income_visible']").val('')
                            .attr('disabled', 'disabled');
                    } else {
                        $("[name='p_user_employer_name'],[name='p_user_annual_income'],[name='p_user_annual_income_visible']")
                            .removeAttr('disabled');
                    }
                }).change();
            </script>

        </div>
    </div>
</div>
</div>