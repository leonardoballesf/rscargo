<?php

class SettingsModel extends Model
{
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'bookshop';
        $this->sId = 'bookshop.id';
        $this->sCondition = 'WHERE bookshop.is_current=1 AND business.is_active=1';
        $this->sResponse = array();
        $this->sTable = '((business INNER JOIN bookshop ON business.id = bookshop.business_id) INNER JOIN regions ON bookshop.regions_id = regions.id) INNER JOIN location ON bookshop.location_id = location.id';
        $this->sField = array(
                                'business.id AS business_id', 'business.identity_card AS business_identity_card', 
                                'business.description AS business_description', 'business.address AS business_address', 
                                'business.phone AS business_phone', 'business.facsimile AS business_facsimile', 
                                'business.email AS business_email', 'business.website AS business_website', 
                                'business.logo AS business_logo', 'bookshop.id AS bookshop_id', 
                                'bookshop.regions_id AS bookshop_regions_id', 'regions.description AS region_description', 
                                'bookshop.location_id AS bookshop_location_id', 'location.location AS bookshop_location', 
                                'location.address AS bookshop_location_address', 'bookshop.description AS bookshop_description',
                                'bookshop.address AS bookshop_address', 'bookshop.phone AS bookshop_phone', 
                                'bookshop.email AS bookshop_email','bookshop.is_current AS bookshop_is_current'
                        );
        
    }
    
}