<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyDetails extends Model
{
    protected $table = 'company_details';
    protected $primaryKey = 'companyDetailsID';
    protected $fillable = [
        'siteID', 'companyStatus', 'companyNumber', 'sicDescription', 'jobTitle', 'address', 'street', 'town', 'postCode',

        'dob1','house_number1','home_street1','home_town1','home_country1','home_post1','address1','house_number_s1',
        'street_s1', 'town_s1','home_country_s1','post_s1','address_s1',

        'dob2','house_number2','home_street2','home_town2','home_country2','home_post2','address2','house_number_s2',
        'street_s2','town_s2','home_country_s2','post_s2','address_s2',

        'other_partner','other_dob2','other_house_number2',
        'other_home_street2','other_home_town2','other_home_country2', 'other_home_post2','other_address2',
        'other_house_number_s2','other_street_s2','other_town_s2','other_home_country_s2','other_post_s2','other_address_s2',
    ];

    public function getDob1Attribute($value)
    {
        return pub_date($value);
    }

    public function setDob1Attribute($value)
    {
        $this->attributes['dob1'] = db_date($value);
    }

    public function getDob2Attribute($value)
    {
        return pub_date($value);
    }

    public function setDob2Attribute($value)
    {
        $this->attributes['dob2'] = db_date($value);
    }

    public function getOtherDob2Attribute($value)
    {
        return pub_date($value);
    }

    public function setOtherDob2Attribute($value)
    {
        $this->attributes['other_dob2'] = db_date($value);
    }



}
