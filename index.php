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
  #countdown0 {margin: 0; padding: 0;}
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
      font-size: 8vh;
    /*font-size: 3em;*/
    margin-bottom: 0;
    font-family: 'Azeret Mono', monospace;
  }
  .ltitle h4 {
    /*background-color: blue;*/
    /*font-size: 2em;*/
    font-size: 6vh;
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
    /*max-width: 80vh;*/
    top:0;
    margin-bottom: 4vh;
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>

<body>
    <div id="underlay"></div>
    <div id="overlay"></div>
      <!--TODO: Remove Lobby-button when selective Domain is set-->
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
    </div><!-- lobby -->
</body>

<script>
    const rgb = detColors();
    let cid = 0;
    var elem = document.documentElement;
    let full = false;
    var wakeLock = null;
    let wakeSent;
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var isgoing = false;

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

          try {
              document.querySelector(display).textContent = days + ":" + hours + ":" + minutes + ":" + seconds;
          } catch {
              return;
          }

          if (--timer < 0) {
              clearInterval(interval);
              document.querySelector(display).textContent = "Countdown finished!";
          }
            opac = (timer / 3600);
            if (opac > 1) {
              opac = 1; 
            }
            aopac = 1 - (opac);

            if(isgoing === true)
              {document.getElementById("underlay").style.background = "rgba("+ rgb[0] +", "+ rgb[1] +", "+ rgb[2] +", " + aopac + ")";
              document.getElementById("overlay").style.background = "rgba("+ rgb[3] +", "+ rgb[4] +", "+ rgb[5] +", " + opac + ")";
                    /*display.textContent = "true in - opac - rot";*/}
            else {document.getElementById("overlay").style.background = "rgba("+ rgb[0] +", "+ rgb[1] +", "+ rgb[2] +", " + opac + ")";
                 document.getElementById("underlay").style.background = "rgba("+ rgb[3] +", "+ rgb[4] +", "+ rgb[5] +", " + aopac + ")";
                   /*display.textContent = "false out - opac - grün";*/}
      }, 1000);
  }
  
  window.onload = function () {
      startCountdown(figure_weekly(AutoChoose()), '#countdown0');
  };

  function detColors() {
      /*TODO WHEN FREE: detColors from file,
      requires JSON-Encrypt, Full JS*/
      const queryString = window.location.search;
      const urlParams = new URLSearchParams(queryString);
      const colorstamp = urlParams.get('cs');

      if(colorstamp != null) {
          let back = [];

          for (let i = 0; i < 6; i++) {
              back[i] = parseInt(colorstamp.substring(2 * i, 2 * i + 2), 16);
          }

          return back;
      } else {return [42, 240, 0, 255, 31, 31];} //meine Fallback-Werte
  }

  function openLobby(v="0") {
    document.getElementById("lobby").style.top = v;
  }

  function isDST(date) {
        let jan = new Date(date.getFullYear(), 0, 1).getTimezoneOffset();
        let jul = new Date(date.getFullYear(), 6, 1).getTimezoneOffset();
        return Math.max(jan, jul) !== date.getTimezoneOffset();
    }

  function Select(data) {
        document.getElementById('countdown'+cid).id = 'countdown'+(cid+1);
        var display = '#countdown'+(cid+1);
        cid++;
        startCountdown(figure_weekly(data), display);
        openLobby("-100vh");
    }

  function AutoChoose(){
        if(urlParams.has('ts')) {
            return urlParams.get('ts');
        } else {
            let cname = "lederle";

            if(urlParams.has('c')) {cname = urlParams.get('c');}
            //TODO Cookies wieder supporten aber js cookies sind shit
            //else if(Cookies.get('cname') !== null) {cname = Cookies.get('cname') + " ";}

            cname = "\"" + cname + "\"";

            let onclstr = document.querySelector("button[name=" + cname + "]").onclick.toString();
            return onclstr.substring(34, onclstr.length - 4);
        }
    }

  function figure_weekly(rawstr="213000&5400&385800&5400") {
      cnt = 0;

      const d = new Date();
      let onejan = new Date(d.getFullYear(), 0, 1);
      let abw = ((Math.ceil((((d.getTime() - onejan.getTime()) / 86400000) + onejan.getDay() + 1) / 7) + 1) % 2);

      tiw = (Math.floor(d.getTime() / 1000) + 3 * 86400 + 3600) % (7 * 86400);
      if(isDST(d)) {tiw = tiw + 3600 % (7 * 86400);}

      //dividing str for cells
      let stray1;
      if(rawstr !== rawstr.replace("%26", "")) {
          stray1 = rawstr.split("%26");
      } else {
          stray1 = rawstr.split("&");
      }

      //generating arrays
      const tsinweekarr = [];
      const lenarr = [];
      for(let i = 0; i < stray1.length/2; i++) {
          let rawcel = stray1[i * 2];
          let acel = stray1[i * 2].replace("A", "");
          let bcel = stray1[i * 2].replace("B", "");

          if(abw === 0 && acel!==rawcel) {
              tsinweekarr.push(Number(acel));
              lenarr.push(Number(stray1[i * 2 + 1]));
          } else if(abw === 1 && bcel!==rawcel) {
              tsinweekarr.push(Number(bcel));
              lenarr.push(Number(stray1[i * 2 + 1]));
          } else if(acel===bcel) {
              tsinweekarr.push(Number(acel));
              lenarr.push(Number(stray1[i * 2 + 1]));
          }
      }

      //Value-code
      let next = 604800;

      for(let i = 0; i < tsinweekarr.length; i++) {
          if(tsinweekarr[i] < tiw && tiw < (tsinweekarr[i] + lenarr[i])) {isgoing = true;}

          let pnext = ((7 * 86400) + tsinweekarr[i] - tiw + lenarr[i]) % (7 * 86400);
          if(pnext < next && pnext > 0) {
              if(!isgoing) {next = pnext - lenarr[i];} else {next = pnext;}
          }
      }
      return next;
  }

  async function fullscreen() {
      if (full) {
          closeFullscreen();
      } else {
          openFullscreen();
      }
  }

  function openFullscreen() {
      if (elem.requestFullscreen) {
        elem.requestFullscreen();
      } else if (elem.webkitRequestFullscreen) { /* Safari */
        elem.webkitRequestFullscreen();
      } else if (elem.msRequestFullscreen) { /* IE11 */
        elem.msRequestFullscreen();
      }
  }

  function closeFullscreen() {
      if (document.exitFullscreen) {
        document.exitFullscreen();
      } else if (document.webkitExitFullscreen) { /* Safari */
        document.webkitExitFullscreen();
      } else if (document.msExitFullscreen) { /* IE11 */
        document.msExitFullscreen();
      }
  }

  //fullscreen event listener
  ["fullscreenchange", "webkitfullscreenchange", "mozfullscreenchange", "msfullscreenchange"].forEach(
      eventType => document.addEventListener(eventType, async function () {
          if (full) {
              if (wakeLock != null) {wakeLock.release();}
              full = false;
              console.log("closed")
          } else {
              try {
                  wakeLock = await navigator.wakeLock.request('screen');
              } catch {
                  console.log("no wakelock");
              }
              full = true;
              console.log("opened")
          }
      }, false)
  );
</script>