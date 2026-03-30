<!DOCTYPE html>
<html><head>
<title>WWW THE BROWSER WINDOW</title>
<!-- THE CALLING OF THE STYLESHEET PROCESSION -->
<style>
body {
    height: 98vh;
    }
.wwwExplorer_mainShell {
position: fixed;
top: 0;
left: 0;
right: 0;
bottom: 0;
background: gray;
overflow: hidden; /* Keeps screen content inside */
}


.wwwExplorer_windowTitleBar {
position: fixed;
top: 1.5vh;
left: 1vh;
right: 1vh;
height: 3.5vh;
background-image: linear-gradient(to top, blue, lightblue);
overflow: hidden; /* Keeps screen content inside */
box-shadow: 
    inset -.50vh -.50vh 0 #00000033, 
    inset .50vh .50vh 0 #FFFFFF66,
    .1vh .1vh 0 #FFFFFF66,
    -.1vh -.1vh 0 #00000066;
border: .15vh solid blue;
padding: .25vh 1vh;
}


.wwwExplorer_windowToolBar {
position: fixed;
top: 6.5vh;
left: 1vh;
right: 1vh;
height: 4vh;
background: #ffffff33;
overflow: hidden; /* Keeps screen content inside */
}


.wwwExplorer_innerShell {
position: fixed;
top: 12vh;
left: 1vh;
right: 1vh;
bottom: 4vh;
background: black;
overflow: scroll; /* Keeps screen content inside */
}


</style>
</head>
<body>

<div class="wwwExplorer_mainShell"></div>
<div class="wwwExplorer_windowTitleBar">Concept of Connection "Inter-Network"</div>
<div class="wwwExplorer_windowToolBar"></div>


<div class="wwwExplorer_innerShell"></div>



</body>
</html>