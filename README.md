marvel-php
==========

This is a helper library for the Marvel Comics API - http://developer.marvel.com/

This isn't official but should generally work except for the incomplete items in the TODO list below.

All characters - no matter how awesome they are - are owned by Marvel Comics.

## Requirements

This assumes you have cURL installed along with the corresponding php-curl interface. It should be extended to support HTTP Streams but I'm kinda lazy.

## TODO

*  ~~Implement HTTP handler~~
*  ~~Implement authentication~~
*  Add error handling for auth errors
*  ~~Implement Character List and pagination~~
*  Implement the optional paramaters for the Character List
*  ~~Implement Character Load~~
*  Implement Character's comic lookup, events lookup, stories lookup
*  ~~Implement Comic List and pagination~~
*  Implement the optional paramaters for the Comic List
*  ~~Implement Comic Load~~
*  Implement Comic's character lookup, creators lookup, events lookup, stories lookup
*  ~~Implement Creators List and pagination~~
*  Implement the optional paramaters for the Creator List
*  ~~Implement Creator Load~~
*  Implement Creator's comic lookup, events lookup, stories lookup
*  ~~Implement Event List and pagination~~
*  Implement the optional paramaters for the Event List
*  Implement Event Load
*  Implement Event's character lookup, comic lookup, creator lookup, stories lookup
*  ~~Implement Series List and pagination~~
*  Implement the optional paramaters for the Series List
*  Implement Series Load
*  Implement Series' character lookup, comic lookup, creator lookup, event lookup, stories lookup
*  ~~Implement Stories List and pagination~~
*  Implement the optional paramaters for the Story List
*  Implement Story Load
*  Implement Stories' character lookup, comic lookup, creator lookup, event lookup