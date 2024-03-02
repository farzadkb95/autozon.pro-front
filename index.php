<?php //View('templates/account-menus', ['active' => 'settings']) 
?>
<?= View('templates/components/a-header', ['active' => 'settings']) ?>

<div class="mycp-page mycp-page-preferences">
    <?php include 'components/personal-data.php'
    ?>
</div>

<?= View('templates/components/a-footer') ?>

<script>
    // function addUserPhone(_target) {
    //     if (!_target) return;

    //     var attr = (name) => _target.getAttribute(name),
    //         phone = attr('data-phone'),
    //         phone_id = attr('data-phone-id'),
    //         bs_target = attr('data-bs-target'),
    //         modal = document.querySelector(bs_target),
    //         phone_field = modal.querySelector('[name="phone"]'),
    //         phone_id_field = modal.querySelector('[name="phone_id"]');
    //     phone_field.value = phone;
    //     phone_id_field.value = phone_id;
    //     // console.log(phone_field, code);
    // }
</script>