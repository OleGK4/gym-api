<?php


namespace App\Traits;


trait ImageTrait
{
    public function imageEdit($filename)
    {
        $this->image = $filename;
        $this->save();
    }
}
