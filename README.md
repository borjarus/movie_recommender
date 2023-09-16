# Movie recommender

A simple application written in PHP for finding movie recommendations.
The list of movies in array is provided in the file data/movies.php.


## Installation

Run docker command to build image from Dockerfile
in app folder

```bash
  docker build -t movie_recomender .
```

then run docker container using command:

```bash
  docker run -d -p 8000:8000 movie_recomender
```

## API Reference


#### GET /get-three-random-titles

Three random titles are returned

```http
http://localhost:8000/get-three-random-titles
```

#### GET /get-titles-starting-on-w-letter

All movies starting with the letter 'W' are returned, but only if they have an even number of characters in the title.

```http
http://localhost:8000/get-titles-starting-on-w-letter
```


#### GET /get-titles-with-more-than-one-word

All titles that consist of more than 1 word are returned.

```http
http://localhost:8000/get-titles-with-more-than-one-word
```

