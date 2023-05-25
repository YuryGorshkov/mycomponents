<? if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$arResult["ITEMS"] = "";
$allItems = array();

$arSelect = explode(", ", $arParams["IBLOCK_SELECT"]);
$arFilter = Array(
  "IBLOCK_TYPE"=>$arParams["IBLOCK_TYPE"],
  "IBLOCK_ID"=>$arParams["IBLOCK_ID"],
  "ACTIVE_DATE"=>"Y", "ACTIVE"=>"Y"
);

$res = CIBlockElement::GetList(Array("ID"=>"ASC"), $arFilter, false, Array(), $arSelect);
while($arFields = $res->GetNext())
{
 $allItems[] = $arFields;
}
foreach ($allItems as $id => $item) {
  foreach ($item as $key => $value) {
    if (!in_array($key, $arSelect)) {
      unset($allItems[$id][$key]);
    }
  }
}

if($arParams["IBLOCK_FILTER"] == "RANDOM")
{
  $arResult["ITEMS"] = $allItems[array_rand($allItems, 1)];
}
else
{
  $arResult["ITEMS"] = $allItems[count($allItems) - 1];
}

$this->includeComponentTemplate();
?>
