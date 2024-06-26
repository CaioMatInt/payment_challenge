<?php

namespace Tests\Unit\Services;

use App\Models\Account;
use App\Models\AccountTransactionType;
use App\Services\AccountTransaction\AccountTransactionService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Tests\Traits\UserTrait;

class AccountTransactionServiceTest extends TestCase
{
    use RefreshDatabase;
    use UserTrait;

    private AccountTransactionService $accountTransactionService;
    private int $defaultInitialBalance = 1000;

    public function setUp(): void
    {
        parent::setUp();

        $this->accountTransactionService = app(AccountTransactionService::class);
        $this->mockVariables();
    }

    private function mockVariables(): void
    {
        $this->mockUser();
    }

    public function test_can_create_account_transaction()
    {
        $this->actingAs($this->user);

        $accountTransactionType = AccountTransactionType::factory()->create();
        $account = Account::factory()->create([
            'user_id' => $this->user->id,
        ]);

        $this->accountTransactionService->create(
            $account->id,
            $accountTransactionType->id,
            $this->defaultInitialBalance
        );

        $this->assertDatabaseHas('account_transactions', [
            'account_id' => $account->id,
            'account_transaction_type_id' => $accountTransactionType->id,
            'amount' => $this->defaultInitialBalance,
        ]);
    }
}
