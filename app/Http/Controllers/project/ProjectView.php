<?php

namespace App\Http\Controllers\project;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ItemGroup;
use App\Http\Controllers\BaseAdminController as BaseAdminController;

class ProjectView extends BaseAdminController
{
    protected $Project, $ItemGroup;

    public function __construct(Project $Project, ItemGroup $ItemGroup){
        parent::__construct();
        $this->Project = $Project;
        $this->ItemGroup = $ItemGroup;
    }

    public function __invoke(Request $request)
    {
        $ListItemGroups = $this->ItemGroup->getItemGroupByStatus(0);
        //Hard code for taskgroup
        $ListTaskGroups = [
            (object)[
                "id" => 1,
                "name" => 'Biểu mẫu công việc 1',
            ],
            (object)[
                "id" => 2,
                "name" => 'Biểu mẫu công việc 2',
            ],
            (object)[
                "id" => 3,
                "name" => 'Biểu mẫu công việc 3',
            ],
        ];
        $data = [
            'ListItemGroups' => $ListItemGroups,
            'ListTaskGroups' => $ListTaskGroups
        ];
        return view('project.index', $data);
    }
}
