<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Link extends Model
{/**
    * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $href;
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setHref($href)
    {
        $this->href = $href;
    }

    public function getHref()
    {
        return $this->href;
    }

    public static function add($data)
    {
        $link = new self;
        $link->setHref($data['href']);
        $link->save();

        return $link;
    }

    public function updateLink($data)
    {
        $this->setHref($data['href']);
        $this->save();

        return $this;
    }

    public function deleteLink()
    {
        $this->delete();
    }

    public static function getById($id)
    {
        $link = new self;
        $link->setId($id);

        return $link->find($id);
    }

    public static function getAll()
    {
        return self::all();
    }

    public static function getByName($name)
    {
        return self::where('name', $name)->get();
    }
}
