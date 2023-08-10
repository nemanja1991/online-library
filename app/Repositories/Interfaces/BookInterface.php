<?php

namespace App\Repositories\Interfaces;

interface BookInterface
{    
    public function all();
    public function store($data);
    public function find($id);
    public function update($data, $id); 
    public function destroy($id);
}