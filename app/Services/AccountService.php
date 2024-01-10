<?php

namespace App\Services;

use App\DTOS\{
    CreateAccountDTO,
    UpdateAccountDTO
};
use App\Repositories\Interfaces\AccountRepositoryInterface;
use stdClass;

class AccountService
{
    public function __construct(
        protected AccountRepositoryInterface $repository,
    ) {}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null)
    {
        return $this->repository->paginate(
            page: $page,
            totalPerPage: $totalPerPage,
            filter: $filter,
        );
    }

    public function getAll(string $filter = null): array
    {
        return $this->repository->getAll($filter);
    }

    public function findOne(string $id): stdClass|null
    {
        return $this->repository->findOne($id);
    }

    public function new(CreateAccountDTO $dto): stdClass
    {
        return $this->repository->new($dto);
    }

    public function update(UpdateAccountDTO $dto): stdClass|null
    {
        return $this->repository->update($dto);
    }

    public function delete(string $id): void
    {
        $this->repository->delete($id);
    }
}
