<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>

<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:800px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/edit-religious-profile-api']); ?>
            <input type="hidden" name="p_user_religion" value="<?= $loginUser->p_user_religion ?? 1 ?>">
            <input type="hidden" name="p_user_cast" value="<?= $loginUser->p_user_cast ?? 1 ?>">
            <?= csrf_field() ?>
            <div class="row gx-5 gy-4 mt-2">

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Religion") ?></div>
                    <div>
                        <?= form_dropdown('p_user_religion', $arraydb::optionArray('religion'), $loginUser->p_user_religion ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Mother Tongue") ?></div>
                    <div>
                        <?= form_dropdown('p_user_mother_tongue', $arraydb::optionArray('motherTongue'), $loginUser->p_user_mother_tongue ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>
                <!--  <div class="col-md-6">
                    <div class="text-muted mb-1 small">CASTE/जाति</div>
                    <div>
                        <?= form_dropdown('p_user_cast', $arraydb::optionArray('cast'), $loginUser->p_user_cast ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div> -->
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Clan") ?>/वंश</div>
                    <div>
                        <?= form_dropdown('p_user_clan', $arraydb::optionArray('clan'), $loginUser->p_user_clan ?? '', $selectDefaultAttr);  ?>
                        <?php
                        $otherInput = $inputDefaultAttr;
                        $otherInput['class'] .= ' mt-2';
                        $otherInput['placeholder'] = 'Other';
                        echo form_input('p_user_clan_other', $loginUser->p_user_clan_other ?? '', $otherInput);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Sub Clan") ?>/उप वंश </div>
                    <div>
                        <?= form_dropdown('p_user_subclan', $arraydb::optionArray('subClan'), $loginUser->p_user_clan ?? '', $selectDefaultAttr);  ?>
                        <?php
                        $otherInput = $inputDefaultAttr;
                        $otherInput['class'] .= ' mt-2';
                        $otherInput['placeholder'] = 'Other';
                        echo form_input('p_user_subclan_other', $loginUser->p_user_clan_other ?? '', $otherInput);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Gothra/Gothram") ?></div>
                    <div>
                        <?= form_dropdown('p_user_gothara', $arraydb::optionArray('gothara'), $loginUser->p_user_gothara ?? '', $selectDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Time of Birth") ?></div>
                    <?php echo form_hidden('p_user_birth_time', $loginUser->p_user_birth_time ?? '');  ?>
                    <div class="birthtime-box">
                        <table>
                            <tr>
                                <?php
                                $hours = range(0, 23);
                                unset($hours[0]);
                                $time = [];
                                if (!empty($loginUser->p_user_birth_time)) {
                                    $time = explode(':', $loginUser->p_user_birth_time);
                                }
                                ?>
                                <td><?= form_dropdown('hour', ['' => 'Hour'] + $hours, $time[0] ?? '', $selectDefaultAttr);  ?></td>
                                <td><?= form_dropdown('minutes', ['' => 'Minutes'] + range(0, 60), $time[1] ?? '', $selectDefaultAttr);  ?></td>
                                <td><?= form_dropdown('seconds', ['' => 'Seconds'] + range(0, 60), $time[2] ?? '', $selectDefaultAttr);  ?></td>
                            </tr>
                        </table>
                        <script>
                            $(function() {
                                $('.birthtime-box select').change(function() {
                                    var hour = $('[name="hour"]').val();
                                    var minutes = $('[name="minutes"]').val();
                                    var seconds = $('[name="seconds"]').val();

                                    $('[name="p_user_birth_time"]').val('');
                                    if (hour != '' && minutes != '' && seconds != '') {
                                        hour = hour.padStart(2, '0');
                                        minutes = minutes.padStart(2, '0');
                                        seconds = seconds.padStart(2, '0');
                                        var time = hour + ':' + minutes + ':' + seconds;
                                        $('[name="p_user_birth_time"]').val(time);
                                    }
                                })
                            })
                        </script>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Country of Birt") ?>h</div>
                    <?= form_dropdown('p_user_birth_country', ['' => t('Select')] + \App\Models\CountryModel::dropdownOptions(), $loginUser->p_user_birth_country ?? '', $selectDefaultAttr);  ?>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("State of Birth") ?></div>
                    <?= form_input('p_user_birth_state', $loginUser->p_user_birth_state ?? '', $inputDefaultAttr);  ?>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("City / Village (District) of Birth") ?></div>
                    <?= form_input('p_user_birth_city', $loginUser->p_user_birth_city ?? '', $inputDefaultAttr);  ?>
                </div>


                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Manglik/Chevvai dosham") ?></div>
                    <?= form_dropdown('p_user_manglik_dosh', $arraydb::optionArray('manglikDosh'), $loginUser->p_user_manglik_dosh ?? '', $selectDefaultAttr);  ?>
                </div>

            </div>
            <div class="mt-4">
                <button class="btn btn-outline-theme-3 btn-sm px-3"><?= t("Save") ?> <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>
            <?= form_close() ?>

            <script type="text/javascript">
                $("[name='p_user_clan']").change(function() {

                    if ($(this).val() == 18) {
                        $("[name='p_user_clan_other']").show();
                    } else {
                        $("[name='p_user_clan_other']").val('').hide();
                    }
                }).change();

                $("[name='p_user_subclan']").change(function() {
                    if ($(this).val() == 7) {
                        $("[name='p_user_subclan_other']").show();
                    } else {
                        $("[name='p_user_subclan_other']").val('').hide();
                    }
                }).change();
            </script>


        </div>
    </div>
</div>
</div>