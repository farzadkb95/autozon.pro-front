<?= View('templates/account-menus', ['active' => 'settings']) ?>


<div class="container">

    <div class="row g-3">
        <div class="col-md-3">
            <?= View('templates/sidebar-settings', ['active' => 'B2BForumAlert']) ?>
        </div>
        <div class="col-md-9">

            <section class="shadow-boxer p-4">

                <?= $this->include('templates/account-title', ['title' => 'B2b Forum Alert']) ?>

                <?= form_open('', ['data-ajaxAction' => 'account/profile/b2b-forum-settings-api']); ?>





                <section class="py-4">
                    <div style="max-width: 800px;">
                        <div class="form-check form-check-inline">
                            <input <?= $loginUser->p_user_new_topic_alert == 1 ? 'checked' : '' ?> class="form-check-input" require type="checkbox" name="p_user_new_topic_alert" id="p_user_new_topic_alert" value="1">
                            <label class="form-check-label" for="p_user_new_topic_alert"><?= t("New topic alerts (you'll be notified by email when someone posts a new topic)") ?></label>
                        </div>
                        <br>
                        <br>
                        <div class="form-check form-check-inline">
                            <input <?= $loginUser->p_user_new_post_alert == 1 ? 'checked' : '' ?> class="form-check-input" require type="checkbox" name="p_user_new_post_alert" id="p_user_new_post_alert" value="1">
                            <label class="form-check-label" for="p_user_new_post_alert"><?= t("New post alerts (you'll be alerted when someone replies to a topic you're participating in)") ?> </label>
                        </div>
                    </div>
                </section>

                <button type="submit" class="btn btn-theme-1 px-4"><?= t("Save") ?></button>

                <?= form_close() ?>


        </div>
    </div>
</div>