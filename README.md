<h1>Der Lederle-Counter</h1>
In meinem ersten Fachsemester des Informatik-Bachelors hatte ich Mathe bei der guten Frau Lederle. 
Ihr zu Ehren, habe ich einen Countdown geschrieben, der immer zur nächsten Ihrer Vorlesungen zählt, und von dortan zu ihrem Ende.
Mittlerweile gibt es für das Tool ein weites skillset. Die meisten Features sind selbsterklärend, daher möchte ich nicht auf sie eingehen. 
Aber ich habe ein paar Hinweise zum Einbetten in Form von Link oder iFrame:
<br><br>
<h3>Das Speicherformat der Counter</h3>
Das Speicherformat ist aus Gründen der Einfachkeit hiesiger Anwendung NICHT in JSON, sondern relativ formlos.
Datenwerte werden durch "&" getrennt. Es gehören immer zwei solcher Datenwerte zusammen.
Der Erste dieser Datenwerte ist der wöchentliche Beginn des Events in Sekunden ab Montag 0:00 Uhr,
der Zweite ist die Dauer des Events in Sekunden.
<br><i>(Geht das Event also Montags um 11:10 Uhr los, und ist 90 Minuten lang, wäre der benötigte Datensatz "40200&5400". 
<br>(Denn 40200 = 11*3600 + 10*60, und 5400 = 90*60))</i>
<br>Ist das Event nur jede zweite Woche, dann kann man den A&B-Wochenmodus nutzen, indem man vor den Wochenzeitstempel ein A oder ein B setzt.
Dabei steht ein A für jede ungerade Kalenderwoche, und ein B für jede Gerade.
<br><i>Findet das Event in jeder geraden Kalenderwoche statt, müsste man den benötigen Datensatz zu "B40200&5400" ändern.</i>
<br>Mehrere Events können in diesem Datensatz problemlos aneinander gereiht werden. Somit ist der Datensatz "<i>A126600&5400&385800&5400</i>" gültig.
<br><br>
<h3>Auswahl des Preset-Counters in der Domain</h3>
An dieser Stelle gehe ich davon aus, dass die Verwendung von <a href=https://www.w3schools.com/php/php_superglobals_get.asp>$_GET in php</a> bekannt ist.
Als solche $_GET-Variable kann man in der Domain <b>c</b> gleich des exakten Namen eines Counters, wie er auf der Liste in der Lobby steht setzen. 
Damit ist dieser Countdown vorausgewählt.
<br><i>(Wichtig ist hierbei, das Leerzeichen " " durch "%20" zu ersetzen)
<br>Eine Gültige Counter-Wahl wäre z.B. der Link "matdoh.de/counter/?c=Baumann".</i>
<br><br>
<h3>Setzen eines eigenen Counters in der Domain</h3>
Stattdessen kann man auch einen eigenen Counter setzen. Die dafür verwendete Variable heißt <b>ts</b>. 
Man kann beliebig viele Events nach dem oben stehenden Formant platzieren.
Sind sowohl <b>ts</b> als auch <b>c</b> gesetzt wird <b>ts</ts> gewertet
<br><i>(Auch hier, das "&" muss durch "%26" ersetzt werden.)</i>
