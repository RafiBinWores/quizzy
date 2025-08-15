<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Question;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // for bulk category based questions seeding
        // $categories = Category::all()->keyBy('name');

        // $data = [
        //     [
        //         'question' => 'What is H2O?',
        //         'options' => ['Water', 'Oxygen', 'Hydrogen', 'Helium'],
        //         'correct_option' => 'Water',
        //         'category_id' => $categories['Science']->id,
        //     ],
        //     [
        //         'question' => '2 + 2 = ?',
        //         'options' => ['3', '4', '5', '22'],
        //         'correct_option' => '4',
        //         'category_id' => $categories['Math']->id,
        //     ],
        // ];


        $categories = Category::all();
        $fakeOptions = [
            ['Alpha', 'Beta', 'Gamma', 'Delta'],
            ['Red', 'Blue', 'Green', 'Yellow'],
            ['Cat', 'Dog', 'Fish', 'Bird'],
            ['One', 'Two', 'Three', 'Four'],
            ['Apple', 'Banana', 'Orange', 'Mango'],
        ];

        foreach ($categories as $cat) {
            for ($i = 1; $i <= 50; $i++) {
                // Pick options and correct answer randomly for variety
                $opts = $fakeOptions[array_rand($fakeOptions)];
                $correct = $opts[array_rand($opts)];

                Question::create([
                    'question' => "[$cat->name] Question $i: What is the correct answer?",
                    'options' => $opts,
                    'correct_option' => $correct,
                    'category_id' => $cat->id,
                ]);
            }
        }
    }
}
