<?php
/**
 * This file is part of a FireGento e.V. module.
 *
 * This FireGento e.V. module is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License version 3 as
 * published by the Free Software Foundation.
 *
 * This script is distributed in the hope that it will be useful, but WITHOUT
 * ANY WARRANTY; without even the implied warranty of MERCHANTABILITY or FITNESS
 * FOR A PARTICULAR PURPOSE. See the GNU General Public License for more details.
 *
 * PHP version 5
 *
 * @category  FireGento
 * @package   FireGento_AdminMonitoring
 * @author    FireGento Team <team@firegento.com>
 * @copyright 2014 FireGento Team (http://www.firegento.com)
 * @license   http://opensource.org/licenses/gpl-3.0 GNU General Public License, version 3 (GPLv3)
 */

/**
 * Class FireGento_AdminMonitoring_Test_Model_Config
 */
class FireGento_AdminMonitoring_Test_Model_Config extends EcomDev_PHPUnit_Test_Case
{
    /**
     * @var FireGento_AdminMonitoring_Model_Config
     */
    protected $_model;

    /**
     * Set up test class
     */
    protected function setUp()
    {
        parent::setUp();
        $this->_model = Mage::getModel('firegento_adminmonitoring/config');
    }

    /**
     * Test model instance
     */
    public function testInstance()
    {
        $this->assertInstanceOf(
            'FireGento_AdminMonitoring_Model_config',
            $this->_model
        );
    }

    /**
     * @test
     */
    public function getObjectTypeExcludes()
    {
        $objectTypeExcludes = $this->_model->getObjectTypeExcludes();
        $this->assertGreaterThan(0, $objectTypeExcludes);
        $this->assertContains('FireGento_AdminMonitoring_Model_History', $objectTypeExcludes);
    }

    /**
     * @test
     */
    public function getGlobalAdminRouteExcludes()
    {
        $globalAdminRouteExcludes = $this->_model->getGlobalAdminRouteExcludes();
        $this->assertGreaterThan(0, $globalAdminRouteExcludes);
        $this->assertContains('admin_sales_order_create_loadBlock', $globalAdminRouteExcludes);
        $this->assertNotContains('admin_promo_catalog_save', $globalAdminRouteExcludes);
    }

    /**
     * @test
     */
    public function getPartialAdminRouteExcludes()
    {
        $partialAdminRouteExcludes = $this->_model->getPartialAdminRouteExcludes();
        $this->assertGreaterThan(0, $partialAdminRouteExcludes);
        $this->assertArrayHasKey('admin_promo_catalog_save', $partialAdminRouteExcludes);
        $this->assertArrayNotHasKey('admin_sales_order_create_loadBlock', $partialAdminRouteExcludes);
    }

    /**
     * @test
     */
    public function getFieldExcludes()
    {
        $fieldExcludes = $this->_model->getFieldExcludes();
        $this->assertGreaterThan(0, $fieldExcludes);
        $this->assertContains('created_at', $fieldExcludes);
        $this->assertContains('updated_at', $fieldExcludes);
    }
}
