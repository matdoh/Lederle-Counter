<h1>Der Lederle-Counter</h1>
<i>(english version below)</i><br>
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
Sind sowohl <b>ts</b> als auch <b>c</b> gesetzt wird <b>ts</b> gewertet
<br><i>(Auch hier, das "&" muss in der Domain durch "%26" ersetzt werden.)</i>
<br><br>
<h3>Setzen eines eigenen Farbschemas in der Domain</h3>
Ebenso kann man ein eigenes Farbschema setzen. Die hier verwendete Variable heißt <b>cs</b>.
als Wert folgen zwei Hexadezimalwerte direkt aneinander geschrieben.
Dabei steht der Erste für die Farbe, die der Counter haben soll, solange das Event mehr als eine Stunde entfernt ist.
Der Zweite steht entsprechend für die Farbe, die der Counter hat, wenn das Event erreicht ist.
<br><i>Ein Beispiel-Link mit den default-Werten wäre also "matdoh.de/counter/?cs=2AF000FF1F1F"</i>
<br><br>
<h3>Hinweise für iFrames</h3>
Damit der Counter problemlos im iFrame funktioniert müssen einige Dinge gegeben sein. 
Zunächst einmal ist der Counter für Querformat designt, Hochvormat ist irgendwie etwas sinnlos.<br>
Des weiteren müssen dem iFrame folgendes Attribut gegeben werden: <b>allow="fullscreen;screen-wake-lock"</b>.
<br><br>
<h3>Weitere Hinweise</h3>
Die <a href="https://chromewebstore.google.com/detail/picture-in-picture-any-si/fgopnhbjlphjjcfbapfcbakjekpffkff">pip-Browser-Extension</a> ist sehr zu empfehlen, sie erlaubt es auf Desktop den Counter entkoppelt in der Ecke seines Bildschirms eingeblendet zu halten.

<h1>The Lederle-Countdown</h1>
In the first semester of my Computer-Science-Bachelor I had math-lectures from the nice Ms. Lederle. 
At her honor, I coded this countdown, that would always count down to her next lecture, or if in lecture, to it's end.
Nowadays this countdown has a wide range of features. Most of which are self-explaining, so I won't mention them here.
I do have some hints though about creating links or using iFrames:
<br><br>
<h3>The countdown's storage format</h3>
Because this application is rather simple, I chose NOT to use JSON (yet), and instead save Counter-Templates like the following:
Values are seperated by "&". Always two values form a pair.
the first value of a pair is the exact time the event starts, in seconds from Monday 0:00,
the second value holds the duration of the event in seconds.
<br><i>(If the event starts at Monday 11:10 with a duration of 90 minutes, the required pair would be "40200&5400". 
<br>(Because 40200 = 11*3600 + 10*60, and 5400 = 90*60))</i>
<br>If the event is only every second week one can use the A&B-week-mode, by placing "A" or "B" at the beginning of a pair's first value.
Doing so, "A" means the event is in every odd calendar week, while "B" means every even one.
<br><i>Let's say the event takes place in every even calendar week, the pair should be "B40200&5400".</i>
<br>Multiple events can be rowed after each other. The string "<i>A126600&5400&385800&5400</i>" is a valid counter-Template.
<br><br>
<h3>selecting the preset countdown using the domain</h3>
At this point, basic knowledge about <a href=https://www.w3schools.com/php/php_superglobals_get.asp>$_GET in php</a> is required.
As such a $_GET[]-variable named <b>c</b> one can select a countdown by giving it the exact name of the countdown (as spelled in the lobby-view) as value. 
This countdown will be selected.
<br><i>(Attention! Spaces " " must be replaced by "%20")
<br>A valid selection would look like this: "matdoh.de/counter/?c=Baumann".</i>
<br><br>
<h3>selecting a custom countdown using the domain</h3>
Instead one can set custom countdowns in the domain. Use <b>$_GET[ts]</b> to do so. 
Multiple events can be inserted using the countdown's storage format as described before.
If <b>ts</b> as well as <b>c</b> are set, <b>ts</b> will be used
<br><i>(Attention! "&" must be replaced by "%26".)</i>
<br><br>
<h3>selecting a custom color-scheme using the domain</h3>
Likewise a custom color scheme can be set. The used variable is called <b>cs</b>.
It's value is two hexadecimal values rowed directly after eachother.
the first colorstamp is for the color that the countdown will have while the event's beginning is more than 1h away.
the second one is for the color that the countdown will have when the event started.
<br><i>An example link with the default colors is: "matdoh.de/counter/?cs=2AF000FF1F1F"</i>
<br><br>
<h3>hints for iFrames</h3>
The countdown requires certain settings to work as intended.
First of all, it is designed for wideer screen, vertical iFrames seem pointless here.<br>
Also, the iFrame must be given the following attribute: <b>allow="fullscreen;screen-wake-lock"</b>.
<br><br>
<h3>further hints</h3>
The <a href="https://chromewebstore.google.com/detail/picture-in-picture-any-si/fgopnhbjlphjjcfbapfcbakjekpffkff">pip-Browser-Extension</a> is recommended, it allows to detatch the counter to let it hover in the corner of yur screen.
