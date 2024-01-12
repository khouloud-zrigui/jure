<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;
    protected $fillable = ['vpath', 'alt', 'title', 'order'];

    /**
     * Méthode pour ajouter une nouvelle photo
     *
     * @param string $vpath
     * @param string $alt
     * @param string $title
     * @param int $order
     * @return \App\Models\Photo
     */
    public static function add(string $vpath, string $alt, string $title, int $order)
    {
        return self::create(compact('vpath', 'alt', 'title', 'order'));
    }

    /**
     * Méthode pour mettre à jour une photo par son ID
     *
     * @param int $id
     * @param string $vpath
     * @param string $alt
     * @param string $title
     * @param int $order
     * @return \App\Models\Photo
     */
    public static function updatePhoto(int $id, string $vpath, string $alt, string $title, int $order)
    {
        $photo = self::findOrFail($id);
        $photo->update(compact('vpath', 'alt', 'title', 'order'));
        return $photo;
    }

    /**
     * Méthode pour supprimer une photo par son ID
     *
     * @param int $id
     * @return \App\Models\Photo
     */
    public static function deletePhoto(int $id)
    {
        $photo = self::findOrFail($id);
        $photo->delete();
        return $photo;
    }

    /**
     * Méthode pour récupérer une photo par son ID
     *
     * @param int $id
     * @return \App\Models\Photo
     */
    public static function getById(int $id)
    {
        return self::findOrFail($id);
    }

    /**
     * Méthode pour récupérer toutes les photos
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public static function getAll()
    {
        return self::all();
    }

    /**
     * Méthode pour mettre à jour l'ordre d'une photo
     *
     * @param int $id
     * @param int $newOrder
     * @return \App\Models\Photo
     */
    public static function updateOrder(int $id, int $newOrder)
    {
        $photo = self::findOrFail($id);
        $photo->order = $newOrder;
        $photo->save();
        return $photo;
    }
}
