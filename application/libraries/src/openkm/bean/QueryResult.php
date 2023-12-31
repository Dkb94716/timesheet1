<?php

/**
 * OpenKM, Open Document Management System (http://www.openkm.com)
 * Copyright (c) 2006-2014 Paco Avila & Josep Llort
 * 
 * No bytes were intentionally harmed during the development of this application.
 * 
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 * 
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 */

namespace openkm\bean;

use openkm\bean\Node;

/**
 * QueryResult
 *
 * @author sochoa
 */
class QueryResult {

    private $node;
    private $attachment;
    private $excerpt;
    private $score;

    public function getNode() {
        return $this->node;
    }

    public function setNode(Node $node) {
        $this->node = $node;
    }

    public function isAttachment() {
        return $this->attachment;
    }

    public function setAttachment($attachment) {
        $this->attachment = $attachment;
    }

    public function getExcerpt() {
        return $this->excerpt;
    }

    public function setExcerpt($excerpt) {
        $this->excerpt = $excerpt;
    }

    public function getScore() {
        return $this->score;
    }

    public function setScore($score) {
        $this->score = $score;
    }

    public function toString() {
        return "{node=" . $this->node . ", attachment=" . $this->attachment . ", excerpt=" . $this->excerpt . ", score=" . $this->score . "}";
    }

}

?>