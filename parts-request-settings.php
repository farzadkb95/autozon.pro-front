<?php //ddd($loginUser->p_user_account_type) 
/*
accountStatus
partsRequests
*/

use App\Models\BrandModel;
use App\Models\CategoryModel;
use App\Models\CountryModel;

?>
<?= View('templates/components/a-header', ['active' => 'settings']) ?>

<div class="mycp-page mycp-page-preferences">
    <h3 class="py-3"><?= t("Request parts") ?></h3>
    <form action="<?= base_url('account/save-parts-request-settings') ?>" method="post">
        <div>
            <div class="mycp-page-subtitle">
                <?= t("Cars you can sell parts for") ?>
            </div>
            <!-- <div class="form-err err-makers">
                        Alege cel puțin o marcă auto.
                    </div> -->
        </div>
        <?php
        $brands = BrandModel::where('brand_status', 1)->get();
        $partsRequestSettings = $loginUser->partsRequestSettings();
        $hasPS = $partsRequestSettings->count();
        $pRS = $partsRequestSettings->first();
        ?>
        <div class="col-lg-3 checkbox-order">
            <div class="form-check">
                <input <?= $hasPS ? '' : 'checked' ?> onchange="checkAll(this,'.ckall')" class="form-check-input all" type="checkbox" value="" id="allBrands">
                <label class="form-check-label" for="allBrands"><?= t("All") ?></label>
            </div>
        </div>
        <div class="row">
            <?php $car_parts_for = $pRS?->car_parts_for;
            $brandVehicles = [] ?>
            <?php foreach ($brands as $k => $brand) : ?>
                <?php
                $vehicles = $brand->vehicles();
                $selectedCount = 0;
                $_vehicles_id = [];
                $brand_id = $brand?->brand_id;
                foreach ($vehicles->get() as  $value) {
                    $_vehicles_id[] = $value->vehicle_id;
                }
                $partsSell = !$hasPS ? $_vehicles_id : toArray($car_parts_for)[$brand_id] ?? [];
                $partsSell = toJson($partsSell);
                if (!$hasPS)
                    $brandVehicles[$brand_id] = $_vehicles_id;

                $ptsellCount = count(toArray($partsSell));


                $isCheck = 'checked';
                if (!$hasPS);
                elseif ($ptsellCount);
                else $isCheck = '';

                ?>
                <div class="col-lg-3 checkbox-order" data-brand-id="<?= $brand->brand_id ?>">
                    <div class="form-check">
                        <input <?= $isCheck ?> class="form-check-input ckall" type="checkbox" id="brand-id-<?= $brand->brand_id ?>">
                        <label class="form-check-label" for="brand-id-<?= $brand->brand_id ?>">
                            <?= $brand->brand_name ?>
                        </label>
                        <span type="button" onclick="loadVehicles(this)" data-brand-name='<?= $brand->brand_name ?>' data-select-id="<?= $brand->brand_id ?>" data-vehicles='<?= toJson($vehicles->get()) ?>' data-selected='<?= $partsSell ?>' class="modaltext" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <span class="count"><?= $ptsellCount ?></span>/<?= $vehicles->count(); ?>
                        </span>
                    </div>
                </div>
            <?php endforeach;
            $brandVehicles = toJson($brandVehicles) ?>
        </div>
        <input type="hidden" value='<?= $car_parts_for ?? $brandVehicles ?>' id="selected_brands_vehicles" name="selected_brands_vehicles">
        <div class="pt-4">
            <?php
            $n_freq =  $pRS->type_of_requests ?? 3;
            $_check = fn ($v, $cv) => $v == $cv ? 'checked' : '';
            ?>
            <div class="mycp-page-subtitle">
                <?= t("The type of requests you want to see") ?>
            </div>
            <div class="pt-3">
                <div class="form-check">
                    <input <?= $_check($n_freq, 1) ?> class="form-check-input" value="1" type="radio" name="type_of_requests" id="type_of_requests1">
                    <label class="form-check-label" for="type_of_requests1">
                        <?= t("Requests for new parts") ?>
                    </label>
                </div>
                <div class="form-check">
                    <input <?= $_check($n_freq, 2) ?> class="form-check-input" value="2" type="radio" name="type_of_requests" id="type_of_requests2">
                    <label class="form-check-label" for="type_of_requests2">
                        <?= t("Requests for parts sh") ?>
                    </label>
                </div>
                <div class="form-check">
                    <input <?= $_check($n_freq, 3) ?> class="form-check-input" value="3" type="radio" name="type_of_requests" id="type_of_requests3">
                    <label class="form-check-label" for="type_of_requests3">
                        <?= t("All requests") ?>
                    </label>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <div class="mycp-page-subtitle">
                <?= t("Counties where you can deliver parts") ?>
            </div>
            <div class="row">
                <?php
                $countryDetails = CountryModel::where('country_id', $loginUser->p_user_country)->first();
                $country_iso3 = $countryDetails?->country_iso3;

                // $pRS->car_parts_for;
                // $pRS->car_parts_categories;
                $region_to_deliver = toArray($pRS->region_to_deliver ?? null);

                $file = readFileContents(dirname(APPPATH) . '/public/files/countries-states.min.json');
                $country_data = array_reduce(array_filter(toArray($file), fn ($v) => $v['iso3'] == $country_iso3), fn ($l, $r) => $r)

                ?>
                <?php foreach ($country_data['states'] as $state) : ?>
                    <?php
                    $id_ = $state['state_code'] ?? '';
                    $name = $state['name'] ?? '';
                    $isCheck = 'checked';
                    if (!$hasPS);
                    elseif (count(array_filter($region_to_deliver, fn ($v) => $v == $id_)));
                    else $isCheck = '';
                    ?>
                    <div class="col-lg-3 checkbox-order">
                        <div class="form-check">
                            <input <?= $isCheck ?> name="region_to_deliver[]" value="<?= $id_ ?>" class="form-check-input ckall" type="checkbox" id="county-id-<?= $id_ ?>">
                            <label class="form-check-label" for="county-id-<?= $id_ ?>">
                                <?= preg_replace('/([A-Z])+/', ' $1', $name) ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
            <!-- <input type="hidden" id="region_to_deliver" name="region_to_deliver"> -->
        </div>
        <div class="pt-4">
            <div class="mycp-page-subtitle">
                <?= t("Want to see relisted applications?") ?>
            </div>
            <?php
            $n_freq =  $pRS->relisted_applications1 ?? 2;
            ?>
            <div class="pt-3">
                <div class="form-check">
                    <input class="form-check-input" <?= $_check($n_freq, 1) ?> value="1" type="radio" name="relisted_applications" id="relisted_applications1">
                    <label class="form-check-label" for="relisted_applications1">
                        <?= t("AND") ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?= $_check($n_freq, 2) ?> value="2" type="radio" name="relisted_applications" id="relisted_applications2">
                    <label class="form-check-label" for="relisted_applications2">
                        <?= t("NOT") ?>
                    </label>
                </div>
            </div>
        </div>

        <div class="pt-4">
            <div class="mycp-page-subtitle">
                <?= t("Categories of parts sold") ?>
            </div>
            <div class="row">
                <?php

                $car_parts_categories = toArray($pRS?->car_parts_categories);

                ?>
                <?php foreach (CategoryModel::all() as $value) : ?>
                    <?php
                    $id_ = $value['category_id'] ?? '';
                    $name = $value['category_name'] ?? '';

                    $isCheck = 'checked';
                    if (!$hasPS);
                    elseif (count(array_filter($car_parts_categories, fn ($v) => $v == $id_)));
                    else $isCheck = '';
                    ?>
                    <div class="col-lg-3 checkbox-order">
                        <div class="form-check">
                            <input <?= $isCheck ?> name="car_parts_categories[]" class="form-check-input ckall" type="checkbox" id="category-id-<?= $id_ ?>" value="<?= $id_ ?>">
                            <label class="form-check-label" for="category-id-<?= $id_ ?>">
                                <?= $name ?>
                            </label>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
        <div class="pt-4">
            <div class="mycp-page-subtitle">
                <?= t("Optionally you can only see requests with the following keywords") ?>
            </div>
            <div class="pt-3">
                <div class="form-group">
                    <input type="text" value="<?= $pRS->request_keywords ?? '' ?>" name="request_keywords" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <p id="helpId" class="text-muted mt-2"><?= t("Put a comma") ?> <span class="badge bg-secondary"><?= t("between") ?></span> <?= t("keywords to filter by multiple terms") ?>.
                        <?= t("Example") ?>: <span class="badge bg-secondary"><?= t("rear bumper , tires , headlight") ?></span> <?= t("to see only requests that contain the keywords") ?> <span class="badge bg-secondary"><?= t("rear bumper") ?></span> ,
                        <span class="badge bg-secondary"><?= t("tires") ?></span> <?= t("or") ?> <span class="badge bg-secondary"><?= t("headlight") ?></span>
                    </p>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <div class="mycp-page-subtitle">
                <?= t("Excludes the following users") ?>
            </div>
            <div class="pt-3">
                <div class="form-group">
                    <input type="text" value="<?= $pRS->exclude_users ?? '' ?>" name="exclude_users" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <p id="helpId" class="text-muted mt-2"> <?= t("Example") ?>: <span class="badge bg-secondary"><?= t("username") ?>1, <?= t("username") ?>2, ...</span></p>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <?php
            $n_freq =  $pRS->notification_frequency ?? 1;
            ?>
            <div class="mycp-page-subtitle">
                <?= t("Notification frequency") ?>
            </div>
            <div class="pt-3">
                <div class="form-check">
                    <input class="form-check-input" <?= $_check($n_freq, 1) ?> value='1' type="radio" name="notification_frequency" id="notification_frequency1">
                    <label class="form-check-label" for="notification_frequency1">
                        <?= t("Only website filtering, no notifications or emails") ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?= $_check($n_freq, 2) ?> value='2' type="radio" name="notification_frequency" id="notification_frequency2">
                    <label class="form-check-label" for="notification_frequency2">
                        <?= t("Every 10 minutes by email") ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?= $_check($n_freq, 3) ?> value='3' type="radio" name="notification_frequency" id="notification_frequency3">
                    <label class="form-check-label" for="notification_frequency3">
                        <?= t("Hourly by email") ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?= $_check($n_freq, 4) ?> value='4' type="radio" name="notification_frequency" id="notification_frequency4">
                    <label class="form-check-label" for="notification_frequency4">
                        <?= t("Once a day by email on the hour") ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?= $_check($n_freq, 5) ?> value='5' type="radio" name="notification_frequency" id="notification_frequency5">
                    <label class="form-check-label" for="notification_frequency5">
                        <?= t("Instant in the browser (web-push)") ?><br />
                        <?= t("If we can't send notifications in your browser, we'll send them to you by email every 10 minutes.") ?>
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" <?= $_check($n_freq, 6) ?> value='6' type="radio" name="notification_frequency" id="notification_frequency6">
                    <label class="form-check-label" for="notification_frequency6">
                        <?= t("Every 10 minutes in the browser (web-push) and by e-mail") ?>
                    </label>
                </div>
            </div>
        </div>
        <div class="pt-4">
            <div class="mycp-page-subtitle">
                <?= t("The email address where you want to receive requests") ?>
            </div>
            <div class="pt-3">
                <div class="form-group">
                    <input type="email" value="<?= $pRS->notify_by_email ?? '' ?>" name="notify_by_email" class="form-control">
                </div>
            </div>
        </div>
        <div class="position-fixed bg-white" style="bottom: 0; left: 0;right: 0; border-top:1px solid #E9EBEE;">
            <div class="form-group p-3  text-center">
                <button type="submit" class="btn btn-warning p-3 fw-bold"><?= t("Save the Settings") ?></button>
                <a href="<?= base_url('partoffer') ?>" class="btn btn-link"><?= t("Part requests") ?></a>
            </div>
        </div>
    </form>
