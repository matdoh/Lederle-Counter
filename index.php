<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Azeret+Mono:wght@600&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
<style>
  body {
    /*background-color: red;*/
    overflow: hidden;
    height: 100%;
    width: 100%;
    margin: 0;
  }
  h1 {
    font-size: 12vw;
    font-family: 'Azeret Mono', monospace;
  }
  #underlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    /*background-color: red;*/
    z-index: 1;
  }
  #overlay {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      z-index: 2;
      /*background: rgba(42, 240, 0, 0.55); /* Adjust the alpha value for the desired transparency */
  }
  #countdown {margin: 0; padding: 0;}
  #countbox { /*  flexboxen   */
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    z-index: 600;
  }

  #col1 {
    display: flex;
    flex-direction: column;
  }

  #row1 {
    display: flex;
    flex-direction: row;
  }
  .tag {
    margin-top: -20px;
    padding-top: 0;
    width: 18.181818%;
    text-align: center;
    font-family: 'Azeret Mono', monospace;
    letter-spacing: 4px;
  }
  .gappa {
    margin-left: 9.090909%;
  }
  #lobbybutton {
    top: 1em;
    right: 1em;
    position: absolute;
    z-index: 600;
  }
  #screenbutton {
      top: 1em;
      left: 1em;
      position: absolute;
      z-index: 600;
  }


  #lobby {
    transition: 0.8s;
    background: white;
    position: absolute;
    height: 100%;
    width: 100vw;
    overflow: hidden;
    top: -100vh;
    left: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    z-index: 700;
  }
  .ltitle {
    text-align: center;
  }
  .ltitle h3 {
    /*background-color: blue;*/
    font-size: 3em;
    margin-bottom: 0;
    font-family: 'Azeret Mono', monospace;
  }
  .ltitle h4 {
    /*background-color: blue;*/
    font-size: 2em;
    margin-top: 0;
    font-family: 'Azeret Mono', monospace;
    margin-bottom: 1em;
  }
  /*.intro {
    position: absolute;
    font-size: 0.8em;
    color: black;
    bottom: 1em;
    font-family: "Roboto", "Plus Jakarta", sans-serif;
    font-style: italic;
    a {
      color: inherit;
    }}*/
  .clist {
    /*background: blue;*/
    border-left: 2px solid black;
    padding-left: 1em;
    height: auto;
    max-width: 80vh;
    top:0;
    bottom: 2em;
    overflow: scroll;
    p {
      font-size: 1em;
      font-family: "Roboto", "Plus Jakarta", sans-serif;
      a {
        color: inherit;
      }
    }
  }
  button {
    background: none;
    border: none;
    font-size: 1em;
    color: black;
  }
  #inLobbyButton {
    position: absolute;
    top: auto;
    bottom: 1em;
    right: 1em;
  }
</style>

<head>
    <title>Counter</title>
    <!--<link rel="icon" href="pics/favicon0.ico">-->
</head>

<body>
    <div id="underlay"></div>
    <div id="overlay"></div>
      <button onclick="openLobby()" id="lobbybutton">...</button>
      <button onclick="fullscreen()" id="screenbutton">⇱</button>
      <div id="countbox">
        <div id="col1">
          <h1 id="countdown"></h1>
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
      <p class="Intro">(Die Funktion "Permanent wählen" nutzt Cookies.)</p>
      <div class="clist">
      <!-- TODO: AUtomated Listing from .txt -->
      <?php
      $clist = array();
      $clistlen = 0;

      $filesl = scandir("c_tt");
        foreach ($filesl as $file) {
          $filePath = 'c_tt/' . $file;
          if (is_file($filePath)) {
            $clist[$clistlen] = explode(".",$file)[0];
            echo "<p>" . ucwords($clist[$clistlen]) . ": " . 
              "<a href='../counter?c=".$clist[$clistlen]."'>Ansehen</a> " . 
              "<a href='setcookie.php?c=".$clist[$clistlen]."'>Permanent wählen</a></p>";
            $clistlen++;
          }
        }
      ?>
      </div><!-- clist -->
      <button id='inLobbyButton' onclick='openLobby("-100vh")'><-</button>
      <!--<a href="../counter">Lederle</a>-->
      <!-- TODO: Custom counters -->
    </div><!-- lobby -->
</body>

