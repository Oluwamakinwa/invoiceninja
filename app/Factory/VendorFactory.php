<?php
/**
 * Invoice Ninja (https://invoiceninja.com)
 *
 * @link https://github.com/invoiceninja/invoiceninja source repository
 *
 * @copyright Copyright (c) 2020. Invoice Ninja LLC (https://invoiceninja.com)
 *
 * @license https://opensource.org/licenses/AAL
 */

namespace App\Factory;

use App\Models\Vendor;
use Illuminate\Support\Str;

class VendorFactory
{
    public static function create(int $company_id, int $user_id) :Vendor
    {
        $vendor = new Vendor;
        $vendor->company_id = $company_id;
        $vendor->user_id = $user_id;
        $vendor->name = '';
        $vendor->website = '';
        $vendor->private_notes = '';
        $vendor->balance = 0;
        $vendor->paid_to_date = 0;
        $vendor->country_id = 4;
        $vendor->is_deleted = 0;
        
        $vendor_contact = VendorContactFactory::create($company_id, $user_id);
        $vendor->contacts->add($vendor_contact);

        return $vendor;
    }
}