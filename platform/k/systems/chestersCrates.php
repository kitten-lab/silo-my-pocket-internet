<?php 


    function buildTPS($unix, $ms,$tzone, $event_time) {
        $tpsDT = new DateTime("@$unix");
        $tpsDT->setTimezone(new DateTimeZone("UTC"));
        $year = (int)$tpsDT->format('x');

        return [
            "import_unix" => time(),
            "event_unix" => $event_time,
            "POST__TZONE" => $tzone,
            "TPS__TZONE" => "UTC",
            "TPS__netLoop" => (int)$tpsDT->format('B'),
            "TPS__millennium" => intdiv($year, 1000),
            "TPS__century" => intdiv($year, 100),
            "TPS__decade" => intdiv($year, 10),
            "TPS__year" => $year,
            "TPS__leap" => (int)$tpsDT->format('L'),
            "TPS__month" => (int)$tpsDT->format("n"),
            "TPS__week" => (int)$tpsDT->format("W"),
            "TPS__dayOfYear" => (int)$tpsDT->format("z"),
            "TPS__dayOfMonth" => (int)$tpsDT->format("j"),
            "TPS__dayOfWeek" => (int)$tpsDT->format("w"),
            "TPS__hour" => (int)$tpsDT->format("G"),
            "TPS__minute" => (int)$tpsDT->format("i"),
            "TPS__second" => (int)$tpsDT->format("s"),
            "TPS__ms" => $ms % 1000,
        ];
        }

function json_environment(){
$SITE = $GLOBALS['SITE'];
    return [
    "viewport" => $GLOBALS['PV'],
    "sys" => [ 
        "slug" => $GLOBALS[$SITE]['SYS_SLUG'], 
        "display" => $GLOBALS[$SITE]['SYS_DISPLAY'], 
        ],
    "dom" => [ 
        "slug" => $GLOBALS[$SITE]['DOM_SLUG'], 
        "display" => $GLOBALS[$SITE]['DOM_DISPLAY'], 
        ],
    "room" => [ 
        "slug" => $GLOBALS[$SITE]['ROOM_SLUG'], 
        "display" => $GLOBALS[$SITE]['ROOM_DISPLAY'], 
        ],
    "mod" => [ 
        "slug" => $GLOBALS[$SITE]['MOD_SLUG'], 
        "display" => $GLOBALS[$SITE]['MOD_DISPLAY'], 
        ]];
}


function json_origin(){
    return [
    "material" => [ 
        "type" => $GLOBALS['MATERIAL']['TYPE'], 
        "source" => [
            "name" =>  $GLOBALS['MATERIAL']['SOURCE']['NAME'],
            "id" => $GLOBALS['MATERIAL']['SOURCE']['ID'],
            "created_on" => $GLOBALS['MATERIAL']['SOURCE']['CREATED'],
            "last_modified" => $GLOBALS['MATERIAL']['SOURCE']['LAST_MODIFIED'],
            ],
    "reference" => [
        "ref" => 
            $GLOBALS['MATERIAL']['REFS'],
    ],
    "notes" => $GLOBALS['MATERIAL']['DETAILS'],
],];
}

function buildCHEST($cUID, $unix, $event_time, $tUID, $timezone){
$SITE = $GLOBALS['SITE'];
    return [
            "CUID" => $cUID, 
            "chester_crate schema" => 3,
            // CUSTOM CHEST DETAILS HERE
            "payload" => json_payload(),
            "route" => json_route(),
            "tags" => $GLOBALS['TAGS'],
            "environment" => json_environment(),
            "tool" => json_tool(),
            "origin" => json_origin(),
            //DO NOT MODIFY BELOW
            "TPS" => [
                "ingest_unix" => $unix,
                "event_unix" => $event_time,
                "TUID" => $tUID, 
                "timezone" => $timezone,
            ]
  ];
}


function json_tool(){
$TOOL = $GLOBALS['TOOL'];
    return [
    "name" => $TOOL['NAME'],
    "type" => $TOOL['TYPE'],
    "function" => $TOOL['FUNCTION'],
    "version" => $TOOL['VERSION'],
];
}