<?php
openSky("TERMINAL.ROOT");
nameSelf("ROOT");
section($right,'color:gray','');

bigHeading("MAILROOM OUTBOX");
leaf("OUTCOMING INTERA MAIL CHARLIE OMEGA 4.3.3
$BR  .........");

close_section();

medHeading("Sorted oldest to newest.");
getTool('mailroomBasic', 'ViewOutbox');


closeSky();
?>