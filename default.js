let cclen = 0

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

function Select(data) {
    document.getElementById('countdown'+cid).id = 'countdown'+(cid+1);
    var display = '#countdown'+(cid+1);
    cid++;
    startCountdown(figure_weekly(data), display);
    openLobby("-100vh");
    openLobby("-100vh", "slobby0");
}

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

function sleep (time) {
    return new Promise((resolve) => setTimeout(resolve, time));
}

function clipboard(str) {
    navigator.clipboard.writeText(str);
}