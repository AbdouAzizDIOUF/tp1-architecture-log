<?php

class Text {

    /**
     * affiche une partie du contenu d'un article
     *
     * @param string $content
     * @param int $limit
     * @return string|bool
     */
    public static function excerpt(string $content, int $limit = 60): ?string
    {
        if (mb_strlen($content) <= $limit) {
            return $content;
        }
        $lastSpace = mb_strpos($content, ' ', $limit);
        return mb_substr($content, 0, $lastSpace) . '...';
    }

}