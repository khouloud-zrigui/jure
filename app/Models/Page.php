<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
   /**
    * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $name;
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setName(string $name)
    {
        $this->name= $name;

}  public function getname()
{
    return $this->name;
}     


// Méthode pour ajouter une nouvelle page
public static function add($name)
{
    return self::create(['name' => $name]);
}
 // Méthode pour mettre à jour une page par son ID
 public static function updatePage($id, $name)
 {
     $page = self::findOrFail($id);
     $page->update(['name' => $name]);
     return $page;
 }
 
    // Méthode pour supprimer une page par son ID
    public static function deletePage($id)
    {
        $page = self::findOrFail($id);
        $page->delete();
        return $page;
    }

    // Méthode pour récupérer une page par son ID
    public static function getById($id)
    {
        return self::findOrFail($id);
    }

    // Méthode pour récupérer toutes les pages
    public static function getAll()
    {
        return self::all();
    }







}
