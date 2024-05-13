<h1>Der Lederle-Counter</h1>
In meinem Ersten Fachsemester des Informatik-Bachelors hatte ich Mathe bei der guten Frau Lederle. 
Ihr zu Ehren, habe ich einen Countdown geschrieben, der immer zur nächsten Ihrer Vorlesungen zählt, und von dortan zu ihrem Ende.
Mittlerweile gibt es für das Tool ein weites skillset. Die meisten Features sind selbsterklärend, daher möchte ich nicht auf sie eingehen. 
Aber ich habe ein paar Hinweise zum Einbetten in Form von Link oder iFrame:

<h3>Auswahl des Preset-Counters in der Domain</h3>
An dieser Stelle gehe ich davon aus, dass die Verwendung von <a href=https://www.w3schools.com/php/php_superglobals_get.asp>$_GET in php</a> bekannt ist.
Als solche $_GET-Variable kann man in der Domain <b>c</b> gleich des exakten Namen eines Counters, wie er auf der Liste in der Lobby steht setzen. 
Damit ist dieser Countdown vorausgewählt.
<br><i>(Wichtig ist hierbei, das Leerzeichen " " durch "%20" zu ersetzen)</i><br>

<h3>Setzen eines eigenen Counters in der Domain</h3>
Stattdessen kann man auch einen eigenen Counter setzen. Die dafür verwendete Variable heißt <b>ts</b>. Man kann beliebig viele Events nach dem folgenden Formant platzieren:

<h3>Das Speicherformat der Counter</h3>
