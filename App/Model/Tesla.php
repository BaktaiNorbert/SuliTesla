<?php

namespace App\Model;

class Tesla
{
    private string $model;
    private float $acceleration;
    private float $wltp;
    private int $seats;
    private string $img;
    static private array $models = [
        "s" => "Model S",
        "3" => "Model 3",
        "x" => "Model X",
        "y" => "Model Y"
    ];
    public function __construct(string $model, float $acceleration, float $wltp, int $seats, string $img)
    {
        $this->model = $model;
        $this->acceleration = $acceleration;
        $this->wltp = $wltp;
        $this->seats = $seats;
        $this->img = $img;
    }
    function __get($name)
    {
        if (property_exists($this, $name) && $name != "models") {
            return $this->$name;
        }
    }
    function __set($name, $value)
    {
        if (property_exists($this, $name)) {
            $this->$name = $value;
        }
    }
    static public function getModels() :array {
        return self::$models;
    }
    public function getImagePath(){
        return "./forras/".$this->img;
    }
}