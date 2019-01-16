<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Project;
use App\EndProject;
use Carbon\Carbon;

class CloseProjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'projects:close';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change of status all projects with the finished date ancient';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $endProjects = Project::with("reviews","artists.users", "management.users")->whereHas('endProject', function ($query){
            $query->where('end_time', '<=', Carbon::now()->toDateString());
        })
        ->whereIn("status", [Project::PREAPPROVAL, Project::REVISION])
        ->get();

        foreach($endProjects as $project){
            $this->changeStatusProjects($project);
        }
        //select project_id from reviews group by project_id HAVING count(project_id) = count(rating);
        $endProjects = Project::whereHas("reviews", function ($query){
            $query->groupBy("project_id")->havingRaw("count(project_id) = count(rating)");
        })
        ->whereIn("status", [Project::PREAPPROVAL, Project::REVISION])
        ->get();

        foreach($endProjects as $project){
            $this->changeStatusProjects($project);
        }

    }

    private function changeStatusProjects($project){
        $rating = $project->reviews->avg("rating");
        if ($rating < Project::PERCENTAGE_APPROVAL){
            $project->status = Project::REJECTED;
            $this->enviarMensajesRechazado($project, $rating);
            $project->save();
        }else{
            $project->status = Project::APPROVAL;
            $this->enviarMensajesAprobado($project, $rating);
            $project->save();
        }
    }

    private function enviarMensajesAprobado($project, $rating){
        /* codigo para enviar los mensajes que sean necesarios */
        $artist = $project->artists[0];
        $artistUser = $artist->users;
        /*enviar correo artista (
            $artistUser->email,
            $artistUser->name,
            $artistUser->last_name,
            $artist->nickname
        )
        */
        //enviar correo admin

        foreach($project->management as $management){
            $managementUser = $management->users;

            /*enviar correo managers (
                $managementUser->email,
                $managementUser->name,
                $managementUser->last_name
            )
            */
        }

    }

    private function enviarMensajesRechazado($project, $rating){
        /* codigo para enviar los mensajes que sean necesarios */
        $artist = $project->artists[0];
        $artistUser = $artist->users;

        //enviar correo artista
        foreach($project->management as $management){
            $managementUser = $management->users;
            //enviar correo managers
        }
    }
}
