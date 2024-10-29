<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Console\Commands;

use App\Http\Helper\RandomStringGenerator;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Features;

class CreateAdministrator extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'jd:createAdmin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command to create Administrator';

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
     * @return int
     */
    public function handle()
    {
        $login = $this->ask('Username');
        $Pass = $this->ask('Password');
        $email = $login."@gmail.com";


        User::forceCreate([
            "name" => strtolower($login),
            "email2" => strtolower($email),
            "username" => strtolower($login),
            "userid" => $content["userid"],
            "email" => $email,
            "password2" => $Pass,
            "phone" => "123456789",
            "password" => \Hash::make($Pass),
            "email_verified_at" => date("Y-m-d H:i:s")
        ]);


        $this->info('Administraor has been created with details bellow');
        $this->info('Username: ' . $login);
        $this->info('Password: ' . $Pass);

        return 0;
    }
}
