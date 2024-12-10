<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Answer;
use App\Models\User;
use App\Models\Question;
use App\Models\Option;

class AnswerSeeder extends Seeder
{
    public function run()
    {
        // Misalnya kita akan membuat data jawab untuk user 1
        $user = User::find(1);  // Pastikan ada user dengan ID 1
        $question = Question::find(1);  // Pastikan ada question dengan ID 1
        $option = Option::where('question_id', $question->id)->first();  // Ambil option pertama untuk question tersebut
        
        if ($user && $question && $option) {
            Answer::create([
                'user_id' => $user->id,
                'question_id' => $question->id,
                'selected_option_id' => $option->id,  // Menyimpan ID option yang dipilih
            ]);
        }
    }
}
