<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
  
    use HasFactory;
/**
    * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $vpath;
    /**
    * @var int
     */
    private $order;
/**
     * @var string
     */
    private $title;
    
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setvpath(string $vpath)
    {
        $this->vpath= $vpath;

}  public function getvpath()
{
    return $this->vpath;
}     
public function settitle(string $title)
{
    $this->title= $title;

}  public function gettitle()
{
return $this->title;
}     
public function setorder(string $order)
{
    $this->order= $order;

}  public function getorder()
{
return $this->order;
}     


    // Méthode pour ajouter une nouvelle vidéo
    public static function add($vpath, $title, $order)
    {
        return self::create(compact('vpath', 'title', 'order'));
    }

    // Méthode pour mettre à jour une vidéo par son ID
    public static function updateVideo($id, $vpath, $title, $order)
    {
        $video = self::findOrFail($id);
        $video->update(compact('vpath', 'title', 'order'));
        return $video;
    }

    // Méthode pour supprimer une vidéo par son ID
    public static function deleteVideo($id)
    {
        $video = self::findOrFail($id);
        $video->delete();
        return $video;
    }

    // Méthode pour récupérer une vidéo par son ID
    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    // Méthode pour récupérer toutes les vidéos
    public static function getAll()
    {
        return self::all();
    }

    // Méthode pour mettre à jour l'ordre d'une vidéo
    public static function updateOrder($id, $newOrder)
    {
        $video = self::findOrFail($id);
        $video->order = $newOrder;
        $video->save();
        return $video;
    }
}
