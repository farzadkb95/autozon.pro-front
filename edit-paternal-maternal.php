<?= $this->include('blocks/spacer', ['loginUser' => $loginUser, 'title' => $title]) ?>


<div id="page" class="py-5">
    <div class="container">
        <div id="ajaxcontainer" class="mx-auto" style="max-width:800px;">
            <h2><?= $title ?></h2>
            <?= form_open('', ['data-ajaxAction' => 'account/profile/edit-paternal-maternal-details-api']); ?> <?= csrf_field() ?> <div class="row gx-5 gy-4 mt-2">
                <div class="col-md-12">
                    <div class="d-inline-block pl-0 pr-4 border-bottom lead"><?= t("Paternal") ?></div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Grandfather - Name") ?></div>
                    <div>
                        <?= form_input('p_user_pat_grandfather_name', $loginUser->p_user_pat_grandfather_name ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Son of") ?></div>
                    <div>
                        <?= form_input('p_user_pat_grandfather_son_of', $loginUser->p_user_pat_grandfather_son_of ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Occupation") ?></div>
                    <div>
                        <?= form_input('p_user_pat_grandfather_occupation', $loginUser->p_user_pat_grandfather_occupation ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Thikana") ?></div>
                    <div>
                        <?= form_input('p_user_pat_grandfather_thikana', $loginUser->p_user_pat_grandfather_thikana ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Grandmother - Name") ?></div>
                    <div>
                        <?= form_input('p_user_pat_grandmother_name', $loginUser->p_user_pat_grandmother_name ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Daughter of") ?></div>
                    <div>
                        <?= form_input('p_user_pat_grandmother_daughter_of', $loginUser->p_user_pat_grandmother_daughter_of ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small"><?= t("Thikana") ?></div>
                    <div>
                        <?= form_input('p_user_pat_grandmother_thikana', $loginUser->p_user_pat_grandmother_thikana ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-12">
                    <div class="border p-3 json-table clone_box">
                        <strong><?= t("All Bade Papa Hukum") ?></strong>

                        <?= form_input(['type' => 'hidden', 'name' => 'p_user_family_all_bade_papa', 'class' => 'json-table-data', 'value' => $familyRow->p_user_family_all_bade_papa ?? '']) ?>

                        <div class="d-none d-md-block mt-3">
                            <div class="row">
                                <div class="col-md" data-jsontable-col="name"><?= t("Name") ?></div>
                                <div class="col-md" data-jsontable-col="marriedTo"><?= t("Married To") ?></div>
                                <div class="col-md" data-jsontable-col="d_o"><?= t("D/O") ?></div>
                                <div class="col-md" data-jsontable-col="thikana"><?= t("Thikana - District - State") ?></div>
                                <div class="col-md"><?= t("Action") ?></div>
                            </div>
                        </div>

                        <div class="row pt-3 border-top clone_row data-jsontable-row">
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none"><?= t("Name") ?></div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="name">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none"><?= t("Married To") ?></div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="marriedTo">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none"><?= t("D/o") ?></div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="d_o">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none"><?= t("Thikana - District - State") ?></div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="thikana">
                            </div>
                            <div class="col-md mb-3">
                                <span class="btn btn-light btn-sm add"><?= t("Add Row") ?></span>
                                <span class="btn btn-light btn-sm delete"><?= t("Delete Row") ?></span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="border p-3 json-table clone_box">
                        <strong><?= t("All Kakosa Hukum") ?></strong>

                        <?= form_input(['type' => 'hidden', 'name' => 'p_user_family_all_kakosa', 'class' => 'json-table-data', 'value' => $familyRow->p_user_family_all_kakosa ?? '']) ?>

                        <div class="d-none d-md-block mt-3">
                            <div class="row">
                                <div class="col-md" data-jsontable-col="name"><?= t("Name") ?></div>
                                <div class="col-md" data-jsontable-col="marriedTo"><?= t("Married To") ?></div>
                                <div class="col-md" data-jsontable-col="d_o"><?= t("D/o") ?></div>
                                <div class="col-md" data-jsontable-col="thikana"><?= t("Thikana - District - State") ?></div>
                                <div class="col-md"><?= t("Action") ?></div>
                            </div>
                        </div>

                        <div class="row pt-3 border-top clone_row data-jsontable-row">
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none"><?= t("Name") ?></div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="name">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none"><?= t("Married To") ?></div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="marriedTo">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none"><?= t("D/o") ?></div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="d_o">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none"><?= t("Thikana - District - State") ?></div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="thikana">
                            </div>
                            <div class="col-md mb-3">
                                <span class="btn btn-light btn-sm add"><?= t("Add Row") ?></span>
                                <span class="btn btn-light btn-sm delete"><?= t("Delete Row") ?></span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="border p-3 json-table clone_box">
                        <strong><?= t("All Bhuasa Hukum") ?></strong>

                        <?= form_input(['type' => 'hidden', 'name' => 'p_user_family_all_bhasa', 'class' => 'json-table-data', 'value' => $familyRow->p_user_family_all_bhasa ?? '']) ?>

                        <div class="d-none d-md-block mt-3">
                            <div class="row">
                                <div class="col-md" data-jsontable-col="name">Name</div>
                                <div class="col-md" data-jsontable-col="marriedTo">Married To</div>
                                <div class="col-md" data-jsontable-col="d_o">S/o</div>
                                <div class="col-md" data-jsontable-col="thikana">Thikana - District - State</div>
                                <div class="col-md">Action</div>
                            </div>
                        </div>

                        <div class="row pt-3 border-top clone_row data-jsontable-row">
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Name</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="name">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Married To</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="marriedTo">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">D/o</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="d_o">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Thikana - District - State</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="thikana">
                            </div>
                            <div class="col-md mb-3">
                                <span class="btn btn-light btn-sm add">Add Row</span>
                                <span class="btn btn-light btn-sm delete">Delete Row</span>
                            </div>
                        </div>

                    </div>
                </div>


                <div class="col-md-12">
                    <div class="d-inline-block pl-0 pr-4 border-bottom lead">Maternal</div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small">Maternal Grandfather Name</div>
                    <div>
                        <?= form_input('p_user_mat_grandfather_name', $loginUser->p_user_mat_grandfather_name ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small">Son of</div>
                    <div>
                        <?= form_input('p_user_mat_grandfather_son_of', $loginUser->p_user_mat_grandfather_son_of ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="text-muted mb-1 small">Occupation</div>
                    <div>
                        <?= form_input('p_user_mat_grandfather_occupation', $loginUser->p_user_mat_grandfather_occupation ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small">Thikana</div>
                    <div>
                        <?= form_input('p_user_mat_grandfather_thikana', $loginUser->p_user_mat_grandfather_thikana ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="text-muted mb-1 small">Maternal Grandmother Name</div>
                    <div>
                        <?= form_input('p_user_mat_grandmother_name', $loginUser->p_user_mat_grandmother_name ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small">Daughter of</div>
                    <div>
                        <?= form_input('p_user_mat_grandmother_daughter_of', $loginUser->p_user_mat_grandmother_daughter_of ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="text-muted mb-1 small">Thikana</div>
                    <div>
                        <?= form_input('p_user_mat_grandmother_thikana', $loginUser->p_user_mat_grandmother_thikana ?? '', $inputDefaultAttr);  ?>
                    </div>
                </div>



                <div class="col-md-12">
                    <div class="border p-3 json-table clone_box">
                        <strong>All Mamosa Hukum</strong>

                        <?= form_input(['type' => 'hidden', 'name' => 'p_user_family_all_mamosa', 'class' => 'json-table-data', 'value' => $familyRow->p_user_family_all_mamosa ?? '']) ?>

                        <div class="d-none d-md-block mt-3">
                            <div class="row">
                                <div class="col-md" data-jsontable-col="name">Name</div>
                                <div class="col-md" data-jsontable-col="marriedTo">Married To</div>
                                <div class="col-md" data-jsontable-col="d_o">D/o</div>
                                <div class="col-md" data-jsontable-col="thikana">Thikana - District - State</div>
                                <div class="col-md">Action</div>
                            </div>
                        </div>

                        <div class="row pt-3 border-top clone_row data-jsontable-row">
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Name</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="name">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Married To</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="marriedTo">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">D/o</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="d_o">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Thikana - District - State</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="thikana">
                            </div>
                            <div class="col-md mb-3">
                                <span class="btn btn-light btn-sm add">Add Row</span>
                                <span class="btn btn-light btn-sm delete">Delete Row</span>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="col-md-12">
                    <div class="border p-3 json-table clone_box">
                        <strong>All Masisa Hukum</strong>

                        <?= form_input(['type' => 'hidden', 'name' => 'p_user_family_all_masisa', 'class' => 'json-table-data', 'value' => $familyRow->p_user_family_all_masisa ?? '']) ?>

                        <div class="d-none d-md-block mt-3">
                            <div class="row">
                                <div class="col-md" data-jsontable-col="name">Name</div>
                                <div class="col-md" data-jsontable-col="marriedTo">Married To</div>
                                <div class="col-md" data-jsontable-col="d_o">S/o</div>
                                <div class="col-md" data-jsontable-col="thikana">Thikana - District - State</div>
                                <div class="col-md">Action</div>
                            </div>
                        </div>

                        <div class="row pt-3 border-top clone_row data-jsontable-row">
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Name</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="name">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Married To</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="marriedTo">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">S/o</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="d_o">
                            </div>
                            <div class="col-md mb-3">
                                <div class="d-bock d-md-none">Thikana - District - State</div>
                                <input type="text" class="form-control form-control-sm" data-jsontable-input="thikana">
                            </div>
                            <div class="col-md mb-3">
                                <span class="btn btn-light btn-sm add">Add Row</span>
                                <span class="btn btn-light btn-sm delete">Delete Row</span>
                            </div>
                        </div>

                    </div>
                </div>




            </div>
            <div class="mt-4">
                <button class="btn btn-outline-theme-3 btn-sm px-3">Save <i class="fal fa-long-arrow-right ml-2"></i></button>
            </div>
            <?= form_close() ?>

            <script src="themes/js/multi_input.js?v=<?= rand(99, 9999) ?>"></script>
        </div>
    </div>
</div>
</div>