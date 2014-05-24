<?php
/**
 * This file is part of the Itabs_Debit module.
 *
 * PHP version 5
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@magentocommerce.com so we can send you a copy immediately.
 *
 * @category  Itabs
 * @package   Itabs_Debit
 * @author    ITABS GmbH <info@itabs.de>
 * @copyright 2008-2014 ITABS GmbH (http://www.itabs.de)
 * @license   http://opensource.org/licenses/osl-3.0.php Open Software License (OSL 3.0)
 * @version   1.1.0
 * @link      http://www.magentocommerce.com/magento-connect/debitpayment.html
 */
/**
 * Block/Info.php Test Class
 *
 * @group Itabs_Debit
 */
class Itabs_Debit_Test_Block_Info extends EcomDev_PHPUnit_Test_Case_Controller
{
    /**
     * @var Itabs_Debit_Block_Info
     */
    protected $_block;

    /**
     * Instantiate the object
     */
    protected function setUp()
    {
        parent::setUp();
        $this->_block = self::app()->getLayout()->createBlock('debit/info');

        // Set object data
        $method = Mage::getModel('debit/debit');
        $infoInstance = Mage::getModel('payment/info');
        $infoInstance->setMethod($method->getCode());
        $infoInstance->setMethodInstance($method);
        $method->setData('info_instance', $infoInstance);
        $this->_block->setData('method', $method);
        $this->_block->setData('info', $infoInstance);
    }

    /**
     * @test
     * @loadFixture ~Itabs_Debit/default
     */
    public function sendDataInEmail()
    {
        $this->assertTrue($this->_block->sendDataInEmail());
    }
}