<?php
require_once __DIR__ . '/../../systems/rehydrateSelf.php';
require_once __DIR__ . '/functions.php';
$SHADOW_PROD_TOGGLE = SHADOW_PROD_ENV(true);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    $POST__SYS =         $_POST['POST__SYS'];
    $POST__DOM =         $_POST['POST__DOM'];
    $POST__MOD =         $_POST['POST__MOD'];
    $POST__PV =          $_GET['pv'] ?? '__UNDISCLOSED__';
    $POST__LOVERS_MARK = $_POST['LOVERS_MARK'];
    $POST__ACTING__AS =  $_POST['ACTING__AS'];
    $POST__TIMEZONE =    $_POST['POST__TZ'];

    $GEN__WORLD_NAME =   $_POST['GEN__WORLD_NAME'];
    $GEN__WORLD_SYS =    $_POST['GEN__WORLD_SYS'];
    $GEN__WORLD_DOM =    $_POST['GEN__WORLD_DOM'];
    $GEN__WORLD_MOD =    $_POST['GEN__WORLD_MOD'];
    $GEN__ROOM =         $_POST['GEN__ROOM'];


    $VARIANT = "BASIC";

    ## TOOL SIG FILE
    $TOOL_FUNC = "GEN__WORLD";
    $TOOL_LOC = "skyGenesis";
    $TOOL_NAME = "actorCreateWorld";
        ## SET YOUR KDE FOR THIS TOOL ##
        $KDE__ERROR_TYPE = $TOOL_FUNC . " DUPLICATE REJECTED";
        $KDE__SOURCE = $TOOL_NAME;
        $KDE__ECHO_CHAIN = $POST__SYS . ' > ' . $POST__DOM . ' > ' . $POST__MOD;
        $KDE__ERROR = "THE SKY LOCATED A HOME IN SIGHT. CONSIDER LOCATING THAT HOME OR USE A UNIQUE WORLD_NAME.";
        ################################

    $cUID = 'cUID-' . strtoupper(bin2hex(random_bytes(8)));
        $CHEST__HEADER = "GENERATED " . $GEN__WORLD_NAME;
        $CHEST__CONTEXT = 'CREATED BY ' . $POST__SYS;
        $CHEST__ACTOR = $TOOL_NAME;
        $CHEST__EVENT = $TOOL_FUNC;
        $CHEST__EVENT_LOCATON = $TOOL_LOC;

    $tUID = 'tUID-' . date('Ymd') . '.' . strtoupper(bin2hex(random_bytes(3)));
        $unix = time();
        $tzone = $POST__TIMEZONE;
        $ms = round(microtime(true) * 1000);
        $time = new DateTime("@$unix");
        $time->setTimezone(new DateTimeZone($tzone));
        $timezone = $time->format("e");
        $localtime = $time->format("h:i:sA");
        $simpledate = date('Y-m-d');

        function buildTPS($unix, $ms,$tzone) {
            $tpsDT = new DateTime("@$unix");
            $tpsDT->setTimezone(new DateTimeZone("UTC"));
            $year = (int)$tpsDT->format('x');

            return [
                "UNIX" => $unix,
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

    $tpsDATA = buildTPS($unix,$ms,$tzone);
    

//  BET ROUTE__LINE >>>>>>>>>>>>>>>>>>>>>>>>
$ROUTE__LINE = ROUTE("b");

    $ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . $GEN__WORLD_NAME . '/';
    
        if (is_dir($ROUTE)) { KDE($$KDE__ERROR_TYPE, $KDE__SOURCE, $KDE__ECHO_CHAIN, $KDE__ERROR);}
        else { mkdir($ROUTE, 0775, true); }
        
        $CREATED_SKY_AUTH = CREATE_SKY_AUTH($GEN__WORLD_NAME, $VARIANT);
        $SKY_AUTH = $ROUTE . '-SKY_AUTH-' . $GEN__WORLD_NAME . '.php';

    file_put_contents($SKY_AUTH, $CREATED_SKY_AUTH);

        $CREATED_SKY_SIG = CREATE_SKY_SIG($GEN__WORLD_NAME, $GEN__WORLD_SYS, $GEN__WORLD_DOM, $GEN__WORLD_MOD, $VARIANT);
        $SKY_SIG = $ROUTE . '-SKY_SIG-' . $GEN__WORLD_NAME . '.php';

    file_put_contents($SKY_SIG, $CREATED_SKY_SIG);

        $CREATED_INDEX = CREATE_INDEX($GEN__WORLD_NAME, $VARIANT);
        $INDEX = $ROUTE . 'index.php';

    file_put_contents($INDEX, $CREATED_INDEX);

//  KHAF ROUTE LINE >>>>>>>>>>>>>>>>>>>>>>>>
$ROUTE__LINE = ROUTE("c");

    $ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . $GEN__WORLD_NAME . '/';
    
        if (is_dir($ROUTE)) { KDE($KDE__ERROR_TYPE, $KDE__SOURCE, $KDE__ECHO_CHAIN, $KDE__ERROR);}
        else { mkdir($ROUTE, 0775, true); }
        
        $CREATED_WORLD_SIG = CREATE_WORLD_SIG($GEN__WORLD_NAME, $POST__LOVERS_MARK, $GEN__ROOM, $VARIANT);
        $WORLD_SIG = $ROUTE . '--SIG--' . $GEN__WORLD_NAME . '.php';

        $CREATED_ERROR_FIG = CREATE_ERROR_FIG($VARIANT);
        $ERROR_FIG = $ROUTE . '-FIG--routeErrors.php';
            
    file_put_contents($WORLD_SIG, $CREATED_WORLD_SIG);
    file_put_contents($ERROR_FIG, $CREATED_ERROR_FIG);

//  MEM ROUTE LINE >>>>>>>>>>>>>>>>>>>>>>>>
$ROUTE__LINE = ROUTE("m");

    $ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . 'rooms/' . $GEN__WORLD_NAME .'/';

    $WELCOME_ROOM = $ROUTE . '/WELCOME-HOME/';
    $FIRST_ROOM = $ROUTE . $GEN__ROOM . '/';
    
        if (!is_dir($WELCOME_ROOM)) { mkdir($WELCOME_ROOM, 0775, true); }
        if (!is_dir($FIRST_ROOM)) { mkdir($FIRST_ROOM, 0775, true); }

        $CREATED_WELCOME_ROOM = CREATE_WELCOME_HOME($GEN__WORLD_NAME, $GEN__ROOM, $VARIANT);
        $WELCOME_HOME = $WELCOME_ROOM . 'hi-from-SKY.php';

    file_put_contents($WELCOME_HOME, $CREATED_WELCOME_ROOM);

//  ALEPH ROUTE LINE >>>>>>>>>>>>>>>>>>>>>>>>
$ROUTE__LINE = ROUTE('a');

    $ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . $GEN__WORLD_NAME . '/' . $POST__ACTING__AS . '/';
    
        if (is_dir($ROUTE)) { KDE($$KDE__ERROR_TYPE, $KDE__SOURCE, $KDE__ECHO_CHAIN, $KDE__ERROR);}
        else { mkdir($ROUTE, 0775, true); }

        $CREATED_SHELL = CREATE_BASE_SHELL($VARIANT);
        $SHELL = $ROUTE . 'shell.php';

        $CREATED_HEADER = CREATE_BASE_HEADER($GEN__WORLD_NAME, $VARIANT);
        $HEADER = $ROUTE . 'header.php';

        $CREATED_FOOTER = CREATE_BASE_FOOTER($VARIANT);
        $FOOTER = $ROUTE . 'footer.php';

        $CREATED_STYLESHEET = CREATE_BASIC_STYLE($VARIANT);
        $STYLE = $ROUTE . 'style.css'; //empty sheet
            
    file_put_contents($SHELL, $CREATED_SHELL);
    file_put_contents($HEADER, $CREATED_HEADER);
    file_put_contents($FOOTER, $CREATED_FOOTER);
    file_put_contents($STYLE, $CREATED_STYLESHEET);

// TIME TO MAKE A CRATE
$ROUTE__LINE = ROUTE('d');

$ROUTE = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . $TOOL_LOC . '/';
    if (!is_dir($ROUTE)) { mkdir($ROUTE, 0775, true); }   

  $CHEST = $ROUTE . '/data.json';

  $json = file_get_contents($CHEST);
  $CHEST_THINGS = json_decode($json, true);

  if (!$CHEST_THINGS) {
    $CHEST_THINGS = [];
  }

  $CHEST_THINGS[$cUID] = [
    "TUID__REF" => $tUID, 
    // CUSTOM CHEST DETAILS HERE

    "GEN__WORLD_NAME" => $GEN__WORLD_NAME,
    "WORLD_LOVERS_MARK" => $POST__LOVERS_MARK,
    "THEME__VARIANT" => $VARIANT,
    "GEN__WORLD_SYS" => $GEN__WORLD_SYS,
    "GEN__WORLD_DOM" => $GEN__WORLD_DOM,
    "GEN__WORLD_MOD" => $GEN__WORLD_MOD,
    "GEN__WORLD__ACTING_AS" => $POST__ACTING__AS,
    "GEN__ROOM" => $GEN__ROOM,

    //DO NOT MODIFY BELOW
    "META_DATA" => [
        "UNIX" => $unix,
        "GAIA__DATE" => $simpledate,
        "GAIA__TIME" => $localtime,
        "GAIA__TZONE" => $timezone,
        "POST__SYS" => $POST__SYS,
        "POST__DOM" => $POST__DOM,
        "POST__MOD" => $POST__MOD,
        "POST__VIEWPORT" => $POST__PV,
        "TOOL__LOCATION" => $TOOL_LOC,
        "TOOL__NAME" => $TOOL_NAME,
        "TOOL__FUNCTION" => $TOOL_FUNC,
        "CHEST__VERSION" => 2,
    ]
  ];

  file_put_contents($CHEST, json_encode($CHEST_THINGS, JSON_PRETTY_PRINT));
// ============================================================================
// YAY DONE!

// ============================================================================
// NOW LETS MAKE A ECHO-BALLBACK SO WE CAN SEE WHAT WE BEEN UP TO!
// ============================================================================

$ROUTE__LINE = ROUTE('z');

$dir = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . 'ECHO/' . date('Y') . '-' . date('m') . '/';
    if (!is_dir($dir)) { mkdir($dir, 0775, true); }   

  $file = $dir . '/' . $simpledate . '_dailyechos.json';
  $json = file_get_contents($file);
  $echos = json_decode($json, true);

  if (!$echos) {
    $echos = [];
  }

  $echos[$localtime . ': ' . $CHEST__HEADER] = [
    "CUID__REF" => $cUID, 
    "TUID__REF" => $tUID
    "CHEST__CONTEXT" => $CHEST__CONTEXT,
    "GAIA__DATE" => $simpledate,
    "GAIA__TIME" => $localtime,
    "GAIA__TZONE" => $timezone,
    "META__DATA" => [
        "ECHO__CHAIN" => $KDE__ECHO_CHAIN,
        "EVENT__ACTION" => $TOOL_FUNC,
        "EVENT__ACTOR" => $TOOL_LOC,
        "EVENT__TOOL" => $TOOL_NAME,
        "POST__PV" => $POST__PV,
        "ECHO__VERSION" => 2,
    ]
  ];

  file_put_contents($file, json_encode($echos, JSON_PRETTY_PRINT));


// YAAAAAAY DONE AGAIN!
// ============================================================================

// ============================================================================
// OH $@%! -- DON'T FORGET YOUR TPS REPORT
// ============================================================================
  $recordKeeper = $GLOBALS['sonar'] . $SHADOW_PROD_TOGGLE . $ROUTE__LINE . 'TPS';
    if (!is_dir($recordKeeper)) { mkdir($recordKeeper, 0775, true); }
  
  $tpsReport = $recordKeeper . '/tpsReport_' . $simpledate . '_data.json';
  $json = file_get_contents($tpsReport);
  $tpss = json_decode($json, true);

    if (!$tpss) {
        $tpss = [];
    }

    if (isset($tpss[$tUID])) {
        die("Already exists in this Location.");
    }

    $tpss[$tUID] = [
        "CUID__REF" => $cUID,
        "POST__SYS" => $POST__SYS,
        "POST__DOM" => $POST__DOM,
        "POST__MOD" => $POST__MOD,
        "POST__VIEWPORT" => $POST__PV,
        "TPS__VERSION" => 2,
        "TPS__REPORT" => $tpsDATA,
    ];

  file_put_contents($tpsReport, json_encode($tpss, JSON_PRETTY_PRINT));


}

