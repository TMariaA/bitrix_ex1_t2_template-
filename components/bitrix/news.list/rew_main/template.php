<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
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
$src = "";
$noImg = SITE_TEMPLATE_PATH."/img/rew/no_photo.jpg";
?>
    <div class="item-wrap">
        <div class="rew-footer-carousel">


<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
    <div class="item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
        <?if (isset($arItem["PREVIEW_PICTURE"]["SRC"]))
        {
            $arImg = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"],Array('width'=>49, 'height'=>49),BX_RESIZE_IMAGE_PROPORTIONAL,true);
            $src = $arImg["src"];
        }else{
            $src = $noImg;
        }
            ?>
        <div class="side-block side-opin">
            <div class="inner-block">
                <div class="title">
                    <div class="photo-block">
                        <img src="<?= $src ?>" alt="">
                    </div>
                    <div class="name-block"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?echo $arItem["NAME"]?></a></div>
                    <div class="pos-block"><?=$arItem["DISPLAY_PROPERTIES"]["POSITION"]["VALUE"]?>,"<?=$arItem["DISPLAY_PROPERTIES"]["COMPANY"]["VALUE"]?>"</div>
                </div>
                <div class="text-block"><?=$arItem["PREVIEW_TEXT"];?>
                </div>
            </div>
        </div>
	</div>
<?unset($arItem);?>
<?endforeach;?>
        </div>
    </div>


