<!-- <?= View('templates/account-menus', ['active' => 'settings']) ?> -->
<?= View('templates/components/a-header', ['active' => 'settings']) ?>

<?php //ddd($loginUser->p_user_account_type) 
/*
accountStatus
partsRequests
*/
?>
<div class="container">

    <div class="row g-3">
        
        <?php
        $subcriptionActive = $loginUser->p_sub_id;;
        $credit = 0;
        $availableCredit = 0;
        $findSub = \App\Models\SubscriptionModel::find($subcriptionActive);
        if ($loginUser->p_validity >= date('Y-m-d') && $findSub->count() > 0) {
            $credit = $findSub->subs_quantity;
            $availableCredit = $loginUser->p_credit;
        }
        ?>
        <div class="col-md-12">
            <section class="shadow-boxer. mycp-page mycp-page-preferences  p-4">
                <div class="mycp-page-contract">
                    <h4 class="mb-3"><?= t('Account contract status') ?></h4>

                    <p class="mb-0"><?= t('Subscription in progress:') ?></p>

                    <h6 class="mb-3 fw-bold"> <?php if (!empty($findSub->image)) : ?>
                            <img src="<?= base_url($findSub->image ?? '') ?>" title="Gold" alt="Go" />
                        <?php endif ?>
                        <?= t($findSub->subs_name ?? '') ?>
                    </h6>
                    <div class="row mt-2">
                        <div class="col-8">
                            <div class="d-flex justify-content-between">
                                <p class="m-0"><?= t('Subscription validity') ?></p>
                                <p class="m-0"><?= t('expires on: ') . '<b>' . date('M d ,Y', strtotime($loginUser->p_validity ?? 'now')) . '</b>' ?></p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="m-0"><?= t('No. monthly bonus credits') ?></p>
                                <p class="m-0"><?= '<b>' . $credit . '</b>' ?></p>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between">
                                <p class="m-0"><?= t('Avilable Credits') ?></p>
                                <p class="m-0"><?= '<b>' . $availableCredit . '</b>' ?></p>
                            </div>
                            <hr>
                        </div>
                        <div class="col-4 text-center">
                            <?php
                            $type = (($findSub->subs_type ?? 0) == 1) ? 'basicplans' : 'businessplan';
                            ?>
                            <ul class="nav nav-pills mb-3 justify-content-center pt-4" id="pills-tab2" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a href="javascript:;" onclick="scrolTodiv()" class="btn btn-default action-btn action-btn--green js-upgrade-btn" id="pills-plan2-tab" data-bs-toggle="pill" data-bs-target="#pills-plan1" role="tab" aria-controls="pills-plan3" aria-selected="false">
                                        <?= t('See Subscription') ?>
                                    </a>
                               
                                </li>
                            </ul>
                            <!-- <button class="btn btn-outline-success mx-auto" onclick="display('<?= $type ?>','<?= $findSub->subs_id ?? '' ?>')"><?= t('See Subscription') ?></button> -->
                        </div>
                    </div>
                </div>
            </section>
            <div class="mycp-page mycp-page-preferences" hidden>
                <div class="mycp-page-contract">
                    <div class="mycp-page-title">
                        <h1><?php //t("Stare contractuală cont") 
                            ?></h1>
                    </div>
                    <div class="current-plan current-plan--business current-plan--platinum">
                        <div class="current-plan__subtitle">
                            Abonament în curs:
                        </div>
                        <div class="current-plan__title">
                            <img src="https://www.pieseauto.ro/images/default/icon_vanzator_platinum.svg" alt="" class="current-plan__logo" />
                            Platinum
                        </div>
                        <div class="current-plan__boxes">
                            <div class="current-plan__settings">
                                <div class="item">
                                    <div class="item__name">Valabilitate abonament</div>
                                    <div class="item__value">
                                        expiră pe: <strong>16 nov. 2022</strong>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item__name">
                                        Nr. credite bonus lunar
                                    </div>
                                    <div class="item__value"><strong>400</strong></div>
                                </div>
                                <div class="item">
                                    <div class="item__name">Preț oferte cereri</div>
                                    <div class="item__value">
                                        expiră pe: <strong>06 oct. 2022</strong>
                                    </div>
                                </div>
                                <div class="item">
                                    <div class="item__name">UP săptămânal 10k</div>
                                    <div class="item__value">
                                        expiră pe: <strong>16 nov. 2022</strong>
                                    </div>
                                </div>
                                <div class="clear20"></div>
                                <div class="item">
                                    <div class="item__name">Manager cont</div>
                                    <div class="item__value">
                                        Cipriana Drăghici,
                                        <a href="tel:0744514742">0744.514.742</a>
                                    </div>
                                </div>
                            </div>
                            <div class="current-plan__options">

                                <ul class="nav nav-pills mb-3 justify-content-center pt-4" id="pills-tab2" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a href="javascript:;" onclick="scrolTodiv()" class="btn btn-default action-btn action-btn--green js-upgrade-btn" id="pills-plan2-tab" data-bs-toggle="pill" data-bs-target="#pills-plan1" role="tab" aria-controls="pills-plan3" aria-selected="false">
                                            VEZI ABONAMENTELE
                                        </a>
                                        
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mycp-page-contract">
                <div class="plan-types__listing">
                    <div class="text-center py-3">
                        <?= t("Vezi abonamentele disponibile") ?>:
                    </div>
                    <?php
                    $subscription = \App\Models\SubscriptionModel::all();
                    $subscriptions = [];
                    foreach ($subscription as $value) {
                        if (!isset($subscriptions[$value->subs_type]))
                            $subscriptions[$value->subs_type] = [$value];
                        else array_push($subscriptions[$value->subs_type], $value);
                    }
                    // $subscriptions =   array_change_key_case($subscriptions);
                    $tabData = [
                        ['label' => 'ABONAMENTE BASIC', 'id' => '1'],
                        ['label' => 'ABONAMENTE BUSINESS', 'id' => '2', 'details' => 'These subscriptions are for legal entities only.'],
                    ];
                    $subscriptions = map($subscriptions, function ($v, $_, $k) use ($tabData) {
                        $_ = toObject($tabData[$k] ?? (object)[]);
                        $_->data = $v;
                        return $_;
                    }, true);
                    ?>
                    <ul class="nav nav-pills mb-3 justify-content-center pt-4" id="pills-tab2" role="tablist">
                        <?php foreach ($tabData as $tab) :
                        ?>

                            <li class="nav-item" role="presentation">
                                <button class="nav-link active." id="pills-plan1-tab" data-bs-toggle="pill" data-bs-target="#pills-plan<?= $tab['id'] ?? '' ?>" type="button" role="tab" aria-controls="pills-plan<?= $tab['id'] ?? '' ?>" aria-selected="false">
                                    <?= $tab['label'] ?? '' ?>
                                </button>
                            </li>
                        <?php endforeach ?>
                    </ul>

                    <div class="tab-content" id="pills-tabContent2">
                        <?php
                        foreach ($subscriptions as $items) :
                        ?>

                            <div class="tab-pane fade show. .active" id="pills-plan<?= $items->id ?>" role="tabpanel" aria-labelledby="pills-plan1-tab">
                                <div class="plan-types__listing-group js-business-plans-listings plan-types__listing-group--visible">
                                    <div class="plan-types__info">
                                        <?php if ($items?->details ?? null) : ?><p>
                                                <i class="fa fa-info-circle"></i>
                                                <?= t($items?->details) ?>
                                            </p>
                                        <?php endif ?>
                                    </div>
                                    <div class="business-plans">

                                        <?php foreach ($items->data as $itm) :
                                            $nmex = explode(' ', $itm->subs_name ?? '');
                                            $pname = $nmex[0] ?? '';
                                            $hname = end($nmex);
                                        ?>
                                            <div class="business-plans__item business-plans__item--gold" style="    border-color: #D9A336;">
                                                <div class="item__header">
                                                    <div class="item__header-text">
                                                        <div class="item__subtitle"><?= t("Subsription") ?></div>
                                                        <!-- <div class="item__title"><strong><?= $itm->subs_name  ?></strong> </div> -->
                                                        <div class="item__title">
    <?php
        $subsName = $itm->subs_name ?? '';

        if ($subsName === 'gold') {
            echo '<strong style="color: gold!important;">' . $subsName . '</strong>';
        } else {
            echo '<strong>' . $subsName . '</strong>';
        }
    ?>
