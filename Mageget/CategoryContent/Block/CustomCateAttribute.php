<?php
namespace Mageget\CategoryContent\Block;

class CustomCateAttribute extends \Magento\Framework\View\Element\Template
{    
  
     /**
     * @var \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory
     */
    protected $_categoryCollection;
    protected $_registry;

    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Model\ResourceModel\Category\CollectionFactory $categoryCollection,
        array $data = []
    )
    {    
        $this->_categoryCollection = $categoryCollection;
        $this->_registry = $registry;
        parent::__construct($context, $data);
    }
    
    public function getCategoryCollection()
    {
        
        $collection = $this->_categoryCollection->create()
        ->addAttributeToSelect('*')
            ->addAttributeToFilter('custom_image');
         return $collection;
    } 
    public function getCurrentCategory()
    {        
        return $this->_registry->registry('current_category');
    }
}