<?php

namespace App\Repositories\Interfaces;

use App\DTOS\{
    CreateAccountDTO,
    UpdateAccountDTO
};
use stdClass;

interface AccountRepositoryInterface
{
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateAccountDTO $dto): stdClass;
    public function update(UpdateAccountDTO $dto): stdClass|null;
}
