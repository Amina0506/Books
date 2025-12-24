# MyBooks

MyBooks is een dynamische Laravel-website voor boekenliefhebbers. 
Gebruikers kunnen een account aanmaken, hun profiel beheren, nieuws bekijken, 
FAQ raadplegen, en contact opnemen met admins. 
Extra features zijn een gepersonaliseerde 
“For You”-pagina en een zoekfunctie om andere gebruikers te vinden.

## Inhoud van de website

### Login systeem
- Gebruikers kunnen:
    - Inloggen
    - Account aanmaken
- Rollen:
    - Gebruiker
    - Admin
- Admins kunnen:
    - Andere gebruikers tot admin verheffen of rechten afnemen
    - Nieuwe gebruikers manueel aanmaken

### Profielpagina
- Elke gebruiker heeft een publieke profielpagina
- Ingelogde gebruiker kan eigen profiel aanpassen
- Profielinformatie bevat:
    - Username
    - Verjaardag
    - Profielfoto
    - "Over mij"-tekst

### Nieuws
- Admins kunnen nieuwsitems:
    - Toevoegen
    - Wijzigen
    - Verwijderen
- Nieuwsitem bevat:
    - Titel
    - Afbeelding
    - Content
    - Publicatiedatum
- Alle bezoekers kunnen nieuws bekijken

### FAQ
- FAQ-items gegroepeerd per categorie
- Admins kunnen:
    - Categorieën beheren
    - Vraag/antwoord toevoegen, wijzigen of verwijderen
- Alle bezoekers kunnen FAQ bekijken

### Contactpagina
- Bezoekers kunnen een contactformulier invullen
- Admin ontvangt een e-mail bij verzending

### Extra features
- **For You-pagina**
    - Alleen zichtbaar voor ingelogde gebruikers
    - Gebruiker kiest een categorie en ziet relevante boeken
    - Elk boek bevat details en korte uitleg waarom het “voor jou” is
    - Admins kunnen boeken en categorieën beheren
- **Zoekfunctie**
    - Voor ingelogde en niet-ingelogde gebruikers
    - Zoeken op username
    - Resultaat: profielpagina van de betreffende gebruiker


## Installatie 

1. **Clone de repository**
    - git clone https://github.com/Amina0506/Books.git

2. **Dependencies installeren**
    - composer install 
    - npm install
    - 'npm run dev' om de CSS zichtbaar te maken
3. **Toegang van de default user**
    - Username: admin
    - Email: admin@ehb.be
    - Wachtwoord: Password!321

## Bronvermeldingen

Voor dit project heb ik gebruik gemaakt van de Laravel-documentatie en de PowerPoint-presentaties van de cursus.
