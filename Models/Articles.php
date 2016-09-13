<?php

class Articles {

    public function addArticle($title, $content, $user_id, $category_id) {
        
        SPDO::getInstance()->prepare("INSERT INTO articles (title, content, author, status, date_creation, date_post, category_id) VALUES (?, ?, ?, 1, NOW(), ?)", $title, $content, $user_id, $category_id);
    }

    public function new($id = NULL) {

        if ($id)
            SPDO::getInstance()->prepare("SELECT * from articles WHERE id = ?", $id);
        else
            SPDO::getInstance()->prepare("SELECT * from articles");
    }
}