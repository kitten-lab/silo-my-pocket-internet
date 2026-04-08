<?php
openSky($sys . '.' . $dom);

section($right,'','');

bigHeading("MAILROOM INBOX");

close_section();
getTool('mailroomBasic', 'ViewInbox');


closeSky();
?>