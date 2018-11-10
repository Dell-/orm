<?php
/**
 * Spiral Framework.
 *
 * @license   MIT
 * @author    Anton Titov (Wolfy-J)
 */

namespace Spiral\ORM\Relation;

use Spiral\ORM\ORMInterface;
use Spiral\ORM\RelationInterface;
use Spiral\ORM\State;

class AbstractRelation implements RelationInterface
{
    /**
     * @invisible
     * @var ORMInterface
     */
    protected $orm;

    protected $class;

    protected $relation;

    protected $schema;

    public function __construct(ORMInterface $orm, string $class, string $relation, array $schema)
    {
        $this->orm = $orm;
        $this->class = $class;
        $this->relation = $relation;
        $this->schema = $schema;

        dump($this);
    }

    public function init($data)
    {
        if (is_null($data)) {
            return null;
        }

        return $this->orm->makeEntity($this->class, $data, State::LOADED);
    }
}