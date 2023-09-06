<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalDetailsSeeder extends Seeder
{
    public function run()
    {
        for ($i = 1; $i <= 50; $i++) {
            $personId = DB::table('personal_details')->insertGetId([
                'name' => 'Person ' . $i,
                'email' => 'person' . $i . '@example.com',
            ]);


            for ($j = 1; $j <= rand(3, 12); $j++) {
                $interestName = $this->getRandomInterestName();
                $interestData = [
                    'name' => $interestName,
                    'person_id' => $personId,
                ];

                $interestId = DB::table('interests')->insertGetId($interestData);

                if (!in_array($interestName, ['Sport', 'Fishing'])) {
                    if (in_array($interestName, ['Gardening', 'Animals', 'Children'])) {
                        $this->createDocuments($interestId, $interestName, $personId);
                    } else {
                        if (rand(1, 100) <= 60) {
                            $this->createDocuments($interestId, $interestName, $personId);
                        }
                    }
                }
            }

        }
    }

    private function getRandomInterestName()
    {
        $interests = [
            'Animals', 'Cooking', 'Photography', 'Traveling', 'Reading',
            'Music', 'Art', 'Children', 'Gaming', 'Dancing',
            'Coding', 'Sport', 'Yoga', 'Movies', 'Writing',
        ];

        return $interests[array_rand($interests)];
    }

    private function createDocuments($interestID ,$interestName, $personId)
    {
        $numDocuments = rand(1, 5);
        for ($k = 1; $k <= $numDocuments; $k++) {
            DB::table('documents')->insert([
                'interest' => $interestName,
                'name' => 'Document_' . uniqid() . '.pdf',
                'url' => 'https://example.com/documents/' . uniqid() . '.pdf',
                'person_id' => $personId,
                'interest_id' => $interestID,
            ]);
        }
    }
}
