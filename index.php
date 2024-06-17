<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Azeret+Mono:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

<head>
    <title>Counter</title>
    <!--<link rel="icon" href="pics/favicon0.ico">-->
    <link rel="stylesheet" type="text/css" href="slim.css">
    <link rel="stylesheet" type="text/css" href="default.css">
    <script type="text/javascript" src="slim.js"></script>
    <script type="text/javascript" src="default.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div id="underlay"></div>
    <div id="overlay"></div>
      <!--TODO: Slim Version-->
      <button onclick="openLobby()" id="lobbybutton">...</button>
      <button onclick="fullscreen()" id="screenbutton">⇱</button>
      <div id="countbox">
        <div id="col1">
          <h1 id="countdown0"></h1>
          <div id="row1">
            <div class="tag"><p>tage</p></div>
            <div class="tag gappa"><p>stunden</p></div>
            <div class="tag gappa"><p>minuten</p></div>
            <div class="tag gappa"><p>sekunden</p></div>
          </div>
        </div>
      </div>
    <div id="lobby">
      <div class="ltitle"><h3>Wilkommen in der Lobby.</h3><br>
        <h4> Wähle einen Counter aus, den du sehen willst.</h4></div><br>
      <!-- <p class="Intro">(Die Funktion "Permanent wählen" nutzt Cookies.)</p> -->
      <div class="clist">
          <!-- TODO: Listing via JS and php API-->
      <?php
      $clist = array();
      $ccon = array();
      $clistlen = 0;

      $filesl = scandir("c_tt");
        foreach ($filesl as $file) {
          $filePath = 'c_tt/' . $file;
          if (is_file($filePath)) {
              $cfile = fopen($filePath, "r");
              $cfilecon = fread($cfile, filesize($filePath));
              fclose($cfile);

              $ccon[$clistlen] = $cfilecon;
              $clist[$clistlen] = explode(".",$file)[0];
              echo '
                <p>' . $clist[$clistlen] . ' 
                <button id="b' . $clistlen . '" name="' . $clist[$clistlen] . '" onclick=Select("' . $ccon[$clistlen] . '")>Ansehen</button>
                <!-- <a href="setcookie.php?c='.$clist[$clistlen].'">Permanent wählen</a></p> -->
              ';
              $clistlen++;
          }
        }
      ?>
      </div><!-- clist -->
      <button id='inLobbyButton' onclick='openLobby("-100vh")'><-</button>
      <button id='SlobbyButton' onclick='openLobby("0", "slobby0")'>Set your own Contdown-></button>
    </div><!-- lobby -->
    <div id="slobby0">
        <div id="ccformblock">
            <div id="ccset"></div>
            <div class="formendbar">
                <div class="ccb-left">
                    <button onclick="AddEntry()">+</button>
                    <button onclick="ResetCustom()">↺</button>
                </div>
                <div class="ccb-right">
                    <button onclick="HandleCustomLink()">=></button>
                </div>
            </div>
            <p id="ccformout"></p>
        </div><!-- ccformblock -->
        <button id='inLobbyButton' onclick='openLobby("-100vh", "slobby0"); openLobby("-100vh");'><-</button>
    </div><!-- slobby0 -->
</body>

