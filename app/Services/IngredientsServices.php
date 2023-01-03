<?php

namespace App\Services;

class IngredientsServices
{


    public static function getPossibleSizesPizza(): array
    {
        return ['small', 'medium', 'maxi',];
    }

    public static function getPossibleCakesAdditionsPizza(): array
    {
        return ['on thin', 'on thick',];
    }

    public static function getPossibleVegetableAdditionsPizza(): array
    {
        return ['corn', 'pepper', 'olives', 'onion', 'arugula', 'spinach',];
    }

    public static function getPossibleMeatsAdditionsPizza(): array
    {
        return ['chicken', 'ham', 'bacon', 'salami',];
    }

    public static function getPossibleSaucesAdditions(): array
    {
        return ['ketchup', 'garlic', 'spicy', 'mixed',];
    }

    public static function getPossibleSizesAdditionsKebab(): array
    {
        return ['smal', 'medium',];
    }

    public static function getPossibleCakesAdditionsKebab(): array
    {
        return ['doner pita', 'doner roll',];
    }

    public static function getPossibleMeatsAdditionsKebab(): array
    {
        return ['chicken ', 'beef',];
    }

    public static function getPossibleVegetableAdditionsKebab(): array
    {
        return ['tomato', 'mix salat', 'cucumber',];
    }


}
