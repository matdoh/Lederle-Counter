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
  p {
      font-family: "Roboto", "Plus Jakarta", sans-serif;
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
      p {
          font-family: 'Azeret Mono', monospace;
          letter-spacing: 4px;
      }
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

  #slobby0 {
      transition: 0.8s;
      background: #FFF;
      position: absolute;
      height: 100%;
      width: 100vw;
      overflow: hidden;
      top: -100vh;
      left: 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      z-index: 710;
      box-sizing: border-box;
      -moz-box-sizing: border-box;
      -webkit-box-sizing: border-box;
      border-bottom: 12px solid #777777;
  }
  #ccformblock {
      margin-top: 10vh;
      max-height: 80vh;
      overflow: scroll;
  }
  .ccentry {
      border-bottom: 1px solid black;
      padding: 0.7em 0;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      height: 120px;
  }
  #ccformout button {
      text-decoration: underline;
      font-style: italic;
  }
  @keyframes ccentry0 {
      0% {
          height: 0;
          padding: 0;
      } 99% {
          height: 120px;
          padding: 0.7em 0;
          div {
              display: none;
              opacity: 0;
          }
      } 100% {
          div {
              display: flex;
              opacity: 100%;
          }
      }
  }
  @keyframes ccentry1 {
      0% {
          div {
              display: flex;
              opacity: 100%;
          }
      } 1% {
            height: 120px;
            padding: 0.7em 0;
            div {
                display: none;
                opacity: 0;
            }
        } 100% {
            height: 0;
            padding: 0;
        }
  }
  .formendbar {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
      padding-top: 0.7em;
  }
  .wdbar {
      margin-bottom: 0.7em;
  }
  .wden {
      -webkit-appearance: none;
      appearance: none;
      width: 40px;
      height: 40px;
      position: relative;
      background: #DDDDDD;
      transition: 0.1s;
      margin: 0 10px;
  }
  .wden:after {
      position: absolute;
      top: 50%;
      left: 50%;
      z-index: 709;
      transform: translate(-50%, -50%);
      font-family: 'Azeret Mono', monospace;
  }
  .wden:hover {
      border: 1px solid #777777;
      background: #BBBBBB;
  }
  .wden:checked {
      border: 2px solid darkblue;
      background: lightskyblue;
  }
  .wdmon:after {content: "mo";}
  .wdtue:after {content: "di";}
  .wdwed:after {content: "mi";}
  .wdthu:after {content: "do";}
  .wdfri:after {content: "fr";}
  .wdsat:after {content: "sa";}
  .wdsun:after {content: "so";}

  .wddetails {
      height: 42px;
      display: flex;
      font-family: 'Azeret Mono', monospace;
      align-items: center;
  }
  .wdditem {
      display: flex;
      flex-direction: row;
      align-items: center;
      padding: 20px;
  }
  .abinput {
      box-sizing: border-box;
      -webkit-appearance: none;
      appearance: none;
      height: 40px;
      width: 40px;
      border: none;
      background: #DDDDDD;
      transition: 0.1s;
      margin-left: 10px;
      font-family: inherit;
      text-align: center;
  }
  .abinput:hover {
      border-bottom: 1px solid #777777;
      background: #BBBBBB;
  }
  .abinput:focus {
      outline: none;
      border-bottom: 2px solid darkblue;
  }
  .tsinput {
      font-family: inherit;
      padding-left: 10px;
  }
  .tsinput input{
      box-sizing: border-box;
      -webkit-appearance: none;
      appearance: none;
      height: 40px;
      width: 40px;
      border: none;
      background: #DDDDDD;
      transition: 0.1s;
      font-family: inherit;
      text-align: center;
      margin: 3px;
  }
  .tsinput input:hover {
      border-bottom: 1px solid #777777;
      background: #BBBBBB;
  }
  .tsinput input:focus {
      outline: none;
      border-bottom: 2px solid darkblue;
  }
  .tsinput input::-webkit-inner-spin-button {
      -webkit-appearance: none;
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

<script>
    const rgb = detColors();
    let cid = 0;
    var elem = document.documentElement;
    let full = false;
    const queryString = window.location.search;
    const urlParams = new URLSearchParams(queryString);
    var isgoing = false;
    let cclen = 0

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
      AddEntry();
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

  function AddEntry() {
      const ccentry = document.createElement("div");
        ccentry.className = "ccentry";
        //ccentry.style = "height: 0; padding: 0;";
        const wdbar = document.createElement("div");
            wdbar.className = "wdbar";
            const wdmon = document.createElement("input");
                wdmon.type = "radio";
                wdmon.name = "wd" + cclen;
                wdmon.className = "wdmon wden";
                wdmon.value = "0";
                wdbar.appendChild(wdmon);
            const wdtue = document.createElement("input");
                wdtue.type = "radio";
                wdtue.name = "wd" + cclen;
                wdtue.className = "wdtue wden";
                wdtue.value = "1";
                wdbar.appendChild(wdtue);
            const wdwed = document.createElement("input");
                wdwed.type = "radio";
                wdwed.name = "wd" + cclen;
                wdwed.className = "wdwed wden";
                wdwed.value = "2";
                wdbar.appendChild(wdwed);
            const wdthu = document.createElement("input");
                wdthu.type = "radio";
                wdthu.name = "wd" + cclen;
                wdthu.className = "wdthu wden";
                wdthu.value = "3";
                wdbar.appendChild(wdthu);
            const wdfri = document.createElement("input");
                wdfri.type = "radio";
                wdfri.name = "wd" + cclen;
                wdfri.className = "wdfri wden";
                wdfri.value = "4";
                wdbar.appendChild(wdfri);
            const wdsat = document.createElement("input");
                wdsat.type = "radio";
                wdsat.name = "wd" + cclen;
                wdsat.className = "wdsat wden";
                wdsat.value = "5";
                wdbar.appendChild(wdsat);
            const wdsun = document.createElement("input");
                wdsun.type = "radio";
                wdsun.name = "wd" + cclen;
                wdsun.className = "wdsun wden";
                wdsun.value = "6";
                wdbar.appendChild(wdsun);
            ccentry.appendChild(wdbar);
        const wddetails = document.createElement("div");
            wddetails.className = "wddetails"
            const begindiv = document.createElement("div");
                begindiv.className = "wdditem";
                const beginlabel = document.createElement("label");
                    const bltext = document.createTextNode("beginn: ");
                        beginlabel.appendChild(bltext);
                    beginlabel.htmlFor = "start" + cclen + "h";
                begindiv.appendChild(beginlabel);
                const begin = document.createElement("div");
                    begin.id = "start" + cclen;
                    begin.className = "tsinput";
                    const beginh = document.createElement("input");
                        beginh.id = "start" + cclen + "h";
                        beginh.name = "start" + cclen + "h";
                        beginh.type = "number";
                        beginh.max = "23";
                        beginh.min = "0";
                        begin.appendChild(beginh);
                    const beginsep = document.createTextNode(":");
                        begin.appendChild(beginsep);
                    const beginm = document.createElement("input");
                        beginm.id = "start" + cclen + "m";
                        beginm.name = "start" + cclen + "m";
                        beginm.type = "number";
                        beginm.max = "59";
                        beginm.min = "0";
                        begin.appendChild(beginm);
                begindiv.appendChild(begin);
            wddetails.appendChild(begindiv)
            const enddiv = document.createElement("div");
                enddiv.className = "wdditem";
                const endlabel = document.createElement("label");
                    const eltext = document.createTextNode("ende: ");
                        endlabel.appendChild(eltext);
                    endlabel.htmlFor = "end" + cclen + "h";
                    enddiv.appendChild(endlabel);
                const end = document.createElement("div");
                    end.id = "end" + cclen;
                    end.className = "tsinput";
                    const endh = document.createElement("input");
                        endh.id = "end" + cclen + "h";
                        endh.name = "end" + cclen + "h";
                        endh.type = "number";
                        endh.max = "23";
                        endh.min = "0";
                        end.appendChild(endh);
                    const endsep = document.createTextNode(":");
                        end.appendChild(endsep);
                    const endm = document.createElement("input");
                        endm.id = "end" + cclen + "m";
                        endm.name = "end" + cclen + "m";
                        endm.type = "number";
                        endm.max = "59";
                        endm.min = "0";
                        end.appendChild(endm);
                    enddiv.appendChild(end);
                wddetails.appendChild(enddiv);
            const abdiv = document.createElement("div");
                abdiv.className = "wdditem";
                const ablabel = document.createElement("label");
                    const abltext = document.createTextNode("wochenzyklus [A/B/ ]: ");
                        ablabel.appendChild(abltext);
                    ablabel.htmlFor = "abz" + cclen;
                    abdiv.appendChild(ablabel)
                const abz = document.createElement("input");
                    abz.id = "abz" + cclen;
                    abz.name = "abz" + cclen;
                    abz.type = "text";
                    abz.className = "abinput";
                    abdiv.appendChild(abz);
                wddetails.appendChild(abdiv);
            ccentry.appendChild(wddetails);
        const form = document.getElementById("ccset");
      ccentry.style = "animation: ccentry0 0.6s linear;";
        form.appendChild(ccentry);

    cclen+=1;
  }

  function openLobby(v="0", e="lobby") {
    document.getElementById(e).style.top = v;
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
        openLobby("-100vh", "slobby0");
    }

  //TODO: HandleCustom()
  function HandleCustomLink() {
      //check wheter all values required are given
      let wd = []; let starth = []; let startm = []; let endh = []; let endm = []; let abz = [];
      let backstr = "";
      for(let i=0; i<cclen; i++) {
          //grab values
          document.querySelectorAll("input[name=wd" + i + "]").forEach(function fn(element) { if(element.checked) {wd[i] = element.value;}});
          console.log(wd[i]);
          starth[i] = document.getElementById('start' + i + 'h').value;
          console.log(starth[i]);
          startm[i] = document.getElementById('start' + i + 'm').value;
          endh[i] = document.getElementById('end' + i + 'h').value;
          endm[i] = document.getElementById('end' + i + 'm').value;
          abz[i] = document.getElementById('abz' + i).value; if(abz[i] == null){abz[i]="";}
          if(wd[i] == null || starth[i] == null || startm[i] == null || endh[i] == null || endm[i] == null)
            {alert("not all required values given");}

          //insert values to big string
          if(i!==0) {backstr += "%26";}
          backstr += abz[i];
          let startsecint = parseInt(wd[i]) * 86400 + parseInt(starth[i]) * 3600 + parseInt(startm[i]) * 60;
          backstr += startsecint + "%26";
          let endsecint = parseInt(wd[i]) * 86400 + parseInt(endh[i]) * 3600 + parseInt(endm[i]) * 60;
          backstr += (endsecint - startsecint);

          document.getElementById('ccformout').innerHTML = "dein personalisierter Link: <button onclick='Select(\"" + backstr + "\"); clipboard(\"matdoh.de/counter/?ts=" + backstr + "\")'>in die Zwischenablage kopieren</button>.";

      }

      //console.log("Hier bin ich");
  }

  async function ResetCustom() {
      let ccentries = document.querySelectorAll(".ccentry");
      ccentries.forEach(function fn(element) {
          element.style = "animation: 0.3s linear 0s 1 none normal running ccentry1;";
      });
      await sleep(290);
      ccentries.forEach((element) => element.remove());
      cclen = 0;
      AddEntry();
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

  function sleep (time) {
      return new Promise((resolve) => setTimeout(resolve, time));
  }

  function clipboard(str) {
        navigator.clipboard.writeText(str);
    }

  //fullscreen event listener
    //TODO: Fix WakeLock (it seems buggy but not really tested)
    let wakeLock = null;
    let wakeSent;
  ["fullscreenchange", "webkitfullscreenchange", "mozfullscreenchange", "msfullscreenchange"].forEach(
      eventType => document.addEventListener(eventType, async function () {
          if (full) {
              if (wakeLock != null) {wakeLock.release();}
              full = false;
              console.log("closed")
          } else {
              try {
                  wakeLock = await navigator.wakeLock.request('screen');
                  console.log(wakeLock)
              } catch {
                  console.log("no wakelock");
              }
              full = true;
              console.log("opened")
          }
      }, false)
  );
</script>