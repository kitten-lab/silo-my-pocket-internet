<?php /* 

==================== C O N F I G . f i l e  ==================== 
================================================================
----------------------------------------------------------------
--                    SIG FILE FOR TOOLS                      --
----------------------------------------------------------------*/

$GLOBALS['TOOL'] = [

    "NAME" => "reportBASIC",
    "FUNCTION" => "IntakeReport",
    "ACTOR" => $_POST['POST__REPORTER'],
    "CATALOG_SLUG" => "reportBASIC report",
    "TYPE" => "post",
    "VERSION" => 2,
    "SIGFIG" => [
        "skyline-standard" => [

            "IntakeReport" => [
                "Reporter"          => "Report Maker",
                "Reporter_plhldr"   => "Name Yourself",
                "Reporter_default"  => "",
                "Topic"             => "Report Topic",
                "Topic_plhldr"      => "The Reason for your Report",
                "Text"              => "Report Contents",
                "Text_plhldr"       => "Enter your report here.",
                "UNIX"              => "FOR INTERNAL USE ONLY",
                "UNIX_plhldr"       => "KNOWN U-StampS ONLY",
                "Confirmation_Msg"  => "You have been witnessed.",
                "Submit_Button"     => "Submit Report",
                
            ]
        ],
        "tee-hee-secrets" => [

            "IntakeReport" => [
                "Reporter"          => "The Lil' Secret Keeper",
                "Reporter_plhldr"   => "Name Yourself",
                "Reporter_default"  => "ANON-XXX",
                "Topic"             => "What Did Ya Know?",
                "Topic_plhldr"      => "The Reason for your Report",
                "Text"              => "Tell me ALL the deets!",
                "Text_plhldr"       => "Enter your report here.",
                "UNIX"              => "FOR INTERNAL USE ONLY",
                "UNIX_plhldr"       => "KNOWN U-StampS ONLY",
                "Confirmation_Msg"  => "TEE HEE!",
                "Submit_Button"     => "WHISPER TO THE CU",
                
            ]
        ]
    ]
    
]

?>