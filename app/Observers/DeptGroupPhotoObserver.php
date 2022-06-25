<?php

namespace App\Observers;

use App\Models\DeptGroupPhoto;

class DeptGroupPhotoObserver
{
    /**
     * Handle the DeptGroupPhoto "created" event.
     *
     * @param  \App\Models\DeptGroupPhoto  $deptGroupPhoto
     * @return void
     */
    public function created(DeptGroupPhoto $deptGroupPhoto)
    {
        //
    }

    /**
     * Handle the DeptGroupPhoto "updated" event.
     *
     * @param  \App\Models\DeptGroupPhoto  $deptGroupPhoto
     * @return void
     */
    public function updated(DeptGroupPhoto $deptGroupPhoto)
    {
        foreach ($deptGroupPhoto->images as $image) {

            unlink(storage_path("app/public/$image"));
        }
    }

    /**
     * Handle the DeptGroupPhoto "deleted" event.
     *
     * @param  \App\Models\DeptGroupPhoto  $deptGroupPhoto
     * @return void
     */
    public function deleted(DeptGroupPhoto $deptGroupPhoto)
    {
        foreach ($deptGroupPhoto->images as $image) {

            unlink(storage_path("app/public/$image"));
        }
    }

    /**
     * Handle the DeptGroupPhoto "restored" event.
     *
     * @param  \App\Models\DeptGroupPhoto  $deptGroupPhoto
     * @return void
     */
    public function restored(DeptGroupPhoto $deptGroupPhoto)
    {
        //
    }

    /**
     * Handle the DeptGroupPhoto "force deleted" event.
     *
     * @param  \App\Models\DeptGroupPhoto  $deptGroupPhoto
     * @return void
     */
    public function forceDeleted(DeptGroupPhoto $deptGroupPhoto)
    {
        //
    }
}
