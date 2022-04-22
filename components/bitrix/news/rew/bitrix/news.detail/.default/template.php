<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
$noImg = SITE_TEMPLATE_PATH."/img/rew/no_photo.jpg";
if (isset($arResult["DETAIL_PICTURE"]["SRC"])){
    $noImg = $arResult["DETAIL_PICTURE"]["SRC"];
}
?>

    <div class="review-block">
        <div class="review-text">
            <div class="review-text-cont">
                <? echo $arResult["DETAIL_TEXT"]; ?>
            </div>
            <div class="review-autor">
                <?= $arResult["NAME"] ?>, <?= $arResult["DISPLAY_ACTIVE_FROM"] ?> <?= GetMessage('YEAR') ?>
                .,<?= $arResult["DISPLAY_PROPERTIES"]["POSITION"]["DISPLAY_VALUE"] ?>
                , <?= $arResult["DISPLAY_PROPERTIES"]["COMPANY"]["DISPLAY_VALUE"] ?>.
            </div>
        </div>
        <div style="clear: both;" class="review-img-wrap"><img src="<?= $noImg ?>"
                                                               alt="<?= $arResult["DETAIL_PICTURE"]["ALT"] ?>"></div>
    </div>
<? if (isset($arResult["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"])): ?>
    <div class="exam-review-doc">
    <p><?= GetMessage('DOC') ?>:</p>
    <? if (count($arResult["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"]) == 1): ?>
        <div class="exam-review-item-doc"><img class="rew-doc-ico"
                                               src="<?= SITE_TEMPLATE_PATH ?>/img/icons/pdf_ico_40.png"><a
                    href="<?= $arResult["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["SRC"] ?>"
                    download=""><?= $arResult["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]["ORIGINAL_NAME"] ?></a></div>
    <? else: ?>
        <? foreach ($arResult["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"] as $pid => $arProperty): ?>
            <div class="exam-review-item-doc"><img class="rew-doc-ico"
                                                   src="<?= SITE_TEMPLATE_PATH ?>/img/icons/pdf_ico_40.png"><a
                        href="<?= $arProperty["SRC"] ?>"
                        download=""><?= $arProperty["ORIGINAL_NAME"] ?></a></div>


        <? endforeach; ?>
    <? endif; ?>
    </div>
<? endif; ?>
    <hr>
