<?php


namespace MinhNB\Jobs\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;
use MinhNB\Jobs\Model\Repository\Department\DepartmentRepositoryInterface;

class Department extends AbstractSource
{
    /**
     * @var DepartmentRepositoryInterface
     */
    protected DepartmentRepositoryInterface $departmentRepository;

    /**
     * Department constructor.
     * @param DepartmentRepositoryInterface $departmentRepository
     */
    public function __construct(
        DepartmentRepositoryInterface $departmentRepository
    )
    {
        $this->departmentRepository = $departmentRepository ?:
            \Magento\Framework\App\ObjectManager::getInstance()->create(DepartmentRepositoryInterface::class);
    }

    /**
     * @return array|void
     */
    public function getAllOptions()
    {
        if (!$this->_options) {
            foreach ($this->departmentRepository->getCollection() as $item) {
                $this->_options[] = [
                    'label' => $item->getName(),
                    'value' => $item->getEntityId()
                ];
            }
        }
        return $this->_options;
    }
}