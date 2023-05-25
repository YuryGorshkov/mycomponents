<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();
$arComponentDescription = array(
"NAME" => GetMessage("TEST_NAME"),
"DESCRIPTION" => GetMessage("TEST_DESCRIPTION"),
"PATH" => array(
"ID" => "dv_components",
"CHILD" => array(
"ID" => "curdate",
"NAME" => GetMessage("TEST_NAME")
)
),
"ICON" => "",
);
