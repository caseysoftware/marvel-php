marvel-php
==========

This is a helper library for the Marvel Comics API - http://developer.marvel.com/

This isn't official but should generally work except for the incomplete items in the TODO list below.

All characters - no matter how awesome they are - are owned by Marvel Comics. Also, if you use this library, make sure you follow their attribution rules: http://developer.marvel.com/documentation/attribution

## Requirements

This assumes you have cURL installed along with the corresponding php-curl interface. It should be extended to support HTTP Streams but I'm kinda lazy.

## TODO

*  ~~Refactor to use Guzzle instead of curl, etc directly~~
*  ~~Implement Character List and pagination~~
*  ~~Implement the optional parameters for the Character List~~
*  ~~Implement Character Load~~
*  ~~Implement Character's comic lookup, events lookup, stories lookup~~
*  ~~Implement Comic List and pagination~~
*  ~~Implement the optional parameters for the Comic List~~
*  ~~Implement Comic Load~~
*  ~~Implement Comic's character lookup, creators lookup, events lookup, stories lookup~~
*  ~~Implement Creators List and pagination~~
*  ~~Implement the optional parameters for the Creator List~~
*  ~~Implement Creator Load~~
*  ~~Implement Creator's comic lookup, events lookup, stories lookup~~
*  ~~Implement Event List and pagination~~
*  ~~Implement the optional parameters for the Event List~~
*  ~~Implement Event Load~~
*  ~~Implement Event's character lookup, comic lookup, creator lookup, stories lookup~~
*  ~~Implement Series List and pagination~~
*  ~~Implement the optional parameters for the Series List~~
*  ~~Implement Series Load~~
*  ~~Implement Series' character lookup, comic lookup, creator lookup, event lookup, stories lookup~~
*  ~~Implement Stories List and pagination~~
*  ~~Implement the optional parameters for the Story List~~
*  ~~Implement Story Load~~
*  ~~Implement Stories' character lookup, comic lookup, creator lookup, event lookup~~

## Notes

*  The character name search doesn't support wildcards at all. It is looking for exact matches. For example, if you search for 'Spider Man' it won't find 'Spider-Man' which is the proper spelling.
*  The index/list lookups take progressively longer the higher page number you request. For example, page 10 takes longer to load than page 3 which takes longer than page 1. I have not confirmed if this is linear.
*  So far the optional parameters have no validation in this library... I'm not sure if it should occur here as it may break later versions of the API as those requirements change.
