# nexxtra-small-code-challenge

Code Challenge zum besseren Kennenlernen.

Ziel ist es ein Scrum Poker Board zu erstellen welches druch den altbewährten Pollingmeachnismus den Status der Karten der Mitspieler aktuallisiert.

1.	Erstelle ein Backend (egal ob mit Framework oder selbgestbaut) welches folgende Möglichkeiten bietet
a.	Raum erstellen (Link mit Raum ID)
b.	Raum beitreten
c.	Name für Mitspieler setzen (also ich betrete den Raum und sage wie ich heisse)
d.	Karte ziehen (also ich habe die Mglicheit eine Zahl zwischen ?-0-0.5-1-2-3-5-8-13-20-40-100 zu wählen)
e.	Karte bearbeiten (meine Auswahl ändern)
f.	Status abrufen für Raum (welche Karten wurde gezogen)
g.	Raum neustarten (neue Planningpoker runde)

2.	Erstelel ein Frontend (super simple) das mir die folgenden Möglichkeiten gibt
a.	Raum erstellen und direkt betreten
b.	Raum Link (ID) kopieren damit andere den Raum betreten können
c.	Raum betreten und direkt Nmane eingeben
d.	Im Raum eine Karte auswähelen aus (?-0-0.5-1-2-3-5-8-13-20-40-100) reicht als LINK – Grafiken sind nice-to-have
e.	Anzeige der anderen Mitspieler und deren gezogene Karte
f.	Anzeige des Mittelwertes von allen gezogenen Karten (Ergebnis der Runde)
g.	Für den Raumersteller (Admin) Neustart des Raums / neue Runde

Die Vorlage dazu ist das Tool:
https://www.scrumpoker-online.org/de/

Im Backend sollen die Daten in einer Light SQL also Datei gespeichert werden. Dazu soll SQL verwendet werden (für einfache Daten gerne auch Dateien).
Die Webseite soll in PHP / HTML geschrieben sein. Es steht dir frei jede Art von Framework oder Vorlage zu verwenden. KISS Prinzip ist anzuwenden. Es soll das MVP „minimal brauchbares oder existenzfähiges Produkt“ gebaut werden in dem man die Ansätze der REST API sowie der Anbindung das Frontend erkennen kann.
![image](https://github.com/user-attachments/assets/f8f2d95b-c945-4178-9723-1813840962bd)
