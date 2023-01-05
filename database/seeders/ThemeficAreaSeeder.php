<?php

namespace Database\Seeders;

use App\Models\ThemeficArea;
use Illuminate\Database\Seeder;

class ThemeficAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = [
            [
                "code"=> "21-01",
                "name"=> "Maternal and newborn health"
            ],
            [
                "code"=> "21-02",
                "name"=> "Immunization"
            ],
            [
                "code"=> "21-03",
                "name"=> "Child Health"
            ],
            [
                "code"=> "21-04",
                "name"=> "Prevention of stunting and other forms of malnutrition"
            ],
            [
                "code"=> "21-05",
                "name"=> "Treatment of severe acute  malnutrition"
            ],
            [
                "code"=> "21-06",
                "name"=> "Treatment and care of children living with HIV"
            ],
            [
                "code"=> "21-07",
                "name"=> "HIV prevention"
            ],
            [
                "code"=> "21-08",
                "name"=> "Early childhood development"
            ],
            [
                "code"=> "21-09",
                "name"=> "Adolescent health and nutrition"
            ],
            [
                "code"=> "22-01",
                "name"=> "Equitable access to quality education"
            ],
            [
                "code"=> "22-02",
                "name"=> "Learning outcomes"
            ],
            [
                "code"=> "22-03",
                "name"=> "Skills development"
            ],
            [
                "code"=> "23-01",
                "name"=> "Prevention and response services for violence against children"
            ],
            [
                "code"=> "23-02",
                "name"=> "Harmful practices (FGM/C and child marriage)"
            ],
            [
                "code"=> "23-03",
                "name"=> "Access to justice"
            ],
            [
                "code"=> "24-01",
                "name"=> "Water"
            ],
            [
                "code"=> "24-02",
                "name"=> "Sanitation"
            ],
            [
                "code"=> "24-03",
                "name"=> "Disaster Risk Reduction"
            ],
            [
                "code"=> "24-04",
                "name"=> "Children in Urban Settings / Local Governance"
            ],
            [
                "code"=> "24-05",
                "name"=> "Environmental Sustainability"
            ],
            [
                "code"=> "25-01",
                "name"=> "Child Poverty / Public finance for children"
            ],
            [
                "code"=> "25-02",
                "name"=> "Social Protection"
            ],
            [
                "code"=> "25-03",
                "name"=> "Adolescent empowerment"
            ],
            [
                "code"=> "25-04",
                "name"=> "Gender discriminatory roles and practices"
            ],
            [
                "code"=> "25-05",
                "name"=> "Children with disabilities"
            ],
            [
                "code"=> "26-01",
                "name"=> "Cross-sectoral planning and programme reviews"
            ],
            [
                "code"=> "26-02",
                "name"=> "Cross-sectoral monitoring, data and situation analyses"
            ],
            [
                "code"=> "26-03",
                "name"=> "Cross-sectoral Communication for Development"
            ],
            [
                "code"=> "26-04",
                "name"=> "Supply and Logistics"
            ],
            [
                "code"=> "26-05",
                "name"=> "Evaluation and Research"
            ],
            [
                "code"=> "26-06",
                "name"=> "Other Cross-sectoral Programme areas"
            ],
            [
                "code"=> "26-07",
                "name"=> "Operations support to Programme delivery"
            ],
            [
                "code"=> "27-01",
                "name"=> "Technical excellence in policy and programmes"
            ],
            [
                "code"=> "27-02",
                "name"=> "Technical excellence in procurement and management of supplies"
            ],
            [
                "code"=> "27-03",
                "name"=> "Technical excellence in humanitarian action"
            ],
            [
                "code"=> "27-04",
                "name"=> "Technical excellence in evaluation"
            ],
            [
                "code"=> "28-01",
                "name"=> "Corporate oversight and assurance"
            ],
            [
                "code"=> "28-02",
                "name"=> "Corporate financial, information and communication technology and administrative management"
            ],
            [
                "code"=> "28-03",
                "name"=> "Corporate external relations and partnerships, communication and Resource mobilization"
            ],
            [
                "code"=> "28-04",
                "name"=> "Corporate human resources management"
            ],
            [
                "code"=> "28-05",
                "name"=> "Leadership and Corporate Direction"
            ],
            [
                "code"=> "28-06",
                "name"=> "Staff and premises security"
            ],
            [
                "code"=> "28-07",
                "name"=> "Field/country office oversight, management and operations support"
            ],
            [
                "code"=> "29-01",
                "name"=> "United Nations Coherence and cluster coordination"
            ],
            [
                "code"=> "30-01",
                "name"=> "PSFR modalities non-post"
            ],
            [
                "code"=> "30-02",
                "name"=> "PSFR Technical assistance"
            ],
            [
                "code"=> "30-03",
                "name"=> "Private Sector Engagement"
            ],
            [
                "code"=> "30-04",
                "name"=> "Procurement services"
            ],
            [
                "code"=> "30-05",
                "name"=> "Capital Investments"
            ]
        ];

        ThemeficArea::insert($areas);
    }
}
