<?php

namespace Database\Seeders;

use App\Models\Ingredients;
use App\Services\IngredientsServices;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IngredientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (IngredientsServices::getPossibleSizesPizza() as $sizeAddition) {
            Ingredients::create([
                'name' => $sizeAddition,
                'type' => 'size',
                'product_type' => 'pizza',
            ]);
        }

        foreach (IngredientsServices::getPossibleCakesAdditionsPizza() as $sizeAddition) {
            Ingredients::create([
                'name' => $sizeAddition,
                'type' => 'cake',
                'product_type' => 'pizza',
            ]);
        }

        foreach (IngredientsServices::getPossibleVegetableAdditionsPizza() as $vegetableAddition) {
            Ingredients::create([
                'name' => $vegetableAddition,
                'type' => 'vegetable',
                'product_type' => 'pizza',
            ]);

        }

        foreach (IngredientsServices::getPossibleMeatsAdditionsPizza() as $meatAddition) {
            Ingredients::create([
                'name' => $meatAddition,
                'type' => 'meat',
                'product_type' => 'pizza',
            ]);

        }

        foreach (IngredientsServices::getPossibleSaucesAdditions() as $saucesAddition) {
            Ingredients::create([
                'name' => $saucesAddition,
                'type' => 'sauce',
                'product_type' => 'pizza',
            ]);

        }

        foreach (IngredientsServices::getPossibleSizesAdditionsKebab() as $sizeAddition) {
            Ingredients::create([
                'name' => $sizeAddition,
                'type' => 'size',
                'product_type' => 'kebab',
            ]);
        }

        foreach (IngredientsServices::getPossibleCakesAdditionsKebab() as $sizeAddition) {
            Ingredients::create([
                'name' => $sizeAddition,
                'type' => 'cake',
                'product_type' => 'kebab',
            ]);
        }

        foreach (IngredientsServices::getPossibleMeatsAdditionsKebab() as $meatAddition) {
            Ingredients::create([
                'name' => $meatAddition,
                'type' => 'meat',
                'product_type' => 'kebab',
            ]);

        }

        foreach (IngredientsServices::getPossibleVegetableAdditionsKebab() as $vegetableAddition) {
            Ingredients::create([
                'name' => $vegetableAddition,
                'type' => 'vegetable',
                'product_type' => 'kebab',
            ]);

        }

        foreach (IngredientsServices::getPossibleSaucesAdditions() as $saucesAddition) {
            Ingredients::create([
                'name' => $saucesAddition,
                'type' => 'sauce',
                'product_type' => 'kebab',
            ]);

        }


    }
}
