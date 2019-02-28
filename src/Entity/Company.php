<?php

namespace App\Entity;

use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CompanyRepository")
 * @ORM\Table(name="data_companies")
 */
class Company
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255, name="company_name")
     */
    private $companyName;

    /**
     * @ORM\Column(type="string", length=255, name="company_legal_form")
     */
    private $companyLegalForm;

    /**
     * @ORM\Column(type="string", length=255, name="company_address_street")
     */
    private $companyAddressStreet;

    /**
     * @ORM\Column(type="string", length=8, name="company_address_zip")
     */
    private $companyAddressZip;

    /**
     * @ORM\Column(type="string", length=255, name="company_address_city")
     */
    private $companyAddressCity;

    /**
     * @ORM\Column(type="string", length=255, name="company_email")
     */
    private $companyEmail;

    /**
     * @ORM\Column(type="string", length=255, name="company_homepage")
     */
    private $companyHomepage;

    /**
     * @ORM\Column(type="string", length=255, name="company_homepage_print")
     */
    private $companyHomepagePrint;

    /**
     * @ORM\Column(type="string", length=255, name="company_phone")
     */
    private $companyPhone;

    /**
     * @ORM\Column(type="boolean", name="company_phone_contact")
     */
    private $companyPhoneContact;

    /**
     * @ORM\Column(type="string", length=255, name="company_instagram")
     */
    private $companyInstagram;

    /**
     * @ORM\Column(type="string", length=255, name="company_instagram_print")
     */
    private $companyInstagramPrint;

    /**
     * @ORM\Column(type="boolean", name="company_instagram_contact")
     */
    private $companyInstagramContact;

    /**
     * @ORM\Column(type="string", length=255, name="company_twitter")
     */
    private $companyTwitter;

    /**
     * @ORM\Column(type="string", length=255, name="company_twitter_print")
     */
    private $companyTwitterPrint;

    /**
     * @ORM\Column(type="boolean", name="company_twitter_contact")
     */
    private $companyTwitterContact;

    /**
     * @ORM\Column(type="string", length=255, name="company_facebook")
     */
    private $companyFacebook;

    /**
     * @ORM\Column(type="string", length=255, name="company_facebook_print")
     */
    private $companyFacebookPrint;

    /**
     * @ORM\Column(type="boolean", name="company_facebook_contact")
     */
    private $companyFacebookContact;

    /**
     * @ORM\Column(type="string", length=255, name="company_linked_in")
     */
    private $companyLinkedIn;

    /**
     * @ORM\Column(type="string", length=255, name="company_linked_in_print")
     */
    private $companyLinkedInPrint;

    /**
     * @ORM\Column(type="boolean", name="company_linked_in_contact")
     */
    private $companyLinkedInContact;

    /**
     * @ORM\Column(type="string", length=255, name="company_xing")
     */
    private $companyXing;

    /**
     * @ORM\Column(type="string", length=255, name="company_xing_print")
     */
    private $companyXingPrint;

    /**
     * @ORM\Column(type="boolean", name="company_xing_contact")
     */
    private $companyXingContact;

    /**
     * @ORM\Column(type="string", length=255, name="company_slac_print")
     */
    private $companySlacPrint;

    /**
     * @ORM\Column(type="boolean", name="company_slac_contact")
     */
    private $companySlacContact;

    /**
     * @ORM\Column(type="string", length=255, name="company_pinterest")
     */
    private $companyPinterest;

    /**
     * @ORM\Column(type="string", length=255, name="contact_person_full_name")
     */
    private $contactPersonFullName;

    /**
     * @ORM\Column(type="string", length=255, name="contact_person_position")
     */
    private $contactPersonPosition;

    /**
     * @ORM\Column(type="string", length=255, name="contact_person_email")
     */
    private $contactPersonEmail;

    /**
     * @ORM\Column(type="string", length=32, name="categories")
     */
    private $categories;

    /**
     * @ORM\Column(type="string", length=255, name="tags")
     */
    private $tags;

    /**
     * @ORM\Column(type="boolean", name="exhibitor_sxsw_trade_show")
     */
    private $exhibitorSxswTradeShow;

    /**
     * @ORM\Column(type="boolean", name="partner_german_house")
     */
    private $partnerGermanHouse;

    /**
     * @ORM\Column(type="string", length=255, name="partner_german_house_ext")
     */
    private $partnerGermanHouseExt;

    /**
     * @ORM\Column(type="text", name="company_portrait")
     */
    private $companyPortrait;

    /**
     * @ORM\Column(type="boolean", name="logo_loaded")
     */
    private $logoLoaded;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCompanyName(): ?string
    {
        return $this->companyName;
    }

    public function setCompanyName(string $value): self
    {
        $this->companyName = $value;

        return $this;
    }

    public function getCompanyLegalForm(): ?string
    {
        return $this->companyLegalForm;
    }

    public function setCompanyLegalForm(string $value): self
    {
        $this->companyLegalForm = $value;

        return $this;
    }

    public function getCompanyAddressStreet(): ?string
    {
        return $this->companyAddressStreet;
    }

    public function setCompanyAddressStreet(string $value): self
    {
        $this->companyAddressStreet = $value;

        return $this;
    }

    public function getCompanyAddressZip(): ?string
    {
        return $this->companyAddressZip;
    }

    public function setCompanyAddressZip(string $value): self
    {
        $this->companyAddressZip = $value;

        return $this;
    }

    public function getCompanyAddressCity(): ?string
    {
        return $this->companyAddressCity;
    }

    public function setCompanyAddressCity(string $value): self
    {
        $this->companyAddressCity = $value;

        return $this;
    }

    public function getCompanyEmail(): ?string
    {
        return $this->companyEmail;
    }

    public function setCompanyEmail(string $value): self
    {
        $this->companyEmail = $value;

        return $this;
    }

    public function getCompanyHomepage(): ?string
    {
        return $this->companyHomepage;
    }

    public function setCompanyHomepage(string $value): self
    {
        $this->companyHomepage = $value;

        return $this;
    }

    public function getCompanyHomepagePrint(): ?string
    {
        return $this->companyHomepagePrint;
    }

    public function setCompanyHomepagePrint(string $value): self
    {
        $this->companyHomepagePrint = $value;

        return $this;
    }

    public function getCompanyPhone(): ?string
    {
        return $this->companyPhone;
    }

    public function setCompanyPhone(string $value): self
    {
        $this->companyPhone = $value;

        return $this;
    }

    public function getCompanyPhoneContact(): ?bool
    {
        return $this->companyPhoneContact;
    }

    public function setCompanyPhoneContact(bool $value): self
    {
        $this->companyPhoneContact = $value;

        return $this;
    }

    public function getCompanyInstagram(): ?string
    {
        return $this->companyInstagram;
    }

    public function setCompanyInstagram(string $value): self
    {
        $this->companyInstagram = $value;

        return $this;
    }

    public function getCompanyInstagramPrint(): ?string
    {
        return $this->companyInstagramPrint;
    }

    public function setCompanyInstagramPrint(string $value): self
    {
        $this->companyInstagramPrint = $value;

        return $this;
    }

    public function getCompanyInstagramContact(): ?bool
    {
        return $this->companyInstagramContact;
    }

    public function setCompanyInstagramContact(bool $value): self
    {
        $this->companyInstagramContact = $value;

        return $this;
    }

    public function getCompanyTwitter(): ?string
    {
        return $this->companyTwitter;
    }

    public function setCompanyTwitter(string $value): self
    {
        $this->companyTwitter = $value;

        return $this;
    }

    public function getCompanyTwitterPrint(): ?string
    {
        return $this->companyTwitterPrint;
    }

    public function setCompanyTwitterPrint(string $value): self
    {
        $this->companyTwitterPrint = $value;

        return $this;
    }

    public function getCompanyTwitterContact(): ?bool
    {
        return $this->companyTwitterContact;
    }

    public function setCompanyTwitterContact(bool $value): self
    {
        $this->companyTwitterContact = $value;

        return $this;
    }

    public function getCompanyFacebook(): ?string
    {
        return $this->companyFacebook;
    }

    public function setCompanyFacebook(string $value): self
    {
        $this->companyFacebook = $value;

        return $this;
    }

    public function getCompanyFacebookPrint(): ?string
    {
        return $this->companyFacebookPrint;
    }

    public function setCompanyFacebookPrint(string $value): self
    {
        $this->companyFacebookPrint = $value;

        return $this;
    }

    public function getCompanyFacebookContact(): ?bool
    {
        return $this->companyFacebookContact;
    }

    public function setCompanyFacebookContact(bool $value): self
    {
        $this->companyFacebookContact = $value;

        return $this;
    }

    public function getCompanyLinkedIn(): ?string
    {
        return $this->companyLinkedIn;
    }

    public function setCompanyLinkedIn(string $value): self
    {
        $this->companyLinkedIn = $value;

        return $this;
    }

    public function getCompanyLinkedInPrint(): ?string
    {
        return $this->companyLinkedInPrint;
    }

    public function setCompanyLinkedInPrint(string $value): self
    {
        $this->companyLinkedInPrint = $value;

        return $this;
    }

    public function getCompanyLinkedInContact(): ?bool
    {
        return $this->companyLinkedInContact;
    }

    public function setCompanyLinkedInContact(bool $value): self
    {
        $this->companyLinkedInContact = $value;

        return $this;
    }

    public function getCompanyXing(): ?string
    {
        return $this->companyXing;
    }

    public function setCompanyXing(string $value): self
    {
        $this->companyXing = $value;

        return $this;
    }

    public function getCompanyXingPrint(): ?string
    {
        return $this->companyXingPrint;
    }

    public function setCompanyXingPrint(string $value): self
    {
        $this->companyXingPrint = $value;

        return $this;
    }

    public function getCompanyXingContact(): ?bool
    {
        return $this->companyXingContact;
    }

    public function setCompanyXingContact(bool $value): self
    {
        $this->companyXingContact = $value;

        return $this;
    }

    public function getCompanySlacPrint(): ?string
    {
        return $this->companySlacPrint;
    }

    public function setCompanySlacPrint(string $value): self
    {
        $this->companySlacPrint = $value;

        return $this;
    }

    public function getCompanySlacContact(): ?bool
    {
        return $this->companySlacContact;
    }

    public function setCompanySlacContact(bool $value): self
    {
        $this->companySlacContact = $value;

        return $this;
    }

    public function getCompanyPinterest(): ?string
    {
        return $this->companyPinterest;
    }

    public function setCompanyPinterest(string $value): self
    {
        $this->companyPinterest = $value;

        return $this;
    }

    public function getContactPersonFullName(): ?string
    {
        return $this->contactPersonFullName;
    }

    public function setContactPersonFullName(string $value): self
    {
        $this->contactPersonFullName = $value;

        return $this;
    }

    public function getContactPersonPosition(): ?string
    {
        return $this->contactPersonPosition;
    }

    public function setContactPersonPosition(string $value): self
    {
        $this->contactPersonPosition = $value;

        return $this;
    }

    public function getContactPersonEmail(): ?string
    {
        return $this->contactPersonEmail;
    }

    public function setContactPersonEmail(string $value): self
    {
        $this->contactPersonEmail = $value;

        return $this;
    }

    public function getCategories(): ?string
    {
        return $this->categories;
    }

    public function setCategories(string $value): self
    {
        if($this->categories !== null) {
            $categories = explode(',', $this->categories);
            $values = explode(',', $value);
            foreach($values as $val) {
                if(!in_array($val, $categories, false)) {
                    $categories[] = $val;
                }
            }
            sort($categories);
            $this->categories = implode(',', array_filter($categories, 'strlen'));
        } else {
            $this->categories = $value;
        }

        return $this;
    }

    public function getTags(): ?string
    {
        return $this->tags;
    }

    public function setTags(string $value): self
    {
        $this->tags = $value;

        return $this;
    }
    public function getExhibitorSxswTradeShow(): ?bool
    {
        return $this->exhibitorSxswTradeShow;
    }

    public function setExhibitorSxswTradeShow(bool $value): self
    {
        $this->exhibitorSxswTradeShow = $value;

        return $this;
    }
    public function getPartnerGermanHouse(): ?bool
    {
        return $this->partnerGermanHouse;
    }

    public function setPartnerGermanHouse(bool $value): self
    {
        $this->partnerGermanHouse = $value;

        return $this;
    }
    public function getPartnerGermanHouseExt(): ?string
    {
        return $this->partnerGermanHouseExt;
    }

    public function setPartnerGermanHouseExt(string $value): self
    {
        $this->partnerGermanHouseExt = $value;

        return $this;
    }
    public function getCompanyPortrait(): ?string
    {
        return $this->companyPortrait;
    }

    public function setCompanyPortrait(string $value): self
    {
        $this->companyPortrait = $value;

        return $this;
    }
    public function getLogoLoaded(): ?bool
    {
        return $this->logoLoaded;
    }

    public function setLogoLoaded(bool $value): self
    {
        $this->logoLoaded = $value;

        return $this;
    }
}
