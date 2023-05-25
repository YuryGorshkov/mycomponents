<?php if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();
/* @var array $arParams */
/* @var array $arResult */
/* @global \CMain $APPLICATION */
/* @global \CUser $USER */
/* @global \CDatabase $DB */
/* @var \CBitrixComponentTemplate $this */
/* @var string $templateName */
/* @var string $templateFile */
/* @var string $templateFolder */
/* @var string $componentPath */
/* @var array $templateData */
/* @var \CBitrixComponent $component */
$this->setFrameMode(true);

?>

<?if ($arParams["SET_TITLE"] === "Y"){
  $APPLICATION->SetTitle($arResult["ITEMS"]["NAME"]);
  $APPLICATION->SetPageProperty("title", $arResult["ITEMS"]["NAME"]);
}?>
<ul>
  <?foreach ($arResult["ITEMS"] as $key => $value):?>
    <li>
      <b><?=$key?>:</b> <?=$value?>
    </li>
  <?endforeach;?>
</ul>