</div>
                                                    </div>
                                                    <div class="item__header-logo">
                                                        <?php if (!empty($itm->image)) : ?>
                                                            <img src="<?= base_url($itm->image ?? '') ?>" title="Gold" alt="Go" />
                                                        <?php endif ?>
                                                    </div>
                                                </div>
                                                <?php foreach ($itm->multi_subscription()->get() as $multi_sub) : ?>
                                                    <div class="item__feature">
                                                        <div class="item__feature-name">
                                                            <?= t($multi_sub?->multi_key ?? '') ?>
                                                        </div>
                                                        <div class="item__feature-value"><?= t($multi_sub?->multi_value ?? '') ?></div>
                                                    </div>
                                                <?php endforeach ?>
                                                <div class="clear10"></div>
                                                <hr class="my-2">
                                                <div><?= t('Price') ?></div>
                                                <strong>€ <?= $itm->subs_price ?? '' ?> + <?= t('VAT') ?><br>
                                                    <?= t('or') ?> <?= $itm->subs_quantity ?> <?= t('credits') ?></strong>
                                                <hr>

                                                <div class="item__action my-2">
                                                    <button style="color: #D0D0D0;    border: 1px solid #E2E2E2; " onclick='location.href="<?= ($loginUser->p_credit) ? "javascript:;" : base_url("account/subscription/getSubscriptionById/$itm->subs_id") ?>"' <?php if ($loginUser->p_credit ?? 0 > 0) : ?> disabled<?php endif ?> type="button" class="btn btn-outline-<?= ($loginUser->p_credit ?? 0) ? 'default' : 'primary' ?> action-btn">
                                                        <?= ($loginUser->p_credit) ? t('Activated') : t('Activate') ?>
                                                    </button>
                                                </div>
                                            </div>
                                        <?php endforeach ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function scrolTodiv(id = 'pills-plan1') {
            var scrollDiv = document.getElementById(id).offsetTop;
            window.scrollTo({
                top: scrollDiv,
                behavior: 'smooth'
            });
        }
    </script>

    <?php  ?>