</div>

<?= View('templates/components/a-footer') ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><?= t("Choose the car models for") ?> <span class="modal-for"></span></h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="col-lg-3 checkbox-order">
                    <div class="form-check">
                        <input class="form-check-input" id="mdl" onchange="checkAll(this,'.vehl')" type="checkbox" />
                        <label class="form-check-label fw-bold" for="mdl"><?= t("All") ?></label>
                    </div>
                </div>
                <div class="row insertVehicles"></div>
            </div>
            <div class="modal-footer text-center justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal"><?= t("Close") ?></button>
            </div>
        </div>
    </div>
</div>

<script>
    function checkAll(source, $className = '.all') {
        checkboxes = document.querySelectorAll($className);
        for (var i = 0, len = checkboxes.length; i < len; i++) {
            checkboxes[i].checked = source.checked;
        }
    }

    function loadVehicles(target) {

        const _t = $(target),
            bs_target = _t.data('bs-target'),
            brand_name = _t.data('brand-name'),
            select_id = _t.data('select-id'),
            vehicles = _t.data('vehicles'),
            vehicles_selected = JSON.parse(_t.attr('data-selected'));

        var res = vehicles.map(function(itm, idx) {
            return checkElm(itm?.vehicle_name, itm?.vehicle_id, itm?.vehicle_brand, vehicles_selected.some((v) => v == itm?.vehicle_id))
        });

        $(bs_target + " .insertVehicles").html(res);
        $(".modal-for").html(brand_name);
    }



    $('body').on('click', '.vehl', function(e) {
        var selected = [];
        $('.vehl').each((idx, elm) => {
            if ($(elm).is(':checked'))
                selected.push($(elm).attr('value'))
        });
        var data = JSON.stringify(selected),
            len = selected.length,
            brand_id = $(this).data('brand-id');

        var $brand = document.querySelector('[data-brand-id="' + brand_id + '"]');
        $($brand).find('span.count').html(len);
        var _inputcheck = $brand.querySelector('input[type="checkbox"]');
        if (!len) {
            _inputcheck.checked = false;
        } else _inputcheck.checked = true;

        $('[data-select-id="' + brand_id + '"]').attr('data-selected', data);

        clearSelectAll('#mdl');
        getSelectedBrands();
    });

    function checkFunc(name = '[data-brand-id]', checkAll = '#allBrands', childName = '[data-brand-id]') {

        $('body').on('click', name + ' input[type="checkbox"]', function(e) {
            var checkBoxs = $(name + ' input[type="checkbox"]');
            tLen = checkBoxs.length, cLen = [];
            checkBoxs.each((e, elm) => {
                if (elm.checked) {
                    cLen.push(1);
                }
            })
            document.querySelector(checkAll).checked = tLen == cLen.length

            if (childName) getSelectedBrands(childName);
        });
    }

    checkFunc();



    function clearSelectAll(id = '#mdl', isCheck = false) {
        var ck = document.querySelector(id)
        if (isCheck) {
            ck.checked = true
        } else ck.checked = false;
    }

    function checkElm(label, value, p_value, check = false) {
        return `<div class="col-lg-3 checkbox-order">
                        <div class="form-check">
                            <input class="form-check-input vehl" id="${value+label}" data-brand-id='${p_value}' ${check?'checked':''} type="checkbox" value="${value}"/>
                            <label class="form-check-label" for="${value+label}">${label}</label>
                        </div>
                    </div>`;
    }


    function getSelectedBrands($className = '[data-brand-id]') {

        var checkboxes = document.querySelectorAll($className),
            _selected = {},
            _;

        for (var i = 0, len = checkboxes.length; i < len; i++) {
            if ((_ = checkboxes[i].querySelector('input[type="checkbox"]')) && _.checked) {
                var selected = checkboxes[i].querySelector('span[type="button"]'),
                    brand_id = $(selected).data('select-id'),
                    vehicles_selected = $(selected).attr('data-selected');

                if (vehicles_selected)
                    _selected[brand_id] = JSON.parse(vehicles_selected);
            }
        }
        $('#selected_brands_vehicles').val(JSON.stringify(_selected));

    }
</script>