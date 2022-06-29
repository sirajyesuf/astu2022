<?php

namespace Database\Seeders;

use App\Models\School;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SchoolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $depts_soeec = [
            [
                'long_name' => "Computer Science and Enginering",
                'short_name' => "CSE"
            ],
            [
                'long_name' => "Electrical Power and Control Engineering",
                'short_name' => "EPCE"
            ],
            [
                'long_name' => "Power and Communication Engineering",
                'short_name' => "PCE"
            ]
        ];

        $depts_somcme = [
            [
                'long_name' => "mechannical",
                'short_name' => "MENG"
            ],
            [
                'long_name' => "chemical",
                'short_name' => "CHEM"
            ],
            [
                'long_name' => "material",
                'short_name' => "MSE"
            ]
        ];

        $depts_socea = [
            [
                'long_name' => "architecture",
                'short_name' => "ARCH"
            ],
            [
                'long_name' => "water",
                'short_name' => "WRE"
            ],
            [
                'long_name' => "civil",
                'short_name' => "CE"
            ]
        ];

        $depts_soans = [
            [
                'long_name' => "pysics",
                'short_name' => "pysics"
            ],

        ];
        $soeec = School::create(
            [
                'long_name' => "school of electrical enginnering and computing",
                "short_name" => "SoEEC"
            ]
        );
        $somcme = School::create(
            [
                'long_name' => "school of mechanical chemical material enginnering",
                'short_name' => "SoMCME"
            ]
        );

        $socea = School::create([
            'long_name' => "school of civil enginnering and architecture",
            'short_name' => "SoCEA"
        ]);

        $soans = School::create([
            'long_name' => "school of Applied and Science",
            'short_name' => "SoANS"
        ]);

        $soeec->departments()->createMany($depts_soeec);
        $somcme->departments()->createMany($depts_somcme);
        $socea->departments()->createMany($depts_socea);
        $soans->departments()->createMany($depts_soans);


        // $schools = [
        //     [
        //         'long_name' => "school of electrical enginnering and computing",
        //         "short_name" => "SoEEC"
        //     ],
        //     [
        //         'long_name' => "school of mechanical chemical material enginnering",
        //         'short_name' => "SoMCME"
        //     ],
        //     [
        //         'long_name' => "school of civil enginnering and architecture",
        //         'short_name' => "SoCEA"
        //     ],
        //     [
        //         'long_name' => "school of Applied and Science",
        //         'short_name' => "SoANS"
        //     ]
        // ];
        // DB::table('schools')->insert($schools);
    }
}
