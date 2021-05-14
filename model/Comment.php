<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Comment
 *
 * @author Trinity
 */
class Comment {
    //put your code here
    private $userID, $commentID, $userComment;
    
    public function __construct($userID, $commentID, $userComment) {
        $this->userID = $userID;
        $this->commentID = $commentID;
        $this->userComment = $userComment;
    }
    public function getUserID() {
        return $this->userID;
    }

    public function getCommentID() {
        return $this->commentID;
    }

    public function getUserComment() {
        return $this->userComment;
    }

    public function setUserID($userID) {
        $this->userID = $userID;
    }

    public function setCommentID($commentID) {
        $this->commentID = $commentID;
    }

    public function setUserComment($userComment) {
        $this->userComment = $userComment;
    }


}

