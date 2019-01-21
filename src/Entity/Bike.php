<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Class Bike
 * @package App\Entity
 * @ORM\Entity
 * @ORM\Table(name="bikes")
 */
class Bike
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $make;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $model;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $year;

    /**
     * @ORM\Column(type="text")
     */
    private $mods;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $picture;

    /**
     * Bike constructor.
     * @param $make
     * @param $model
     * @param $year
     * @param $mods
     * @param $picture
     */
//    public function __construct(string $make, string $model, string $year, text $mods, string $picture)
//    {
//    }
    public static function create(string $make, string $model, string $year, text $mods, string $picture) {
        $object = new self();
        $object->make = $make;
        $object->model = $model;
        $object->year = $year;
        $object->mods = $mods;
        $object->picture = $picture;
        return $object;
    }
}
