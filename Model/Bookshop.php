<?php

class BookshopModel extends Model
{
            
    public function __construct()
    {
        parent::__construct();
        $this->sModel = 'bookshop';
        $this->sId = 'bookshop.id';
        $this->sCondition = 'WHERE business.is_active=1';
        $this->sResponse = array();
        $this->sTable = '((((bookshop INNER JOIN regions ON bookshop.regions_id=regions.id) INNER JOIN location ON bookshop.location_id=location.id) INNER JOIN business ON bookshop.business_id=business.id) INNER JOIN (users INNER JOIN sellers ON users.sellers_id=sellers.id) ON bookshop.users_id=users.id) INNER JOIN status_type ON bookshop.is_active=status_type.id ';
        $this->sField = array(
                            'bookshop.id AS bookshop_id', 'bookshop.description AS bookshop_description', 
                            'bookshop.regions_id AS bookshop_regions_id', 'regions.description AS region_description',
                            'bookshop.location_id AS bookshop_location_id', 'location.location AS bookshop_location', 
                            'location.address AS bookshop_location_address', 'bookshop.address AS bookshop_address', 
                            'bookshop.phone AS bookshop_phone', 'bookshop.email AS bookshop_email', 
                            'bookshop.users_id AS bookshop_users_id', 'bookshop.is_current AS bookshop_is_current',
                            'bookshop.is_active AS bookshop_is_active', 'status_type.description AS status_description', 
                            'sellers.description AS sellers_description', 'bookshop.created AS bookshop_created'
        );
    }
}