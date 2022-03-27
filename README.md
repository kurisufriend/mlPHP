# mlPHP
want a mangaloid instance? hate things functioning properly? this repository might be for you

implemented:

| type | route | args | returns |
| -------------| ------------- | ------------- | ------------- |
| GET | /info  | | application/json  |
| GET | /manga/search  | ?title=str, ?author=str, ?artist=str, ?genre=str, ?sort | application/json  |
| GET | /manga/from_id  | ?id=int | application/json  |
| GET | /manga/get_chapters  | ?id=int | application/json  |
| GET | /manga/thumbnail  | ?id=int | image/webp  |
| GET | /thumbnail  | static /(id).webp | image/webp  |
| GET | /manga/people  |  | application/json  |
| GET | /manga/scanlators  | | application/json  |
### to do:
* use sqlite instead of hack-y jsons
