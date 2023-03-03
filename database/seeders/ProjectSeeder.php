<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Project::create(['userID' => '1257146', 'pmName' => 'Kev', 'projectName' => 'Azure', 'type' => 'pipeline', 'description' => 'Azure project', 'stage' => 'Initiation', 'rag' => 'Green', 'budget' => 0, 'sponsor' => 'eric', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '1257146', 'pmName' => 'Kev', 'projectName' => 'Beta', 'type' => 'IT Assist', 'description' => 'Beta project', 'stage' => 'Service design', 'rag' => 'Amber', 'budget' => 0, 'sponsor' => 'Luna', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '1257146', 'pmName' => 'Kev', 'projectName' => 'Cats', 'type' => 'Non ITAssist', 'description' => 'Cat project', 'stage' => 'Implementation', 'rag' => 'Green', 'budget' => 0, 'sponsor' => 'Noodles', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '1257146', 'pmName' => 'Kev', 'projectName' => 'Dog', 'type' => 'pipeline', 'description' => 'Dog project', 'stage' => 'Pilot/Testing', 'rag' => 'Red', 'budget' => 0, 'sponsor' => 'Misty', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 1]);

        Project::create(['userID' => '12571467', 'pmName' => 'Mel', 'projectName' => 'Azure', 'type' => 'pipeline', 'description' => 'Azure project', 'stage' => 'Initiation', 'rag' => 'Green', 'budget' => 0, 'sponsor' => 'eric', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '12571467', 'pmName' => 'Mel', 'projectName' => 'Beta', 'type' => 'IT Assist', 'description' => 'Beta project', 'stage' => 'Service design', 'rag' => 'Amber', 'budget' => 0, 'sponsor' => 'Luna', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '12571467', 'pmName' => 'Mel', 'projectName' => 'Cats', 'type' => 'Non ITAssist', 'description' => 'Cat project', 'stage' => 'Implementation', 'rag' => 'Green', 'budget' => 0, 'sponsor' => 'Noodles', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '12571467', 'pmName' => 'Mel', 'projectName' => 'Dog', 'type' => 'pipeline', 'description' => 'Dog project', 'stage' => 'Pilot/Testing', 'rag' => 'Red', 'budget' => 0, 'sponsor' => 'Misty', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 1]);

        Project::create(['userID' => '22571467', 'pmName' => 'Rachel', 'projectName' => 'Azure', 'type' => 'pipeline', 'description' => 'Azure project', 'stage' => 'Initiation', 'rag' => 'Green', 'budget' => 0, 'sponsor' => 'eric', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '22571467', 'pmName' => 'Rachel', 'projectName' => 'Beta', 'type' => 'IT Assist', 'description' => 'Beta project', 'stage' => 'Service design', 'rag' => 'Amber', 'budget' => 0, 'sponsor' => 'Luna', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '22571467', 'pmName' => 'Rachel', 'projectName' => 'Cats', 'type' => 'Non ITAssist', 'description' => 'Cat project', 'stage' => 'Implementation', 'rag' => 'Green', 'budget' => 0, 'sponsor' => 'Noodles', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '22571467', 'pmName' => 'Rachel', 'projectName' => 'Dog', 'type' => 'pipeline', 'description' => 'Dog project', 'stage' => 'Pilot/Testing', 'rag' => 'Red', 'budget' => 0, 'sponsor' => 'Misty', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 1]);


        Project::create(['userID' => '32571467', 'pmName' => 'Toby', 'projectName' => 'Azure', 'type' => 'pipeline', 'description' => 'Azure project', 'stage' => 'Initiation', 'rag' => 'Green', 'budget' => 0, 'sponsor' => 'eric', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '32571467', 'pmName' => 'Toby', 'projectName' => 'Beta', 'type' => 'IT Assist', 'description' => 'Beta project', 'stage' => 'Service design', 'rag' => 'Amber', 'budget' => 0, 'sponsor' => 'Luna', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '32571467', 'pmName' => 'Toby', 'projectName' => 'Cats', 'type' => 'Non ITAssist', 'description' => 'Cat project', 'stage' => 'Implementation', 'rag' => 'Green', 'budget' => 0, 'sponsor' => 'Noodles', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 0]);
        Project::create(['userID' => '32571467', 'pmName' => 'Toby', 'projectName' => 'Dog', 'type' => 'pipeline', 'description' => 'Dog project', 'stage' => 'Pilot/Testing', 'rag' => 'Red', 'budget' => 0, 'sponsor' => 'Misty', 'startDate' => '2022/01/01', 'endDate' => '2023/01/01', 'archived' => 1]);
    }
}
