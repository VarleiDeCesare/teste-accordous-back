<?php

namespace App\Jobs;

use App\Models\Property;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class UpdateStatusOfProperty implements ShouldQueue {
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $property;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($property) {

        $this->property = $property;

    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle() {
        $property = Property::findOrFail($this->property);
        $property->status = 1;
        $property->save();

    }
}
