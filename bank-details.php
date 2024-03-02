<?= form_open_multipart('', ['data-ajaxAction' => 'account/profile/bank-details-api']); ?>
<div>

    <div class="row g-4">
        <div class="col-lg-6">
            <h2 class="text-left text_m_1 pt-4 pb-2"><?= t('Authenticate profile') ?></h2>
            <div>
                <div class="borde_r2 p-4" style="height: auto;">
                    <div class="row no-gutters justify-content-between">
                        <!--     <div class="col-lg-6 p-2">
                            <input type="text" value="<?= $bankRow->bank_user_name ?? $loginUser->p_user_first_name ?>" name="bank_user_name" placeholder="Nombre de usuario" class="form-control border-theme-color-3">
                        </div>
                        <div class="col-lg-6 p-2">
                            <input value="<?= $bankRow->bank_user_display_name ?? '' ?>" name="bank_user_display_name" type="text" placeholder="Display name" class="form-control border-theme-color-3">
                        </div> -->
                        <div class="col-lg-6 p-2">
                            <input value="<?= $bankRow->bank_user_realname ?? '' ?>" name="bank_user_realname" type="text" placeholder="Nombre" class="form-control border-theme-color-3">
                        </div>
                        <div class="col-lg-6 p-2">
                            <input value="<?= $bankRow->bank_user_surname ?? '' ?>" name="bank_user_surname" type="text" placeholder="Apellido" class="form-control border-theme-color-3">
                        </div>
                        <div class="col-lg-6 p-2">
                            <input value="<?= $bankRow->bank_user_document_type ?? '' ?>" type="text" name="bank_user_document_type" placeholder="Identificacion" class="form-control border-theme-color-3">
                        </div>
                        <div class="col-lg-6 p-2">
                            <div class="d-flex">
                                <?php if (!empty($bankRow->bank_user_document) && is_file('uploads/document/' . $bankRow->bank_user_document)) { ?>
                                    <a class="btn btn-sm btn-light me-3" target="_blank" href="uploads/document/<?= $bankRow->bank_user_document ?>">View&nbsp;File</a>
                                <?php } ?>
                                <input type="file" name="bank_user_document" name="document" class="form-control border-theme-color-3">
                            </div>
                        </div>
                        <div class="col-lg-6 p-2">
                            <input value="<?= $bankRow->bank_user_email ?? '' ?>" name="bank_user_email" type="text" placeholder="Correo" class="form-control border-theme-color-3">
                        </div>
                        <div class="col-lg-6 p-2">
                            <input type="text" value="<?= $bankRow->bank_user_mobile ?? '' ?>" name="bank_user_mobile" placeholder="Telefono" class="form-control border-theme-color-3">
                        </div>
                    </div>
                </div>
            </div>
            <div class="pt-4">
                <h2 class="text-left text_m_1 pt-4 pb-2"><?= t('Bank information') ?></h2>
                <div class="borde_r2 p-4" style="height: auto;">
                    <div class="row no-gutters justify-content-between">
                        <!-- <div class="col-12 pb-2">
                            <div class="d-md-flex" style="font-size: 14px;">
                                <?php foreach ($arraydb::$bankType as $key => $val) { ?>
                                    <div class="pe-3  p-2">
                                        <label for="banktype<?= $key ?>">
                                            <input <?= ($val == ($bankRow->bank_account_bank ?? 0)) ? 'checked' : '' ?> type="radio" name="bank_account_bank" id="banktype<?= $key ?>" value="<?= $val ?>">
                                            <?= $val ?>
                                        </label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div> -->
                        <div class="col-lg-6 p-2">
                            <?= form_dropdown('bank_account_country', ['' => 'Select'] + \App\Models\CountryModel::dropdownOptions(), (string) ($bankRow->bank_account_country ?? 207), ['id' => 'bank_account_country', 'class' => 'form-control border-theme-color-3 rounded']);  ?>
                        </div>
                        <div class="col-lg-6 p-2">
                            <?= form_input('bank_account_name', $bankRow->bank_account_name ?? '', ['class' => 'form-control border-theme-color-3 rounded', 'placeholder' => t('Banco')]) ?>
                        </div>
                        <div class="col-lg-6 p-2"><input type="text" name="bank_account_no" value="<?= $bankRow->bank_account_no ?? '' ?>" placeholder="<?= t("Numero de cuenta") ?>" class="form-control border-theme-color-3"></div>
                        <div class="col-lg-6 p-2">
                            <?= form_dropdown('bank_account_type', $arraydb::optionArray('bankAccountType'), (string)  ($bankRow->bank_account_type ?? ''), ['id' => 'p_user_country', 'class' => 'form-control border-theme-color-3 rounded']);  ?>
                        </div>

                        <div class="col-lg-6 p-2">
                            <input name="bank_account_owner" value="<?= $bankRow->bank_account_owner ?? '' ?>" type="text" placeholder="<?= t("Nombre del Titular") ?>" class="form-control border-theme-color-3">
                        </div>
                        <div class="col-lg-6 p-2">
                            <?= form_input('bank_account_document_type', $bankRow->bank_account_document_type ?? '', ['class' => 'form-control border-theme-color-3 rounded', 'placeholder' => t('Tipo de documento')]) ?>
                        </div>

                        <div class="col-lg-12 p-2">
                            <div class="row no-gutters">
                                <div class="col-lg-6 p-2">
                                    <div><b class="text_m_1 mb-2 d-block"> &nbsp;</b></div>
                                    <?= form_input('bank_paypal_email', $bankRow->bank_paypal_email ?? '', ['class' => 'form-control border-theme-color-3 rounded', 'placeholder' => t('Cuenta Paypal')]) ?>
                                </div>
                                <div class="col-lg-6 p-2">
                                    <div><b class="text_m_1 mb-2 d-block"><?= t("Code: Swift / iban / bic") ?></b></div>
                                    <input type="text" name="bank_paypal_ownername" value="<?= $bankRow->bank_paypal_ownername ?? '' ?>" placeholder="" class="form-control border-theme-color-3">
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <div class="col-lg-6">
            <h2 class="text-left text_m_1 pt-4 pb-2"><?= t('Multiple forms of payment for your fans') ?></h2>
            <div class="borde_r2 p-4 py-md-0" style="height: auto;">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="px-2 "><img src="themes/images/icono_tar.svg" alt="" /></div>
                        <div style="font-size: 14px;" class=""><?= t("Tarjetas de Credito") ?></div>
                    </div>
                    <div class="p-2"><img src="themes/images/visa.png" alt="" /></div>
                </div>
            </div>
            <div class="borde_r2 p-4 mt-4 py-md-0" style="height: auto;">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="px-2 "><img src="themes/images/efectivo.svg" alt="" /></div>
                        <div style="font-size: 14px;" class=" "><?= t("Efectivo") ?></div>
                    </div>
                    <div class="p-2"><img src="themes/images/baloto.png" alt="" /></div>
                </div>
            </div>
            <div class="borde_r2 p-4 mt-4 py-md-0" style="height: auto;">
                <div class="d-md-flex justify-content-between align-items-center">
                    <div class="d-flex align-items-center">
                        <div class="px-2"><img src="themes/images/banco_2.svg" alt="" /></div>
                        <div style="font-size: 14px;" class=""><?= t("Transferencia Bancaria") ?></div>
                    </div>
                    <div class="p-2">
                        <img src="themes/images/transferencias_22.png" alt="" />
                    </div>
                </div>
            </div>

            <h2 class="text-left text_m_1 pt-4 pb-2"><?= t('Subscriptions') ?></h2>
            <div class="borde_r2 p-3" style="height: auto;">
                <div>
                    <?php $packages = \App\Models\PackageModel::frontRecords()->get();
                    foreach ($packages as $item) {
                    ?>
                        <div class="d-flex justify-content-between my-3" style="font-size: 18px;">
                            <div class="mt-1 me-2"><?= $item->package_name ?></div>
                            <!-- <div>$<?= $item->package_amount ?></div> -->
                            <div class="input-group mb-3">
                                <span class="input-group-text rounded-bottom-left bg-white border-right-0" id="basic-addon1" style="border-right: 0;border-radius: 9px 0 0 9px;border-color: rgba(222, 185, 255);">$</span>
                                <input name="package_amount" required type="text" class="ps-0 form-control border-theme-color-3 rounded" placeholder="Amount" aria-label="Username" aria-describedby="basic-addon1" style="border-left: 0;border-radius: 0 9px 9px 0 !important;" value="<?= c_ron($loginUser->p_user_package_amount, false) ?? '' ?>" min-value="12000">
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div>

                </div>

            </div>
            <div class="pt-2" style="font-size: 14px;">
                <?= t('Important note any of the accounts you select must be in the name of the account owner.') ?>
            </div>
            <!-- <div class="d-flex justify-content-end pb-5">
                <div class="pt-4"><input type="button" value="Keep" class="btn btn-theme-1 px-5"></div>
            </div> -->
        </div>
        <div class="col-lg-6 align-self-center">
            <div class="">
                <div class="text-left py-3">
                    <button type="submit" class="btn btn-theme-1 btn-lg  w-100"><?= t('Enroll') ?></button>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="">
                <div class="text-left py-3">
                    <?php if (!empty($loginUser->free_access_link)) { ?>
                        <div class="border rounded-pill p-3">
                            <input class="w-100 border-0 small opacity-5" type="text" id="coptytextlink" value="<?= $loginUser->free_access_link ?>">
                            <div id="freelinkgenerate" onclick="clicktoCopy()" class="btn btn-sm w-100"><?= t('Copy Free Access Link') ?></div>
                        </div>
                    <?php } else { ?>
                        <a href="account/profile/free-access-link-generate-api" class="btn btn-theme-1 btn-lg  w-100">Generar Link de Accesso Gratis</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= form_close() ?>

<script>
    function clicktoCopy() {
        /* Get the text field */
        var copyText = document.getElementById("coptytextlink");

        /* Select the text field */
        copyText.select();
        copyText.setSelectionRange(0, 99999); /* For mobile devices */

        /* Copy the text inside the text field */
        document.execCommand("copy");

        /* Alert the copied text */
        Swal.fire(
            '<?= t('Link Copied') ?>',
            '<?= t('Share the copied link to get more visibility') ?>',
            'success'
        )
    }
</script>