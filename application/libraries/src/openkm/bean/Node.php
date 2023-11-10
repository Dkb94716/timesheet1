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

/**
 * Node
 *
 * @author sochoa
 */
class Node {

    const AUTHOR = 'okm:author';
    const NAME = 'okm:name';

    protected $created;
    protected $path;
    protected $author;
    protected $permissions;
    protected $uuid;
    protected $subscribed;
    protected $subscriptors = array();
    protected $keywords = array();
    protected $categories = array();
    protected $notes = array();
    protected $nodeClass;
    
    public function getCreated() {
        return $this->created;
    }

    public function setCreated($created) {
        $this->created = $created;
    }

    public function getPath() {
        return $this->path;
    }

    public function setPath($path) {
        $this->path = $path;
    }

    public function getAuthor() {
        return $this->author;
    }

    public function setAuthor($author) {
        $this->author = $author;
    }

    public function getPermissions() {
        return $this->permissions;
    }

    public function setPermissions($permissions) {
        $this->permissions = $permissions;
    }

    public function getUuid() {
        return $this->uuid;
    }

    public function setUuid($uuid) {
        $this->uuid = $uuid;
    }

    public function isSubscribed() {
        return $this->subscribed;
    }

    public function setSubscribed($subscribed) {
        $this->subscribed = $subscribed;
    }

    public function getSubscriptors() {
        return $this->subscriptors;
    }

    public function setSubscriptors($subscriptors) {
        $this->subscriptors = $subscriptors;
    }

    public function getKeywords() {
        return $this->keywords;
    }

    public function setKeywords($keywords) {
        $this->keywords = $keywords;
    }

    public function getCategories() {
        return $this->categories;
    }

    public function setCategories($categories) {
        $this->categories = $categories;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function setNotes($notes) {
        $this->notes = $notes;
    }

    public function getNodeClass() {
        return $this->nodeClass;
    }

    public function setNodeClass($nodeClass) {
        $this->nodeClass = $nodeClass;
    }

}

?>
