<?php

namespace Abdulelahragih\QueryBuilder\Grammar\Clauses;

use Abdulelahragih\QueryBuilder\Grammar\Expression;
use Abdulelahragih\QueryBuilder\Types\OrderType;

class OrderByClause implements Clause
{

    /**
     * @var OrderItem[]
     */
    private array $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function addColumn(Expression|string $name, OrderType $orderType): void
    {
        $this->items[] = new OrderItem($name, $orderType, 0);
    }

    public function getColumns(): array
    {
        return $this->items;
    }

    public function addRandom(Expression $expr): void
    {
        // High priority to ensure random comes first when mixed with others
        $this->items[] = new OrderItem($expr, null, 1);
    }
}
