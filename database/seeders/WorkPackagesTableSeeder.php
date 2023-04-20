<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Project;
use App\Models\Workarea;
use App\Models\Workpackage;

class WorkpackagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void{

        foreach(Project::all() as $project) {

            foreach($project->workareas as $workarea) {


                if(strtolower($workarea->name) == 'project general') {
                    
                    DB::table('workpackages')->insert([
                        'number' => '1',
                        'name' => 'Site Layout Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);

                    DB::table('workpackages')->insert([
                        'number' => '2',
                        'name' => 'Safety In Design Report',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);                    
                }

                if(strtolower($workarea->name) == 'system analysis') {
                    DB::table('workpackages')->insert([
                        'number' => '1',
                        'name' => 'Electrical Basis of Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);

                    DB::table('workpackages')->insert([
                        'number' => '2',
                        'name' => 'Availability Calculation',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);  
                    DB::table('workpackages')->insert([
                        'number' => '3',
                        'name' => 'Cable Design Report',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);

                    DB::table('workpackages')->insert([
                        'number' => '4',
                        'name' => 'Load Flow and Fault Study',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);    
                    DB::table('workpackages')->insert([
                        'number' => '5',
                        'name' => 'Arc Flash Report',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);

                    DB::table('workpackages')->insert([
                        'number' => '6',
                        'name' => 'Insulation Coordination Study',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);  
                    DB::table('workpackages')->insert([
                        'number' => '7',
                        'name' => 'Earthing System Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);

                    DB::table('workpackages')->insert([
                        'number' => '8',
                        'name' => 'Earthing System Commissioning',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                }

                if(strtolower($workarea->name) == 'external infrastructure') {
                    DB::table('workpackages')->insert([
                        'number' => '1',
                        'name' => 'External Road Design - Department of Transport and Main Roads',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '2',
                        'name' => 'External Road Design - Rockhamption Council - Functional Specification',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);    
                    DB::table('workpackages')->insert([
                        'number' => '3',
                        'name' => 'External Road Design - Rockhamption Council - Maintenance Manual',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                }

                if(strtolower($workarea->name) == 'temporary facilities') {
                    DB::table('workpackages')->insert([
                        'number' => '1',
                        'name' => 'Construction Compound Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '2',
                        'name' => 'Construction Laydown Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);    
                    DB::table('workpackages')->insert([
                        'number' => '3',
                        'name' => 'Batching Plant Layout',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                }

                if(strtolower($workarea->name) == 'permanent facilities') {
                    DB::table('workpackages')->insert([
                        'number' => '1',
                        'name' => 'O&M Facility Design - Office & Workshop',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '2',
                        'name' => 'O&M Facility - Civil Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);  
                }

                if(strtolower($workarea->name) == 'transmission line') {
                    DB::table('workpackages')->insert([
                        'number' => '1',
                        'name' => 'Transmission Line Design - Electrical, Fibre & Structural',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '2',
                        'name' => 'Transmission Line Design - Foundation & Civil',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);  
                }     
                
                if(strtolower($workarea->name) == 'collector civil and structural') {
                    DB::table('workpackages')->insert([
                        'number' => '1',
                        'name' => 'Earthworks, Roads, and Drainage Specification',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '2',
                        'name' => 'Pavement and Drainage Reports',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '3',
                        'name' => 'Collector Civil Design - Typicals',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '4',
                        'name' => 'Overall Civil Site Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);    
                    DB::table('workpackages')->insert([
                        'number' => '5',
                        'name' => 'Collector Civil Area Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '6',
                        'name' => 'Collector Civil Design - Area 1',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '7',
                        'name' => 'Collector Civil Design - Area 2',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]); 
                    DB::table('workpackages')->insert([
                        'number' => '8',
                        'name' => 'Collector Civil Design - Area 3',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);   
                    DB::table('workpackages')->insert([
                        'number' => '9',
                        'name' => 'Collector Civil Design - Area 4',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);   
                    DB::table('workpackages')->insert([
                        'number' => '10',
                        'name' => 'WTG Foundation Reports',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);  
                    DB::table('workpackages')->insert([
                        'number' => '11',
                        'name' => 'WTG Foundation Design',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);     
                    DB::table('workpackages')->insert([
                        'number' => '12',
                        'name' => 'Major Waterway Crossings',
                        'accountable_id' => '1',
                        'workarea_id' => $workarea->id
                    ]);  
                }

                if(strtolower($workarea->name) == 'collector electrical') {

                }

                if(strtolower($workarea->name) == 'substation civil and structural') {

                }

                if(strtolower($workarea->name) == 'substation primary') {

                }

                if(strtolower($workarea->name) == 'substation secondary') {

                }

                if(strtolower($workarea->name) == 'handover') {

                }                                
            }
        
    
        }
    }    
}
