<?php

namespace App\Repositories\Interfaces;

use App\DTOS\Accounts\{
    CreateAccountDTO,
    UpdateAccountDTO
};
use stdClass;

interface AccountRepositoryInterface
{
    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface;
    public function getAll(string $filter = null): array;
    public function findOne(string $id): stdClass|null;
    public function delete(string $id): void;
    public function new(CreateAccountDTO $dto): stdClass;
    public function update(UpdateAccountDTO $dto): stdClass|null;
}
