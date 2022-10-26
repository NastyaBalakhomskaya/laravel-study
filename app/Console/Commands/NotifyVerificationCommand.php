<?php

namespace App\Console\Commands;


use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Str;

class NotifyVerificationCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:notify-verification {email}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify Verification User';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        if (!$request->hasValidSignature()) {
            abort(403);
        }

        $user = User::query()->findOrFail($id);

        if (!hash_equals($hash, sha1($user->email))) {
            abort(403);
        }
        $user->email_verified_at = new \DateTime();
        $user->save();

        session()->flash('success', 'Success!');
        return redirect()->route('home');
    }

}
