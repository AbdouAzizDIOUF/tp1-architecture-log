<?php
require 'entity/Post.php';
require 'entity/Category.php';

class RepositoryFunction
{

    public static function getPDO(): PDO
    {
        return new PDO('mysql:dbname=php_classique_monsupersite;host=127.0.0.1', 'root', 'root', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]);
    }

    /**
     * lister les articles
     *
     * @return array
     */
    public static function postFindAll(): array
    {
        $query = self::getPDO()->query("SELECT * FROM posts LIMIT 15");
        return $query->fetchAll(PDO::FETCH_CLASS, Post::class);
    }

    /**
     * detaille d'un article
     *
     * @param $id
     * @return mixed
     */
    public static function postDetail($id){
        $query = self::getPDO()->query("SELECT * FROM posts WHERE id=$id");
        return $query->fetchAll(PDO::FETCH_CLASS, Post::class)[0];
    }

    /**
     * liste des categories
     *
     * @return array
     */
    public static function categoryFindAll(): array {
        $query = self::getPDO()->query("SELECT * FROM categories");
        return $query->fetchAll(PDO::FETCH_CLASS, Category::class);
    }

    /**
     * listes des article appartenant d'un category
     *
     * @param $id
     * @return array
     */
    public static function findPostByCategory($id){
        $query = self::getPDO()->query("SELECT * FROM posts WHERE category_id=$id");
        return $query->fetchAll(PDO::FETCH_CLASS, Post::class);
    }

    /**
     * obtenir le categorie d'un article
     *
     * @param $id
     * @return mixed
     */
    public static function categoryName($id){
        $query = self::getPDO()->query("SELECT * FROM categories WHERE id=$id");
        return $query->fetchAll(PDO::FETCH_CLASS, Category::class)[0];
    }
}