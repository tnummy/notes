<?php

use Carbon\Carbon;

class NoteTableSeeder extends DatabaseSeeder
{
    public function run()
    {
        $now = Carbon::now();

        DB::table('notes')->insert([
            [
                'user_id' => 1,
                'title' => 'This is a Note Title',
                'body' => 'This is the note body.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'user_id' => 1,
                'title' => 'This is another Note Title',
                'body' => 'This is another note body.',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}