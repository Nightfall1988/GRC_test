<?php

declare(strict_types=1);

namespace Application\Helper;

use Application\Entity\Movie;

class DataHelper
{
    /**
     * @param Movie[] $allSearchHistory
     * @return array
     */
    public function createMovieData(array $allSearchHistory): array
    {
        $movies = [];

        // HERE WE SET A STRING OF ALL GENRES AND ALL LANGUAGES TO ALL MOVIES
        foreach ($allSearchHistory as $movie) {
            $movies[] = [
                'name' => $movie->getName(),
                'genre' => count($movie->getGenres()) > 0
                    ? $this->getEachGenre($movie)
                    : '-',
                'language' => count($movie->getLanguages()) > 0
                    ? $this->getEachLanguage($movie)
                    : '-',
            ];
        }

        return $movies;
    }

    /**
     * @param string[][] $allOptions
     * @return array
     */
    public function createOptionsData(array $allOptions): array
    {
        $options = array();

        foreach ($allOptions as $option) {
            $options[] = array_pop($option);
        }

        return $options;
    }

    /*
    HERE WE USE A METHOD TO GET ALL GENRES OF A SPPECIFIC MOVIE
    TO RETURN A STRING OF THIS MOVIE'S GENRES SEPERATED BY COMMA
    */
    /**
     * @param Movie $movie
     * @return string
     */
    public function getEachGenre(Movie $movie)
    {
        $genres = [];
        foreach ($movie->getGenres() as $genre) {
            if (!in_array($genre->getGenre(), $genres)) {
                $genres[] = $genre->getGenre();
            }
        }
        return implode(', ', $genres);
    }

    /*
    HERE WE USE A METHOD TO GET ALL GENRES OF A SPPECIFIC MOVIE
    TO RETURN A STRING OF THIS MOVIE'S GENRES SEPERATED BY COMMA
    */
    /**
     * @param Movie $movie
     * @return string
     */
    public function getEachLanguage(Movie $movie)
    {
        $languages = [];
        foreach ($movie->getLanguages() as $language) {
            if (!in_array($language->getLanguage(), $languages)) {
                $languages[] = $language->getLanguage();
            }
        }
        return  implode(', ', $languages);
    }
}
