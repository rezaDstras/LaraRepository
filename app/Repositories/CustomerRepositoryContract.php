<?php

namespace App\Repositories;

interface CustomerRepositoryContract
{
    public function index();

    public function findById($customer);

    public function findByName();

    public function update($customer);

    public function delete($customer);
}
