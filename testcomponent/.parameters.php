<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("iblock"))
	return;
  
$arTypesEx = CIBlockParameters::GetIBlockTypes(array("-"=>" "));

$arIBlocks=array();
$db_iblock = CIBlock::GetList(array("SORT"=>"ASC"), array("SITE_ID"=>$_REQUEST["site"], "TYPE" => ($arCurrentValues["IBLOCK_TYPE"]!="-"?$arCurrentValues["IBLOCK_TYPE"]:"")));
while($arRes = $db_iblock->Fetch())
	$arIBlocks[$arRes["ID"]] = "[".$arRes["ID"]."] ".$arRes["NAME"];

$arComponentParameters = array(
"GROUPS" => array(),
  "PARAMETERS" => array(
    "SET_TITLE" => array(
      "PARENT" => "ADDITIONAL_SETTINGS",
      "NAME" => GetMessage("PARAM_NAME_TITLE"),
      "TYPE" => "CHECKBOX",
      "MULTIPLE" => "N",
      "DEFAULT" => "Y",
    ),
    "IBLOCK_TYPE" => array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("PARAM_NAME_IBLOCK_TYPE"),
      "TYPE" => "LIST",
      "VALUES" => $arTypesEx,
			"DEFAULT" => "",
			"REFRESH" => "Y",
    ),
    "IBLOCK_ID" => array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("PARAM_NAME_IBLOCK_ID"),
      "TYPE" => "LIST",
      "VALUES" => $arIBlocks,
			"DEFAULT" => '={$_REQUEST["ID"]}',
			"ADDITIONAL_VALUES" => "Y",
			"REFRESH" => "Y",
    ),
    "IBLOCK_FILTER" => array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("PARAM_NAME_IBLOCK_FILTER"),
      "TYPE" => "LIST",
      "MULTIPLE" => "N",
      "VALUES" => array(
        "RANDOM" => GetMessage("PARAM_VALUE_IBLOCK_FILTER_R"),
        "LAST" => GetMessage("PARAM_VALUE_IBLOCK_FILTER_L")
      ),
      "DEFAULT" => "RANDOM",
    ),
    "IBLOCK_SELECT" => array(
      "PARENT" => "BASE",
      "NAME" => GetMessage("PARAM_NAME_IBLOCK_SELECT"),
      "TYPE" => "TEXT",
      "MULTIPLE" => "N",
      "DEFAULT" => "NAME, ID",
    ),
  ),
);
?>