<?php
  date_default_timezone_set('Europe/Berlin');

  //counter 2.2.0
  $cnt = 0;
  $wd = date("w");
  $tiw = (time() + 3 * 86400) % (7 * 86400) + 3600;

  if(1 == date('I', time())) { $tiw += 3600;} //sommerzeit / winterzeit

  //set scedule
  $cname="lederle";
  if(isset($_GET['c'])) {$cname = $_GET['c'];} 
  elseif(isset($_COOKIE['cname'])) {$cname = $_COOKIE['cname'];}

  #file to str
  $ttfile = fopen("c_tt/".$cname.".txt", "r");
  $ttfilecon = fread($ttfile, filesize("c_tt/".$cname.".txt"));
  fclose($ttfile);
  #dividing str for cells
  $ttfileline = explode("&", $ttfilecon);
  #generating arrays
  $tsinweekarr = array();
  $lenarr = array();
  for($i = 0; isset($ttfileline[$i]); $i++) {
    if($i%2==0) {
      $tsinweekarr[$i/2] = intval($ttfileline[$i]);
    } else {
      $lenarr[($i-1)/2] = intval($ttfileline[$i]);
    }
  }

  //V-code starts
  $in = false;

  $next = 604800;
  for($i = 0; $i < count($tsinweekarr); $i++) {
      if($tsinweekarr[$i] < $tiw && $tiw < ($tsinweekarr[$i] + $lenarr[$i])) {$in = true;}
  
      $pnext = ((7 * 86400) + $tsinweekarr[$i] - $tiw + $lenarr[$i]) % (7 * 86400);
      if($pnext < $next && $pnext > 0) {
        if(!$in) {$next = $pnext - $lenarr[$i];} else {$next = $pnext;}
      }
  } 

  $cnt = $next;
?>

<script>
  function startCountdown(duration, display) {
      var timer = duration, days, hours, minutes, seconds;
      var interval = setInterval(function () {
          days = parseInt(timer / (60 * 60 * 24), 10);
          hours = parseInt(timer / (60 * 60) % 24, 10);
          minutes = parseInt(timer / 60 % 60, 10);
          seconds = parseInt(timer % 60, 10);

          days = days < 10 ? "0" + days : days;
          hours = hours < 10 ? "0" + hours : hours;
          minutes = minutes < 10 ? "0" + minutes : minutes;
          seconds = seconds < 10 ? "0" + seconds : seconds;

          display.textContent = days + ":" + hours + ":" + minutes + ":" + seconds;

          if (--timer < 0) {
              clearInterval(interval);
              display.textContent = "Countdown finished!";
          }
            opac = (timer / 3600);
            if (opac > 1) {
              opac = 1; 
            }
            aopac = 1 - (opac);
            if(<?php echo var_export($in, true); ?>) 
              {document.getElementById("underlay").style.background = "rgba(42, 240, 0, " + aopac + ")";
              document.getElementById("overlay").style.background = "rgba(255, 31, 31, " + opac + ")";
                    /*display.textContent = "true in - opac - rot";*/}
            else {document.getElementById("overlay").style.background = "rgba(42, 240, 0, " + opac + ")";
                 document.getElementById("underlay").style.background = "rgba(255, 31, 31, " + aopac + ")";
                   /*display.textContent = "false out - opac - grün";*/}
      
      }, 1000);
  }
  
  window.onload = function () {
      var duration = 0;
      duration = <?php echo $cnt; ?>;

      var display = document.querySelector('#countdown');
      startCountdown(duration, display);
      figure_timer();
  };

  function openLobby(v="0") {
    document.getElementById("lobby").style.top = v;
  }

  function figure_timer(rawstr="") { //counter ß3.0.0
    cnt = 0;

    const d = new Date();
    wd = d.getDay();
    tiw = (d.getTime() + 3 * 86400) % (7 * 86400);

    console.log(tiw);

    //if(!date('I', d.getTime())) { $tiw += 3600; } //sommerzeit / winterzeit
  }

      /* Get the documentElement (<html>) to display the page in fullscreen */
  var elem = document.documentElement;
  let full = false;
  // Get the WakeLock API
  var wakeLock = null;
  let wakeSent;

  async function fullscreen() {
      if (full) {
          closeFullscreen();
          //document.addEventListener('touchstart', function() {
          //wakeLock.release();
          //});
          //full = false;
      } else {
          openFullscreen();
          //try {
          //    wakeLock = await navigator.wakeLock.request('screen');
          //} catch {console.log("failure");}

          //full = true;
      }
  }

  /* View in fullscreen */
  function openFullscreen() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
      }
  }

  /* Close fullscreen */
  function closeFullscreen() {
      if (document.exitFullscreen) {
      document.exitFullscreen();
  } else if (document.webkitExitFullscreen) { /* Safari */
      document.webkitExitFullscreen();
  } else if (document.msExitFullscreen) { /* IE11 */
      document.msExitFullscreen();
  }
  }

  ["fullscreenchange", "webkitfullscreenchange", "mozfullscreenchange", "msfullscreenchange"].forEach(
      eventType => document.addEventListener(eventType, async function () {
          if (full) {
              wakeLock.release();
              full = false;
              console.log("closed")
          } else {
              try {
                  wakeLock = await navigator.wakeLock.request('screen');
              } catch {
                  console.log("failure");
              }
              full = true;
              console.log("opened")
          }
      }, false)
  );
</script>