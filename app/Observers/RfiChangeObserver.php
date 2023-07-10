<?php

namespace App\Observers;
use App\Models\Rfi;
use App\Models\RfiChangeLog;


class RfiChangeObserver
{
    public function created(Rfi $rfi)
    {
        $description = auth()->user()->name . ' created RFI ' . $rfi->number . ' ' . $rfi->name;
        $this->logChange($rfi, 'created', $description);
    }

    public function updated(Rfi $rfi)
    {
        $description = auth()->user()->name . ' updated ' . $rfi->number;
        $this->logChange($rfi, 'updated', $description);
    }

    public function deleted(Rfi $rfi)
    {
        $description = auth()->user()->name . ' deleted ' . $rfi->number;
        $this->logChange($rfi, 'deleted', $description);
    }

    protected function logChange(Rfi $rfi, string $action, string $description)
    {
        $log = new RfiChangeLog();
        $log->model = get_class($rfi);
        $log->model_id = $rfi->getKey();
        $log->action = $action;


        $log->description = $description;

        // Add any additional information you want to log, such as the user who made the change
        $log->user_id = auth()->id();
        $log->save();
    }
}
