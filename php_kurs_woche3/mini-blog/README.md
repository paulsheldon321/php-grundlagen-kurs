# Mini-Blog – Projektbeschreibung

Dieses Projekt umfasst die Entwicklung eines **Mini-Blogs** mit **PHP**, **MariaDB** und optionalem **CSS/Bootstrap**.  
Die Seite muss **nicht** responsiv sein.

---

## 📁 Projektstruktur & Planung

### Verzeichnisstruktur
Erstellen Sie ein eigenes Projektverzeichnis mit allen relevanten Dateien und Unterordnern.  

Empfehlung:

```
/miniblog
│   index.php
│   .env
│   .gitignore
│
├── inc/
│     db.inc.php
│     functions.inc.php
│     _header.inc.php
│     _nav.inc.php
│     _footer.inc.php
│
├── posts/
│     post_single.php
│     post_create.php
│     post_edit.php
│
├── user/
│     register.php
│     login.php
│     logout.php
│
└── uploads/
```

### Planung von Dateien
- **Ausgabe-Dateien:** index.php, post_single.php, post_create.php, post_edit.php, register.php, login.php, logout.php
- **Include-Dateien:** Header, Navigation, Footer, DB-Verbindung, Funktionen
- Include-Dateien können im Verzeichnis `inc/` abgelegt werden und idealerweise auf `.inc.php` enden.

### Wichtige Dateien
- **functions.inc.php** – zentrale Datei für Projektfunktionen  
- **db.inc.php** – bindet `.env` ein und stellt die DB-Verbindung her  
- **.env** – enthält vertrauliche Zugangsdaten (→ in `.gitignore`)  

### Benennungskonventionen
Planen Sie vorher:
- Dateinamen
- Variablennamen
- Funktionsnamen
- Konstanten  
und halten Sie sich strikt daran.

---

## 🗄️ Datenbankstruktur

Datenbankname: `miniblog`
```
### Tabelle `tbl_users`

| Feld             | Typ            | Besonderheiten               |
|------------------|----------------|------------------------------|
| users_id         | int            | Primary, A_I                 |
| users_forename   | varchar(50)    | NULL                         |
| users_lastname   | varchar(50)    |                              |
| users_email      | varchar(100)   | UNIQUE                       |
| users_password   | varchar(255)   |                              |
| users_created_at | timestamp      | current_timestamp            |
| users_updated_at | timestamp      | on update current_timestamp  |

---

### Tabelle `tbl_posts`

| Feld               | Typ            | Besonderheiten              |
|--------------------|----------------|-----------------------------|
| posts_id           | int            | Primary, A_I                |
| posts_users_id_ref | int            | FK → tbl_users              |
| posts_categ_id_ref | int            | FK → tbl_categories         |
| posts_header       | varchar(50)    |                             |
| posts_content      | text           |                             |
| posts_image        | varchar(255)   | NULL                        |
| posts_created_at   | timestamp      | current_timestamp           |
| posts_updated_at   | timestamp      | on update current_timestamp |

---

### Tabelle `tbl_categories`

| Feld       | Typ           | Besonderheiten               |
|------------|---------------|------------------------------|
| categ_id   | int           | Primary, A_I                 |
| categ_name | varchar(50)   |                              |
| categ_desc | varchar(255)  | NULL                         |

```
---

## 📰 Aufbau des Blogs

Jede Ausgabe-Seite enthält:
1. **Header**
2. **Navigation**
3. **Hauptteil**
4. **Footer**

Diese Elemente werden in eigenen Include-Dateien gespeichert.

---

## 🏠 Startseite (`index.php`)
Die Startseite zeigt:
- Liste aller Post-Titel
- jeweilige Kategorie
- Titel als klickbare Links → `post_single.php?post=ID`

Option (optional):
- Kategorie-Filter als Dropdown (Daten aus DB)

---

## 📄 Artikel-Ansicht (`post_single.php`)
Anzuzeigen sind:
- Überschrift
- Inhalt
- Bild (nur wenn vorhanden)
- Metadaten:  
  - Autor  
  - Kategorie  
  - Erstellt am  
  - Geändert am  

---

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

---

## 👤 User-Verwaltung

### Registrierung (`register.php`)
- Benutzername = E-Mail-Adresse
- Eintrag in DB
- Bei vorhandener E-Mail → Fehlermeldung

### Login (`login.php`)
- Abgleich von E-Mail + Passwort
- Erfolgreich → User-Daten in `$_SESSION` speichern
  - Vorname
  - Nachname
  - E-Mail
- Navigationspunkte ändern sich:
  - Login/Registrieren → Logout

### Logout (`logout.php`)
- Session zerstören
- Meldung über erfolgreiches Logout

---

## 🌐 URL Query Konzept
Beispiel:

- post_edit.php?post=3&action=edit


Im Script:

- $_GET['post'] // → 3
- $_GET['action'] // → "edit"


Alle Werte liegen als **String** vor.

---


## ✔️ Zusatzaufgabe (optional)
Kategorie-Filter auf Startseite:
- Dropdown-Liste
- Kategorien aus DB
- Filtert Artikel nach Kategorie

---

