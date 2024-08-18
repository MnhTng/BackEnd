/**
 * @license Copyright (c) 2003-2024, CKSource Holding sp. z o.o. All rights reserved.
 * For licensing, see LICENSE.md or https://ckeditor.com/legal/ckeditor-oss-license
 */

( e => {
const { [ 'cs' ]: { dictionary, getPluralForm } } = {"cs":{"dictionary":{"Words: %0":"Počet slov: %0","Characters: %0":"Počet znaků: %0","Widget toolbar":"Panel nástrojů ovládacího prvku","Insert paragraph before block":"Vložte odstavec před blok","Insert paragraph after block":"Vložte odstavec za blok","Press Enter to type after or press Shift + Enter to type before the widget":"Stisknutím klávesy Enter můžete psát za widgetem a stisknutím Shift + Enter před ním","Keystrokes that can be used when a widget is selected (for example: image, table, etc.)":"Klávesy, které lze použít, když je vybraný widget (např: obrázek, tabulka atd.)","Insert a new paragraph directly after a widget":"Vložte odstavec přímo po widgetu","Insert a new paragraph directly before a widget":"Vložte nový odstavec přímo před widget","Move the caret to allow typing directly before a widget":"Přesuňte stříšku pro umožnění psaní přímo před widget","Move the caret to allow typing directly after a widget":"Přesuňte stříšku pro umožnění psaní přímo před widget","Move focus from an editable area back to the parent widget":"Přesunout zaměření z upravitelné oblasti zpět na nadřazený widget","Upload in progress":"Probíhá nahrávání","Undo":"Zpět","Redo":"Znovu","Rich Text Editor":"Textový editor","Editor editing area: %0":"Editační oblast editoru: %0","Edit block":"Upravit blok","Click to edit block":"Kliknutím upravíte blok","Drag to move":"Přesuňte potažením","Next":"Další","Previous":"Předchozí","Editor toolbar":"Panel nástrojů editoru","Dropdown toolbar":"Rozbalovací panel nástrojů","Black":"Černá","Dim grey":"Tmavě šedá","Grey":"Šedá","Light grey":"Světle šedá","White":"Bílá","Red":"Červená","Orange":"Oranžová","Yellow":"Žlutá","Light green":"Světle zelená","Green":"Zelená","Aquamarine":"Akvamarínová","Turquoise":"Tyrkysová","Light blue":"Světle modrá","Blue":"Modrá","Purple":"Fialová","Editor block content toolbar":"Panel nástrojů obsahu bloku editoru","Editor contextual toolbar":"Kontextový panel nástrojů editoru","HEX":"HEX","No results found":"Nenalezeny žádné výsledky","No searchable items":"Žádné položky k vyhledání","Editor dialog":"Dialog editoru","Close":"Zavřít","Help Contents. To close this dialog press ESC.":"Obsah podpory. Pro zavření tohoto dialogu stiskněte ESC.","Below, you can find a list of keyboard shortcuts that can be used in the editor.":"Seznam klávesových zkratek, které lze v editoru použít, můžete nalézt níže.","(may require <kbd>Fn</kbd>)":"(může vyžadovat <kbd>Fn</kbd>)","Accessibility":"Přístupnost","Accessibility help":"Podpora přístupnosti","Press %0 for help.":"Stiskněte %0 pro podporu","Move focus in and out of an active dialog window":"Přesouvejte zaměření dovnitř a ven z aktivního dialogového okna","MENU_BAR_MENU_FILE":"Soubor","MENU_BAR_MENU_EDIT":"Upravit","MENU_BAR_MENU_VIEW":"Zobrazit","MENU_BAR_MENU_INSERT":"Vložit","MENU_BAR_MENU_FORMAT":"Formát","MENU_BAR_MENU_TOOLS":"Nástroje","MENU_BAR_MENU_HELP":"Nápověda","MENU_BAR_MENU_TEXT":"Text","MENU_BAR_MENU_FONT":"Písmo","Editor menu bar":"Panel nabídek editoru","Please enter a valid color (e.g. \"ff0000\").":"Zadejte platnou barvu (např. „ff0000“).","Insert table":"Vložit tabulku","Header column":"Sloupec záhlaví","Insert column left":"Vložit sloupec vlevo","Insert column right":"Vložit sloupec vpravo","Delete column":"Smazat sloupec","Select column":"Vybrat sloupec","Column":"Sloupec","Header row":"Řádek záhlaví","Insert row below":"Vložit řádek pod","Insert row above":"Vložit řádek před","Delete row":"Smazat řádek","Select row":"Vybrat řádek","Row":"Řádek","Merge cell up":"Sloučit s buňkou nad","Merge cell right":"Sloučit s buňkou vpravo","Merge cell down":"Sloučit s buňkou pod","Merge cell left":"Sloučit s buňkou vlevo","Split cell vertically":"Rozdělit buňky vertikálně","Split cell horizontally":"Rozdělit buňky horizontálně","Merge cells":"Sloučit buňky","Table toolbar":"Panel nástrojů tabulky","Table properties":"Vlastnosti tabulky","Cell properties":"Vlastnosti buňky","Border":"Okraj","Style":"Styl","Width":"Šířka","Height":"Výška","Color":"Barva","Background":"Pozadí","Padding":"Vnitřní okraj","Dimensions":"Rozměry","Table cell text alignment":"Zarovnání textu buňky tabulky","Alignment":"Zarovnání","Horizontal text alignment toolbar":"Horizontální zarovnání textu v panelu","Vertical text alignment toolbar":"Vertikální zarovnání textu v panelu","Table alignment toolbar":"Panel zarovnání tabulky","None":"Žádná","Solid":"Plná","Dotted":"Tečkovaná","Dashed":"Čárkovaná","Double":"Dvojitá","Groove":"Drážkovaná","Ridge":"Rámovaná","Inset":"Vložená zevnitř","Outset":"Vložená zvenku","Align cell text to the left":"Zarovnat text buňky doleva","Align cell text to the center":"Zarovnat text buňky na střed","Align cell text to the right":"Zarovnat text buňky doprava","Justify cell text":"Zarovnat text buňky z obou stran","Align cell text to the top":"Zarovnat text buňky nahoru","Align cell text to the middle":"Zarovnat text buňky na střed","Align cell text to the bottom":"Zarovnat text buňky dolů","Align table to the left":"Zarovnat tabulku doleva","Center table":"Centrovat tabulku","Align table to the right":"Zarovnat tabulku doprava","The color is invalid. Try \"#FF0000\" or \"rgb(255,0,0)\" or \"red\".":"Barva má nesprávný formát. Zkuste \"#FF0000\", \"rgb(255,0,0)\" nebo \"red\".","The value is invalid. Try \"10px\" or \"2em\" or simply \"2\".":"Hodnota je nesprávná. Zkuste \"10px\", \"2em\" nebo jednoduše \"2\".","Color picker":"Vybrat barvu","Enter table caption":"Zadejte titulek tabulky","Keystrokes that can be used in a table cell":"Klávesy, které lze použít v buňce tabulky","Move the selection to the next cell":"Přesunout výběr do další buňky","Move the selection to the previous cell":"Přesunout výběr do předchozí buňky","Insert a new table row (when in the last cell of a table)":"Vložit nový řádek tabulky (když jste v poslední buňce tabulky)","Navigate through the table":"Procházet tabulkou","Table":"Tabulka","Styles":"Styly","Multiple styles":"Více stylů","Block styles":"Styly bloků","Text styles":"Styly textu","Special characters":"Speciální znaky","All":"Vše","Arrows":"Šipky","Currency":"Měna","Latin":"Latina","Mathematical":"Matematické","Text":"Text","leftwards simple arrow":"jednoduchá šipka doleva","rightwards simple arrow":"jednoduchá šipka doprava","upwards simple arrow":"jednoduchá šipka nahoru","downwards simple arrow":"jednoduchá šipka dolů","leftwards double arrow":"dvojitá šipka doleva","rightwards double arrow":"dvojitá šipka doprava","upwards double arrow":"dvojitá šipka nahoru","downwards double arrow":"dvojitá šipka dolů","leftwards dashed arrow":"přerušovaná šipka doleva","rightwards dashed arrow":"čárkovaná šipka doprava","upwards dashed arrow":"čárkovaná šipka nahoru","downwards dashed arrow":"přerušovaná šipka dolů","leftwards arrow to bar":"šipka doleva do svislé čáry","rightwards arrow to bar":"šipka doprava do svislé čáry","upwards arrow to bar":"šipka nahoru do svislé čáry","downwards arrow to bar":"šipka dolů do svislé čáry","up down arrow with base":"Šipka nahoru-dolů od základny","back with leftwards arrow above":"šipka zpět","end with leftwards arrow above":"šipka konec","on with exclamation mark with left right arrow above":"ON s vykřičníkem se šipkou doleva doprava nahoru","soon with rightwards arrow above":"brzy se šipkou doprava nahoru","top with upwards arrow above":"TOP se šipkou nahoru","Dollar sign":"Znak Dolar","Euro sign":"Znak Euro","Yen sign":"Znak Jen","Pound sign":"Znak Libra","Cent sign":"Znak cent","Euro-currency sign":"Mena Euro","Colon sign":"dvojtečka","Cruzeiro sign":"Měna Cruzeiro","French franc sign":"Měna Francouzský Frank","Lira sign":"Měna Lira","Currency sign":"Znak měny","Bitcoin sign":"Měna Bitcoin","Mill sign":"Znak Mill","Naira sign":"Znak Naira","Peseta sign":"Znak Peseta","Rupee sign":"Znak Rupee","Won sign":"Znak Won","New sheqel sign":"Nový znak šekel","Dong sign":"Znak Dong","Kip sign":"Znak Kip","Tugrik sign":"Znak Tugrik","Drachma sign":"Znak Drachma","German penny sign":"Německá penny","Peso sign":"Znak Peso","Guarani sign":"Znak Guarani","Austral sign":"Znak Austral","Hryvnia sign":"Znak Hryvnia","Cedi sign":"Znak Cedi","Livre tournois sign":"Znak Livre tournois","Spesmilo sign":"Znak Spesmilo","Tenge sign":"Znak Tenge","Indian rupee sign":"Znak Indická rupia","Turkish lira sign":"Znak Turecká líra","Nordic mark sign":"Znak Nórska marka","Manat sign":"Znak Manat","Ruble sign":"Znak Ruble","Latin capital letter a with macron":"Latinské velké písmeno a s čárou","Latin small letter a with macron":"Latinské malé písmeno a s čárou","Latin capital letter a with breve":"Latinské velké písmeno a s háčkem","Latin small letter a with breve":"Latinské malé písmeno a s háčkem","Latin capital letter a with ogonek":"Latinské velké písmeno a s háčkem","Latin small letter a with ogonek":"Latinské malé písmeno a s háčkem","Latin capital letter c with acute":"Latinské velké písmeno c s čárkou","Latin small letter c with acute":"Latinské malé písmeno c s čárkou","Latin capital letter c with circumflex":"Latinské velké písmeno c s obráceným háčkem","Latin small letter c with circumflex":"Latinské malé písmeno c s obráceným háčkem","Latin capital letter c with dot above":"Latinské velké písmeno c s tečkou nad znakem","Latin small letter c with dot above":"Latinské malé písmeno c s tečkou nad znakem","Latin capital letter c with caron":"Latinské veľké písmeno c s mäkčeňom","Latin small letter c with caron":"Latinské malé písmeno c s háčkem","Latin capital letter d with caron":"Latinské velké písmeno d s háčkem","Latin small letter d with caron":"Latinské malé písmeno d s háčkem","Latin capital letter d with stroke":"Latinské velké písmeno d s přeškrtnutím","Latin small letter d with stroke":"Latinské malé písmeno d s přeškrtnutím","Latin capital letter e with macron":"Latinské velké písmeno e s čárou","Latin small letter e with macron":"Latinské malé písmeno e s čárou","Latin capital letter e with breve":"Latinské velké písmeno e s háčkem","Latin small letter e with breve":"Latinské malé písmeno e s háčkem","Latin capital letter e with dot above":"Latinské velké písmeno e s tečkou nad znakem","Latin small letter e with dot above":"Latinské malé písmeno e s tečkou nad znakem","Latin capital letter e with ogonek":"Latinské velké písmeno e s háčkem","Latin small letter e with ogonek":"Latinské malé písmeno e s háčkem","Latin capital letter e with caron":"Latinské velké písmeno e s háčkem","Latin small letter e with caron":"Latinské malé písmeno e s háčkem","Latin capital letter g with circumflex":"Latinské velké písmeno g s obráceným háčkem","Latin small letter g with circumflex":"Latinské malé písmeno g s obráceným háčkem","Latin capital letter g with breve":"Latinské velké písmeno g s háčkem","Latin small letter g with breve":"Latinské malé písmeno g s háčkem","Latin capital letter g with dot above":"Latinské velké písmeno g s tečkou nad znakem","Latin small letter g with dot above":"Latinské malé písmeno g s tečkou nad znakem","Latin capital letter g with cedilla":"Latinské velké písmeno g s háčkem","Latin small letter g with cedilla":"Latinské malé písmeno g s háčkem","Latin capital letter h with circumflex":"Latinské velké písmeno h s obráceným háčkem","Latin small letter h with circumflex":"Latinské malé písmeno h s obráceným háčkem","Latin capital letter h with stroke":"Latinské velké písmeno h s přeškrtnutím","Latin small letter h with stroke":"Latinské malé písmeno h s přeškrtnutím","Latin capital letter i with tilde":"Latinské velké písmeno i s vlnovkou","Latin small letter i with tilde":"Latinské malé písmeno i s vlnovkou","Latin capital letter i with macron":"Latinské velké písmeno i s čárou","Latin small letter i with macron":"Latinské malé písmeno i s čárou","Latin capital letter i with breve":"Latinské velké písmeno i s háčkem","Latin small letter i with breve":"Latinské malé písmeno i s háčkem","Latin capital letter i with ogonek":"Latinské velké písmeno i s háčkem","Latin small letter i with ogonek":"Latinské malé písmeno i s háčkem","Latin capital letter i with dot above":"Latinské velké písmeno i s tečkou nad znakem","Latin small letter dotless i":"Latinské malé písmeno i bez tečky","Latin capital ligature ij":"Latinský velký znak ligatury ij","Latin small ligature ij":"Latinský malý znak ligatury ij","Latin capital letter j with circumflex":"Latinské velké písmeno j s obráceným háčkem","Latin small letter j with circumflex":"Latinské malé písmeno j s obráceným háčkem","Latin capital letter k with cedilla":"Latinské velké písmeno k s háčkem","Latin small letter k with cedilla":"Latinské malé písmeno k s háčkem","Latin small letter kra":"Latinský malý znak Kra","Latin capital letter l with acute":"Latinské velké písmeno l s čárkou","Latin small letter l with acute":"Latinské malé písmeno l s čárkou","Latin capital letter l with cedilla":"Latinské velké písmeno l s háčkem","Latin small letter l with cedilla":"Latinské malé písmeno l s háčkem","Latin capital letter l with caron":"Latinské velké písmeno l s háčkem","Latin small letter l with caron":"Latinské malé písmeno l s háčkem","Latin capital letter l with middle dot":"Latinské velké písmeno l s tečkou uprostřed","Latin small letter l with middle dot":"Latinské malé písmeno l s tečkou uprostřed","Latin capital letter l with stroke":"Latinské velké písmeno l s přeškrtnutím","Latin small letter l with stroke":"Latinské malé písmeno l s přeškrtnutím","Latin capital letter n with acute":"Latinské velké písmeno n s čárkou","Latin small letter n with acute":"Latinské malé písmeno n s čárkou","Latin capital letter n with cedilla":"Latinské velké písmeno n s háčkem","Latin small letter n with cedilla":"Latinské malé písmeno n s háčkem","Latin capital letter n with caron":"Latinské velké písmeno n s háčkem","Latin small letter n with caron":"Latinské malé písmeno n s háčkem","Latin small letter n preceded by apostrophe":"Latinské malé písmeno n s apostrofem","Latin capital letter eng":"Latinské velké písmeno Eng","Latin small letter eng":"Latinské malé písmeno Eng","Latin capital letter o with macron":"Latinské velké písmeno o s čárou","Latin small letter o with macron":"Latinské malé písmeno o s čárou","Latin capital letter o with breve":"Latinské velké písmeno o s háčkem","Latin small letter o with breve":"Latinské malé písmeno o s háčkem","Latin capital letter o with double acute":"Latinské velké písmeno o s čárkou","Latin small letter o with double acute":"Latinské malé písmeno o s čárkou","Latin capital ligature oe":"Latinský velký znak ligatury oe","Latin small ligature oe":"Latinský malý znak ligatury oe","Latin capital letter r with acute":"Latinské velké písmeno r s čárkou","Latin small letter r with acute":"Latinské malé písmeno r s čárkou","Latin capital letter r with cedilla":"Latinské velké písmeno r s háčkem","Latin small letter r with cedilla":"Latinské malé písmeno r s háčkem","Latin capital letter r with caron":"Latinské velké písmeno r s háčkem","Latin small letter r with caron":"Latinské malé písmeno r s háčkem","Latin capital letter s with acute":"Latinské velké písmeno s s čárkou","Latin small letter s with acute":"Latinské malé písmeno s s čárkou","Latin capital letter s with circumflex":"Latinské velké písmeno s s obráceným háčkem","Latin small letter s with circumflex":"Latinské malé písmeno s s obráceným háčkem","Latin capital letter s with cedilla":"Latinské velké písmeno s s háčkem","Latin small letter s with cedilla":"Latinské malé písmeno s s háčkem","Latin capital letter s with caron":"Latinské velké písmeno s s háčkem","Latin small letter s with caron":"Latinské malé písmeno s s háčkem","Latin capital letter t with cedilla":"Latinské velké písmeno t s háčkem","Latin small letter t with cedilla":"Latinské malé písmeno t s háčkem","Latin capital letter t with caron":"Latinské velké písmeno t s háčkem","Latin small letter t with caron":"Latinské malé písmeno t s háčkem","Latin capital letter t with stroke":"Latinské velké písmeno t s přeškrtnutím","Latin small letter t with stroke":"Latinské malé písmeno t s přeškrtnutím","Latin capital letter u with tilde":"Latinské velké písmeno u s vlnovkou","Latin small letter u with tilde":"Latinské malé písmeno u s vlnovkou","Latin capital letter u with macron":"Latinské velké písmeno u s čárou","Latin small letter u with macron":"Latinské malé písmeno o s čárou","Latin capital letter u with breve":"Latinské velké písmeno u s háčkem","Latin small letter u with breve":"Latinské malé písmeno u s háčkem","Latin capital letter u with ring above":"Latinské velké písmeno u s kroužkem nad znakem","Latin small letter u with ring above":"Latinské malé písmeno u s kroužkem nad znakem","Latin capital letter u with double acute":"Latinské velké písmeno u s dvojitým akcentu","Latin small letter u with double acute":"Latinské malé písmeno u s dvojitým akcentu","Latin capital letter u with ogonek":"Latinské velké písmeno u s háčkem","Latin small letter u with ogonek":"Latinské malé písmeno u s háčkem","Latin capital letter w with circumflex":"Latinské velké písmeno w s obráceným háčkem","Latin small letter w with circumflex":"Latinské malé písmeno w s obráceným háčkem","Latin capital letter y with circumflex":"Latinské velké písmeno y s obráceným háčkem","Latin small letter y with circumflex":"Latinské malé písmeno y s obráteným mäkčeňom","Latin capital letter y with diaeresis":"Latinské velké písmeno y s dvojtečkou nad znakem","Latin capital letter z with acute":"Latinské velké písmeno z s čárkou","Latin small letter z with acute":"Latinské malé písmeno z s čárkou","Latin capital letter z with dot above":"Latinské velké písmeno z s tečkou nad znakem","Latin small letter z with dot above":"Latinské malé písmeno z s tečkou nad znakem","Latin capital letter z with caron":"Latinské velké písmeno z s háčkem","Latin small letter z with caron":"Malé písmeno s z háčkem","Latin small letter long s":"Malé dlouhé písmeno s","Less-than sign":"Menší než","Greater-than sign":"Větší než","Less-than or equal to":"Menší nebo roven","Greater-than or equal to":"Větší nebo roven","En dash":"Pomlčka","Em dash":"Dlouhá pomlčka","Macron":"Horní čára","Overline":"Přeškrtnutí","Degree sign":"Znak stupeň","Minus sign":"Znak mínus","Plus-minus sign":"Znak plus-minus","Division sign":"Dělení","Fraction slash":"Lomítko / Dělení","Multiplication sign":"Násobení","Latin small letter f with hook":"Funkce","Integral":"Integrál","N-ary summation":"Znak cyklického sčítání","Infinity":"Nekonečno","Square root":"Odmocnina","Tilde operator":"Vlnovka","Approximately equal to":"Aproximace","Almost equal to":"Částečně rovný","Not equal to":"Nerovná se","Identical to":"Identický k","Element of":"Patří / Je součástí","Not an element of":"Nepatří / Není součástí","Contains as member":"Obsahuje prvek","N-ary product":"Znak cyklického násobení","Logical and":"Logický AND","Logical or":"Logický OR","Not sign":"Není rovný","Intersection":"Průsečík / Průnik","Union":"Sjednocení","Partial differential":"Parciální diference","For all":"Pro všechny prvky v množině","There exists":"Existuje v množině","Empty set":"Prázdná množina","Nabla":"Nabla","Asterisk operator":"Hvězdička / násobení","Proportional to":"Úměrný k","Angle":"Úhel","Vulgar fraction one quarter":"Jedna čtvrtina","Vulgar fraction one half":"Polovina","Vulgar fraction three quarters":"Tři čtvrtiny","Single left-pointing angle quotation mark":"Šipka ukazující do leva","Single right-pointing angle quotation mark":"Šipka ukazující do prava","Left-pointing double angle quotation mark":"Dvojitá šipka ukazující do leva","Right-pointing double angle quotation mark":"Dvojitá šipka ukazující do prava","Left single quotation mark":"Levá uvozovka","Right single quotation mark":"Pravá uvozovka","Left double quotation mark":"Levá dvojitá uvozovka","Right double quotation mark":"Pravá dvojitá uvozovka","Single low-9 quotation mark":"Spodní uvozovka","Double low-9 quotation mark":"Dvojitá spodní uvozovka","Inverted exclamation mark":"Obrácený vykřičník","Inverted question mark":"Obrácený otazník","Two dot leader":"Horizontální dvojtečka","Horizontal ellipsis":"Tečky","Double dagger":"Dvojkříž","Per mille sign":"Promile","Per ten thousand sign":"Na deset tisíc","Double exclamation mark":"Dvojitý vykřičník","Question exclamation mark":"Otazník a vykřičník","Exclamation question mark":"Vykřičník a otazník","Double question mark":"Dvojitý otazník","Copyright sign":"Copyright","Registered sign":"Registrovaný","Trade mark sign":"Ochranná známka","Section sign":"Sekce","Paragraph sign":"Odstavec","Reversed paragraph sign":"Obrácený znak odstavce","Character categories":"Kategorie znaků","Source":"Zdroj","Show source":"Zobrazit zdroj","Show blocks":"Zobrazit bloky","Select all":"Vybrat vše","Disable editing":"Zakázat úpravy","Enable editing":"Povolit úpravy","Previous editable region":"Předchozí upravitelná oblast","Next editable region":"Následující upravitelná oblast","Navigate editable regions":"Procházet upravitelnými oblastmi","Remove Format":"Odstranit formátování","Page break":"Konec stránky","media widget":"ovládací prvek médií","Media URL":"URL adresa","Paste the media URL in the input.":"Vložte URL média do vstupního pole.","Tip: Paste the URL into the content to embed faster.":"Rada: Vložte URL přímo do editoru pro rychlejší vnoření.","The URL must not be empty.":"URL adresa musí být vyplněna.","This media URL is not supported.":"Tato adresa bohužel není podporována.","Insert media":"Vložit média","Media":"Média","Media toolbar":"Panel nástrojů médií","Open media in new tab":"Otevřete média na nové kartě","Numbered List":"Číslování","Bulleted List":"Odrážky","To-do List":"Seznam úkolů","Bulleted list styles toolbar":"Panel seznamu s odrážkami","Numbered list styles toolbar":"Panel se styly číslovaného seznamu","Toggle the disc list style":"Přepnout na seznam s označením plného kruhu","Toggle the circle list style":"Přepnout na seznam s kruhovým označením","Toggle the square list style":"Přepnout na seznam se čtvercovým označením","Toggle the decimal list style":"Přepnout na číselný seznam","Toggle the decimal with leading zero list style":"Přepnout na číselný seznam s nulou na začátku","Toggle the lower–roman list style":"Přepnout na seznam s malými římskými čísly","Toggle the upper–roman list style":"Přepnout na seznam s velkými římskými čísly","Toggle the lower–latin list style":"Přepnout na seznam s malými písmeny","Toggle the upper–latin list style":"Přepnout na seznam s velkými písmeny","Disc":"Plný kruh","Circle":"Kruh","Square":"Čtverec","Decimal":"Čísla","Decimal with leading zero":"Čísla s nulou na začátku","Lower–roman":"Malé římské čísla","Upper-roman":"Velké římské čísla","Lower-latin":"Malá písmena","Upper-latin":"Velká písmena","List properties":"Vlastnosti seznamu","Start at":"Začít na","Invalid start index value.":"Neplatná počáteční hodnota indexu.","Start index must be greater than 0.":"Počátek musí být větší jak 0.","Reversed order":"Obrácené pořadí","Keystrokes that can be used in a list":"Klávesy, které lze použít v seznamu","Increase list item indent":"Zvětšit odsazení položky seznamu","Decrease list item indent":"Zmenšit odsazení položky seznamu","Entering a to-do list":"Zadání seznamu úkolů","Leaving a to-do list":"Opuštění seznamu úkolů","Unlink":"Odstranit odkaz","Link":"Odkaz","Link URL":"URL odkazu","Link URL must not be empty.":"Adresa URL odkazu nesmí být prázdná.","Link image":"Adresa obrázku","Edit link":"Upravit odkaz","Open link in new tab":"Otevřít odkaz v nové kartě","This link has no URL":"Tento odkaz nemá žádnou URL","Open in a new tab":"Otevřít v nové kartě","Downloadable":"Ke stažení","Create link":"Vytvořit odkaz","Move out of a link":"Odejít z odkazu","Language":"Jazyk","Choose language":"Vybrat jazyk","Remove language":"Odstranit jazyk","Increase indent":"Zvětšit odsazení","Decrease indent":"Zmenšit odsazení","image widget":"ovládací prvek obrázku","Wrap text":"Text nahoře a dole","Break text":"Obtékání textu","In line":"Rovnoběžně s textem","Side image":"Postranní obrázek","Full size image":"Obrázek v plné velikosti","Left aligned image":"Obrázek zarovnaný vlevo","Centered image":"Obrázek zarovnaný na střed","Right aligned image":"Obrázek zarovnaný vpravo","Change image text alternative":"Změnit alternativní text obrázku","Text alternative":"Alternativní text","Enter image caption":"Zadejte popis obrázku","Insert image":"Vložit obrázek","Replace image":"Nahradit obrázek","Upload from computer":"Nahrát z počítače","Replace from computer":"Nahradit z počítače","Upload image from computer":"Nahrát obrázek z počítače","Image from computer":"Obrázek z počítače","From computer":"Z počítače","Replace image from computer":"Nahradit obrázek z počítače","Upload failed":"Nahrání selhalo","Image toolbar":"Panel nástrojů obrázku","Resize image":"Změnit velikost","Resize image to %0":"Změnit velikost na %0","Resize image to the original size":"Změnit velikost na původní velikost","Resize image (in %0)":"Změnit velikost obrázku (v %0)","Original":"Originální","Custom image size":"Vlastní velikost obrázku","Custom":"Vlastní","Image resize list":"Seznam možností změny velikosti","Insert image via URL":"Vložit obrázek pomocí URL","Insert via URL":"Vložit přes URL","Image via URL":"Obrázek přes URL","Via URL":"Přes URL","Update image URL":"Aktualizovat URL obrázku","Caption for the image":"Popisek k obrázku","Caption for image: %0":"Popisek k obrázku: %0","The value must not be empty.":"Hodnota nesmí být prázdná","The value should be a plain number.":"Hodnota musí být prosté číslo.","Uploading image":"Nahrávání obrázku","Image upload complete":"Nahrávání obrázku dokončeno","Error during image upload":"Při nahrávání obrázku došlo k chybě","Image":"Obrázek","HTML object":"HTML objekt","Insert HTML":"Vložit kód HTML","HTML snippet":"Kód HTML","Paste raw HTML here...":"Sem vložte kód HTML ...","Edit source":"Upravit zdroj","Save changes":"Uložit změny","No preview available":"Náhled není k dispozici","Empty snippet content":"Prázdný obsah kódu","Horizontal line":"Vodorovná čára","Yellow marker":"Žlutý fix","Green marker":"Zelený fix","Pink marker":"Růžový fix","Blue marker":"Modrý fix","Red pen":"Červený fix","Green pen":"Zelené pero","Remove highlight":"Odstranit zvýraznění","Highlight":"Zvýraznění","Text highlight toolbar":"Panel nástrojů zvýraznění textu","Paragraph":"Odstavec","Heading":"Nadpis","Choose heading":"Zvolte nadpis","Heading 1":"Nadpis 1","Heading 2":"Nadpis 2","Heading 3":"Nadpis 3","Heading 4":"Nadpis 4","Heading 5":"Nadpis 5","Heading 6":"Nadpis 6","Type your title":"Sem zadejte název","Type or paste your content here.":"Zde zadejte nebo vložte obsah.","Font Size":"Velikost písma","Tiny":"Drobné","Small":"Malé","Big":"Velké","Huge":"Obrovské","Font Family":"Typ písma","Default":"Výchozí","Font Color":"Barva písma","Font Background Color":"Barva pozadí písma","Document colors":"Barvy dokumentu","Find and replace":"Najít a nahradit","Find in text…":"Najít v textu...","Find":"Najít","Previous result":"Předchozí výskyt","Next result":"Další výskyt","Replace":"Nahradit","Replace all":"Nahradit vše","Match case":"Rozlišovat velikost písmen","Whole words only":"Pouze celá slova","Replace with…":"Nahradit čím...","Text to find must not be empty.":"Hledaný text nesmí být prázdný.","Tip: Find some text first in order to replace it.":"Tip: Nejprve najděte nějaký text, abyste jej mohli nahradit.","Advanced options":"Pokročilé možnosti","Find in the document":"Najít v dokumentu","Insert a soft break (a <code>&lt;br&gt;</code> element)":"Vložit měkkou mezeru (prvek <code>&lt;br&gt;</code>)","Insert a hard break (a new paragraph)":"Vložit tvrdou mezeru (nový odstavec)","Cancel":"Zrušit","Clear":"Smazat","Remove color":"Odstranit barvu","Restore default":"Obnovit výchozí","Save":"Uložit","Show more items":"Zobrazit další položky","%0 of %1":"%0 z %1","Cannot upload file:":"Soubor nelze nahrát:","Rich Text Editor. Editing area: %0":"Editační oblast rich text editoru: %0","Insert with file manager":"Vložit pomocí správce souborů","Replace with file manager":"Nahradit pomocí správce souborů","Insert image with file manager":"Vložit obrázek pomocí správce souborů","Replace image with file manager":"Nahradit obrázek pomocí správce souborů","File":"Soubor","With file manager":"Pomocí správce souborů","Toggle caption off":"Vypnout titulek","Toggle caption on":"Zapnout titulek","Content editing keystrokes":"Klávesy na úpravu obsahu","These keyboard shortcuts allow for quick access to content editing features.":"Tyto klávesové zkratky vám umožní rychlý přístup k funkcím úpravy obsahu.","User interface and content navigation keystrokes":"Klávesy navigace v uživatelském rozhraní a obsahu","Use the following keystrokes for more efficient navigation in the CKEditor 5 user interface.":"Pro efektivní navigaci v uživatelském rozhraní CKEditor 5 použijte následující klávesy.","Close contextual balloons, dropdowns, and dialogs":"Zavřít kontextuální balóny, rozbalovací menu a dialogy","Open the accessibility help dialog":"Otevřít dialog podpory přístupnosti","Move focus between form fields (inputs, buttons, etc.)":"Přesunout zaměření mezi poli formuláře (vstupy, tlačítka atd.)","Move focus to the menu bar, navigate between menu bars":"Zaměřte se na panel nabídek, procházejte mezi panely nabídek","Move focus to the toolbar, navigate between toolbars":"Přesunout zaměření na lištu nástrojů, navigace mezi lištami nástrojů","Navigate through the toolbar or menu bar":"Procházení panelu nástrojů nebo panelu nabídek","Execute the currently focused button. Executing buttons that interact with the editor content moves the focus back to the content.":"Spusťte aktuálně zaměřené tlačítko. Spuštěním tlačítek, která interagují s obsahem editoru, se zaměření přesune zpět na obsah.","Accept":"Přijmout","Insert code block":"Vložit blok zdrojového kódu","Plain text":"Prostý text","Leaving %0 code snippet":"Opouští se fragment kódu %0","Entering %0 code snippet":"Zadávání fragmentu kódu %0","Entering code snippet":"Zadávání fragmentu kódu","Leaving code snippet":"Opuštění fragmentu kódu","Code block":"Blok kódu","Copy selected content":"Zkopírovat vybraný obsah","Paste content":"Vložit obsah","Paste content as plain text":"Vyložit obsah jako prostý text","Insert image or file":"Vložit obrázek nebo soubor","Could not obtain resized image URL.":"Nelze získat URL obrázku se změněnou velikostí.","Selecting resized image failed":"Výběr obrázku se změněnou velikostí selhal","Could not insert image at the current position.":"Na současnou pozici nelze vložit obrázek.","Inserting image failed":"Vložení obrázku selhalo","Open file manager":"Otevřít správce souborů","Cannot determine a category for the uploaded file.":"Nelze určit kategorii pro nahraný soubor.","Cannot access default workspace.":"Nelze získat přístup k výchozímu pracovišti.","Edit image":"Upravit obrázek","Processing the edited image.":"Zpracování upraveného obrázku.","Server failed to process the image.":"Serveru se nepodařilo zpracovat obrázek.","Failed to determine category of edited image.":"Nepodařilo se určit kategorii upraveného obrázku.","Block quote":"Citace","Bold":"Tučné","Italic":"Kurzíva","Underline":"Podtržené","Code":"Kódový blok","Strikethrough":"Přeškrtnuté","Subscript":"Dolní index","Superscript":"Horní index","Italic text":"Kurzíva","Move out of an inline code style":"Odejít ze stylu vloženého kódu","Bold text":"Tučně","Underline text":"Podtrhnutí","Strikethrough text":"Přešktnutí","Saving changes":"Ukládání změn","Revert autoformatting action":"Vzít zpět akci automatického formátování","Align left":"Zarovnat vlevo","Align right":"Zarovnat vpravo","Align center":"Zarovnat na střed","Justify":"Zarovnat do bloku","Text alignment":"Zarovnání textu","Text alignment toolbar":"Panel nástrojů zarovnání textu"},getPluralForm(n){return (n == 1 && n % 1 == 0) ? 0 : (n >= 2 && n <= 4 && n % 1 == 0) ? 1: (n % 1 != 0 ) ? 2 : 3;}}};
e[ 'cs' ] ||= { dictionary: {}, getPluralForm: null };
e[ 'cs' ].dictionary = Object.assign( e[ 'cs' ].dictionary, dictionary );
e[ 'cs' ].getPluralForm = getPluralForm;
} )( window.CKEDITOR_TRANSLATIONS ||= {} );
