const rgb = detColors();
let cid = 0;
let elem = document.documentElement;
let full = false;
const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);
let isgoing = false;

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

function isDST(date) {
    let jan = new Date(date.getFullYear(), 0, 1).getTimezoneOffset();
    let jul = new Date(date.getFullYear(), 6, 1).getTimezoneOffset();
    return Math.max(jan, jul) !== date.getTimezoneOffset();
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