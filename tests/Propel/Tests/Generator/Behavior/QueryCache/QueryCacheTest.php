<?php
/*
 * This file is part of the Propel package.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @license MIT License
 */

namespace Propel\Tests\Generator\Behavior\QueryCache;
use Propel\Tests\Bookstore\Behavior\QuerycacheTable1Query;
use Propel\Tests\Helpers\Bookstore\BookstoreTestBase;
use Propel\Tests\TestCase;


/**
 * Class QueryCacheTest
 * @package Propel\Tests\Generator\Behavior\QueryCache
 * @author Manuel Raynaud <mraynaud@openstudio.fr>
 */
class QueryCacheTest extends BookstoreTestBase
{

    public static function setUpBeforeClass()
    {
        //prevent issue DSN not Found
        self::$isInitialized = false;
        parent::setUpBeforeClass();
    }

    public function testExistingKey()
    {
      $cacheTest = QuerycacheTable1Query::create()
          ->setQueryKey("test")
          ->filterByTitle('foo')
          ->find();

      $this->assertTrue(QuerycacheTable1Query::create()->cacheContains("test"));
    }

} 