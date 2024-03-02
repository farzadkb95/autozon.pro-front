<?= View('templates/account-menus', ['active' => 'settings']) ?>


<div class="container">

    <div class="row g-3">
        <div class="col-md-3">
            <?= View('templates/sidebar-settings', ['active' => 'changePassword']) ?>
        </div>
        <div class="col-md-9">

            <section class="shadow-boxer p-4">

                <?= $this->include('templates/account-title', ['title' => 'Update Password']) ?>
                <?= form_open('', ['data-ajaxAction' => 'account/profile/update-password-api']); ?>

                <?= csrf_field() ?>

                <div class="row gx-5 gy-4 mt-2">
                    <div class="col-md-12">
                        <div class="mb-1"><?= t("Enter Old Password") ?></div>
                        <input class="form-control rounded-0 shadow-none" type="password" name="current_password">
                    </div>

                    <div class="col-md-12">
                        <div class="mb-1"><?= t("Enter New Password") ?></div>
                        <input class="form-control rounded-0 shadow-none" type="password" name="new_password">
                    </div>

                    <div class="col-md-12">
                        <div class="mb-1"><?= t("Retype New Password") ?></div>
                        <input class="form-control rounded-0 shadow-none" type="password" name="new_password_retype">
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-theme-1"><?= t("Update") ?></button>
                    </div>
                </div>
                <?= form_close() ?>
        </div>
    </div>
</div>