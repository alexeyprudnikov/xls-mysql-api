<?php
/**
 * Created by PhpStorm.
 * User: aprudnikov
 * Date: 2019-02-20
 * Time: 15:35
 */

namespace App\Utils;


use App\Entity\Company;
use App\Entity\Category;
use Doctrine\Common\Persistence\ObjectRepository;

class CompanyFactory implements EntityFactoryInterface
{
    protected $categoryFinder;

    public function __construct(ObjectRepository $finder)
    {
        $this->categoryFinder = $finder;
    }

    /**
     * @param array $data
     * @return Company
     */
    public function create(array $data): Company
    {
        $Company = new Company();
        $DataMapper = new DataMapper();
        foreach ($data as $key => $value) {
            $action = $DataMapper->getCompanyDataSetter($key);
            if($action !== '' && method_exists($Company, $action)) {
                $value = $this->getFormattedValue($action, trim($value));
                $Company->{$action}($value);
            }
        }
        return $Company;
    }

    /**
     * @param string $action
     * @param mixed $value
     * @return bool|string
     */
    public function getFormattedValue(string $action, $value)
    {
        if($action === 'setCompanyPhoneContact') {
            $value = ($value === 'Telefon');
        }
        if($action === 'setCompanyInstagramContact') {
            $value = ($value === 'Instagram');
        }
        if($action === 'setCompanyTwitterContact') {
            $value = ($value === 'Twitter');
        }
        if($action === 'setCompanyFacebookContact') {
            $value = ($value === 'Facebook');
        }
        if($action === 'setCompanyLinkedInContact') {
            $value = ($value === 'LinkedIn');
        }
        if($action === 'setCompanyXingContact') {
            $value = ($value === 'Xing');
        }
        if($action === 'setCompanySlacContact') {
            $value = ($value === 'Slac');
        }
        if($action === 'setExhibitorSxswTradeShow') {
            $value = ($value === 'Exhibitor@ German Pavilion');
        }
        if($action === 'setPartnerGermanHouse') {
            $value = ($value === 'Partner @ German Haus');
        }
        if($action === 'setLogoLoaded') {
            $value = ($value === 'Ja');
        }
        if($action === 'setCategories') {
            $category = $this->categoryFinder->findOneBy(array('title'=>$value));
            if($category !== null) {
                $value = [];
                $value[] = $category->getId();
                // add parent category id
                $parent = $this->categoryFinder->find($category->getParent());
                if($parent !== null) {
                    $value[] = $parent->getId();
                }
                $value = implode(',', $value);
            } else {
                $value = null;
            }
        }
        return $value ?? '';
    }
}