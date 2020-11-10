<?php

namespace App\Console\Commands;

use App\Model\Document;
use App\Model\SiblingGroup;
use App\Model\StudentProfileReport;
use App\Student;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use PDF;
use setasign\Fpdi\Fpdi;
class StudentProfileReportRequest extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:report';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        
    }
    
}
