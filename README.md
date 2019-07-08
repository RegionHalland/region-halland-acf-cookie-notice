# Skapa en "cookie notice"

## Hur man använder Region Hallands plugin "region-halland-acf-cookie-notice"

Nedan följer instruktioner hur du kan använda pluginet "region-halland-acf-cookie-notice".


## Användningsområde

Denna plugin skapar funktionalitet för en "cookie notice", dvs:

```sh
A) Lägger till två fält i databasen. Ett fält för informationstext + ett fält för knapptext
B) Skapar ett formulär under "Temainställningar" i Wp-admin där man kan editera texterna
C) En funktion för att hämta ut respektive text som en array
D) En funktion för att kontrollera om en cookie är satt eller inte
```

OBS! Denna plugin förutsätter att du har installerat och aktiverat Advanced Custom Fields Pro (https://www.advancedcustomfields.com/pro/)


## Licensmodell

Denna plugin använder licensmodell GPL-3.0. Du kan läsa mer om denna licensmodell på:
```sh
A) Gnu.org (https://www.gnu.org/licenses/gpl-3.0.html)
B) Wikipedia (https://sv.wikipedia.org/wiki/GNU_General_Public_License)
```


## Installation och aktivering

```sh
A) Hämta pluginen via Git eller läs in det med Composer
B) Installera Region Hallands plugin i Wordpress plugin folder
C) Aktivera pluginet inifrån Wordpress admin
```


## Hämta hem pluginet via Git

```sh
git clone https://github.com/RegionHalland/region-halland-acf-cookie-notice.git
```


## Läs in pluginen via composer

Dessa två delar behöver du lägga in i din composer-fil

Repositories = var pluginen är lagrad, i detta fall på github

```sh
"repositories": [
  {
    "type": "vcs",
    "url": "https://github.com/RegionHalland/region-halland-acf-cookie-notice.git"
  },
],
```
Require = anger vilken version av pluginen du vill använda, i detta fall version 1.0.0

OBS! Justera så att du hämtar aktuell version.

```sh
"require": {
  "regionhalland/region-halland-acf-cookie-notice": "1.0.0"
},
```


## Visa "cookie notice" på en sida via "Blade"

```sh
@if(function_exists('check_region_halland_cookie_notice'))
  @php($checkCookieNotice = check_region_halland_cookie_notice())
  @if ($checkCookieNotice == false)
    @php($myCookieNotice = get_region_halland_cookie_notice())  
    <span class="h5">{!! $myCookieNotice['message'] !!}</span>
    <button id="cookie-consent" class="btn btn-primary">
      {!! $myCookieNotice['button'] !!}
    </button>
  @endif
@endif
```


## Exempel på hur arrayen kan se ut

```sh
array (size=2)
  'message' => string 'På den här webbplatsen använder vi cookies (kakor) för att webbplatsen ska fungera på ett bra sätt för dig. Genom att klicka vidare eller på ”Jag förstår” godkänner du att vi använder cookies.' (length=208)
  'button' => string 'Jag förstår' (length=1
```


## Jquery för att kontrollera ifall användaren klickar på knappen

```sh
$("#cookie-consent").on( "click", function() {
    
    // set cookie with javascript function
    setCookie('cookie_notice_accepted','1',365);
    
    // Hide div with cookie notice text + button
    $("#cookie-notice").hide();

});
```


## Javascript för att skapa cookien

```sh
function setCookie(name,value,days) {
    
    // Set variables
    var expires = "";
    if (days) {
        var date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
    }
    
    // Set cookie
    document.cookie = name + "=" + (value || "")  + expires + "; path=/";

}
```


## Versionhistorik

### 1.1.0
- Lagt till information om licensmodell

### 1.0.0
- Första version
