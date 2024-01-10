<?php

namespace App\Repositories;

use App\DTOS\{
    CreateAccountDTO,
    UpdateAccountDTO
};
use App\Models\Account;
use App\Repositories\Interfaces\AccountRepositoryInterface;
use App\Repositories\Interfaces\PaginationInterface;
use App\Repositories\Presenters\PaginationPresenter;
use Illuminate\Support\Facades\Auth;
use stdClass;

class AccountEloquentORM implements AccountRepositoryInterface
{
    public function __construct(
        protected Account $model,
    )
    {}

    public function paginate(int $page = 1, int $totalPerPage = 15, string $filter = null): PaginationInterface
    {
        $result = $this->model
                        ->where(function ($query) use ($filter) {
                            $query->where('user_id', Auth::user()->id);
                            if ($filter) {
                                $query->orWhere('name', 'like', "%{$filter}%");
                                $query->orWhere('bank', 'like', "%{$filter}%");
                            }
                        })
                        ->paginate($totalPerPage, ['*'], 'page', $page);
                        
        return new PaginationPresenter($result);
    }

    public function getAll(string $filter = null): array
    {
        return $this->model
                        ->where(function ($query) use ($filter) {
                            $query->where('user_id', Auth::user()->id);
                            if ($filter) {
                                $query->orWhere('name', 'like', "%{$filter}%");
                                $query->orWhere('bank', 'like', "%{$filter}%");
                            }
                        })
                        ->get()
                        ->toArray();
    }
    
    public function findOne(string $id): stdClass|null
    {
        $account = $this->model->find($id);
        if (!$account) {
            return null;
        }

        return (object) $account->toArray();
    }
    
    public function delete(string $id): void
    {
        $this->model->findOrFail($id)->delete();
    }
    
    public function new(CreateAccountDTO $dto): stdClass
    {
        $account = $this->model->create(
            (array) $dto,
        );

        return (object) $account->toArray();
    }
    
    public function update(UpdateAccountDTO $dto): stdClass|null
    {
        if (!$account = $this->model->find($dto->id))
        {
            return null;
        }

        $account->update(
            (array) $dto
        );

        return (object) $account->toArray();
    }
    
}