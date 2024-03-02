<?= View('templates/breadcrump', ['title' => 'My Account']) ?>
<?= View('templates/userHeader', ['selected' => 'Dashboard']) ?>

<!-- my account wrapper start -->
<div class="myaccount-content">
    <?= form_open('', ['data-ajaxAction' => 'account/profile/edit-basic-profile-api']); ?>

    <?= csrf_field() ?>
    <div class="row gx-5 gy-4 mt-2">
        <div class="col-md-12">
            <div class="text-muted mb-1 small"><?= t("Name") ?></div>
            <div>
                <?= form_input('name', $loginUser->p_user_first_name ?? '', $inputDefaultAttr);  ?>
            </div>
        </div>


        <div class="col-md-12">
            <div class="text-muted mb-1 small"></div>
            <div>
                <?= form_textarea('description', $loginUser->p_user_description ?? '', $inputDefaultAttr + ['rows' => 2]);  ?>
            </div>
        </div>

    </div>
    <div class="mt-4">
        <div class="button-box btn-hover">
            <button type="submit"><?= t("Update") ?></button>

        </div>
    </div>
    <?= form_close() ?>


</div>
</div>



</div>


<?= View('templates/userFooter') ?>