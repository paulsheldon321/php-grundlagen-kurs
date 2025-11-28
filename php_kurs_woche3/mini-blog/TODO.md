# TODO

## 👤 User-Verwaltung

### Registrierung (`register.php`)
- Benutzername = E-Mail-Adresse 👍
- Eintrag in DB 👍
- Bei vorhandener E-Mail → Fehlermeldung 👍

### Login (`login.php`)
- Abgleich von E-Mail + Passwort 👍
- Erfolgreich → User-Daten in `$_SESSION` speichern 👍
  - Vorname 
  - Nachname
  - E-Mail
- Navigationspunkte ändern sich: 👍
  - Login/Registrieren → Logout 👍

### Logout (`logout.php`)
- Session zerstören 👍
- Meldung über erfolgreiches Logout 👍

### Index.php
- Liste aller Posts 👍
- jew. Kat.
- Titel als href
- Opt: Kategorie-Filter als Dropdown

### 📄 Artikel-Ansicht (`post_single.php`)
Anzuzeigen sind: 👍
- Überschrift 👍
- Inhalt 👍
- Bild (nur wenn vorhanden) 👍
- Metadaten:   👍
  - Autor  👍
  - Kategorie  👍
  - Erstellt am  👍
  - Geändert am  👍

## ✏️ Artikelverwaltung
Nur **eingeloggte User** dürfen:
- Artikel erstellen
- Artikel bearbeiten
- Artikel löschen

Auf der Startseite werden daher zusätzlich angezeigt:
- **Bearbeiten-Link:** `post_edit.php?post=ID&action=edit`
- **Löschen-Link:** `post_edit.php?post=ID&action=delete`

Beim Erstellen/Bearbeiten:
- Bild-Upload möglich
- Bild kann gelöscht werden (Datei + DB-Eintrag)

## Rechte
- Root  sieht alles from user ( posts)
- User sieht nur sein posts