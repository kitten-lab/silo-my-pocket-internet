<?php 

//SHADOW ENV FUNCTION
function SHADOW_PROD_ENV($IS_IT) {
    if ($IS_IT == true) { return '_____/'; }
}

function TEMPLATE($FILE,$VARIANT) {
    $GET = __DIR__ . '/templates/' . $VARIANT . $FILE;
    return $GET;
}

//error logger
function KDE($ERROR_TYPE, $SOURCE, $ECHO_CHAIN, $ERROR) {
    $TIME_ERRORED = time();
    $KDE_DATE = date('M d h:iA');
    $LOG_RECORD = [
        'UNIX' => $TIME_ERRORED,
        'DATE' => $KDE_DATE,
        'KDE__SOURCE' => $SOURCE,
        'KDE-TYPE' => 'ERR: ' . $ERROR_TYPE,
        'ECHO__TRACKBACK_CHAIN' => $ECHO_CHAIN ?? 'UNDEFINED',
        'KDE__ERROR_MSG' => $ERROR
        ];

    file_put_contents(
        __DIR__ . '/../../../z/KDE/' . date('Y-m') . '_error.json',
        json_encode($LOG_RECORD) . PHP_EOL,
        FILE_APPEND
    );

    die($ERROR);
}


// ROUTER FUNCTIONS
function ROUTE($LETTER){
    return $LETTER . '/'; 
    }

// create a WORLD AUTH file //
function CREATE_SKY_AUTH($WORLD_NAME, $VARIANT) {
    $template = file_get_contents(TEMPLATE('/SKY_AUTH.php', $VARIANT)); 
    return str_replace('{{WORLD_NAME}}', $WORLD_NAME, $template);
}

// create a WORLD SIG file //
function CREATE_SKY_SIG($WORLD_NAME, $WORLD_SYS, $WORLD_DOM, $WORLD_MOD, $VARIANT){
    $template = file_get_contents(TEMPLATE('/SKY_SIG.php', $VARIANT));
    
    $result = str_replace(
        ['{{WORLD_NAME}}', '{{SYS}}', '{{DOM}}', '{{MOD}}'],
        [$WORLD_NAME, $WORLD_SYS, $WORLD_DOM, $WORLD_MOD, $VARIANT],
    $template);
    
    return $result;
}

// create a WORLD SIG file //
function CREATE_WORLD_SIG($WORLD_NAME, $LOVERS_MARK, $ROOM, $VARIANT){
    $template = file_get_contents(TEMPLATE('/WORLD_SIG.php', $VARIANT));

    $result = str_replace(
        ['{{WORLD_NAME}}', '{{LOVERS_MARK}}', '{{ROOM}}'],
        [$WORLD_NAME, $LOVERS_MARK, $ROOM],
    $template);
    
    return $result;
}

// MAKE THE DEFAULT ERRORS FOR DOORS
function CREATE_ERROR_FIG($VARIANT){
    $template = file_get_contents(TEMPLATE('/ERROR_FIG.php', $VARIANT));
    return $template;
}

 // MAKE THE INDEX
function CREATE_INDEX($WORLD_NAME, $VARIANT){
    $template = file_get_contents(TEMPLATE('/index.php', $VARIANT));
    return str_replace('{{WORLD_NAME}}', $WORLD_NAME, $template);
}

 // MAKE THE INDEX
function CREATE_WELCOME_HOME($WORLD_NAME, $ROOM, $VARIANT){
    $template = file_get_contents(TEMPLATE('/welcome.php', $VARIANT));

    $result = str_replace(
        ['{{WORLD_NAME}}', '{{ROOM}}'],
        [$WORLD_NAME, $ROOM],
    $template);
    
    return $result;
}

function CREATE_BASE_SHELL($VARIANT) {
    $template = file_get_contents(TEMPLATE('/shell.php', $VARIANT));

    return $template;
}

function CREATE_BASE_HEADER($WORLD_NAME, $VARIANT){
    $template = file_get_contents(TEMPLATE('/header.php', $VARIANT));
    return str_replace('{{WORLD_NAME}}', $WORLD_NAME, $template);
}

function CREATE_BASE_FOOTER($VARIANT){
    $template = file_get_contents(TEMPLATE('/footer.php', $VARIANT));
    return $template;
}

function CREATE_BASIC_STYLE($VARIANT){
    $template = file_get_contents(TEMPLATE('/style.css', $VARIANT));
    return $template;
}
?>