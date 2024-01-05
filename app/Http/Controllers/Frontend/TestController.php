<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\ProductSection;

class TestController extends Controller
{
    //
    public function test()
    {
        $products = Product::where('product_service_id', 3)
            ->select('product_id')
            ->get();
        
        foreach($products as $product)
        {
            $data1 = [
                'product_section_name' => 'About BIS/CRS Registration',
                'product_section_slug' => 'about-bis-crs-registration',
                'product_section_content' => '<p class=\"Normal1\" style=\"text-align: justify;\"><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">Established in 1987 under the Bureau of Indian Standards Act 1986, BIS is a statutory body in India responsible for formulating, maintaining, and administering standards across a wide spectrum of products and sectors. The primary objective of BIS is to ensure the quality, safety, and performance of products available in the Indian market. The Compulsory Registration Scheme (CRS) is a pivotal initiative for IT &amp; Electronic products under BIS, mandating that specific categories of products, ranging from electronics to industrial goods, must undergo rigorous testing and certification for compliance with Indian standards before they can be legally sold in the country. This certification process is designed to safeguard consumer interests, enhance product safety, and elevate the overall quality of goods in the Indian market. Foreign manufacturers of these products looking to export their products in India must obtain BIS/CRS Registration to demonstrate adherence to these stringent standards and ensure that their offerings meet the necessary safety and quality requirements before entering the Indian market.</span></p>',
                'product_section_status' => '1',
                'product_section_order' => '1',
                'product_id' => $product->product_id,
            ];
            $data2 = [
                'product_section_name' => 'Process for BIS/CRS Registration',
                'product_section_slug' => 'process-for-bis-crs-registration',
                'product_section_content' => '<p class=\"Normal1\" style=\"text-align: justify;\"><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">Complete your BIS/CRS Registration process by following these steps:</span></p>\r\n<p class=\"Normal1\" style=\"text-align: justify;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\"><strong style=\"mso-bidi-font-weight: normal;\"><span lang=\"EN-US\" style=\"line-height: 115%;\">Step 1:</span></strong><span lang=\"EN-US\" style=\"line-height: 115%;\"> Register on the BIS portal and acquire your login credentials</span></span><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">&nbsp;</span></p>\r\n<p class=\"Normal1\" style=\"text-align: justify;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\"><strong style=\"mso-bidi-font-weight: normal;\"><span lang=\"EN-US\" style=\"line-height: 115%;\">Step 2:</span></strong><span lang=\"EN-US\" style=\"line-height: 115%;\"> Select the testing laboratory and generate a test request</span></span><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">&nbsp;</span></p>\r\n<p class=\"Normal1\" style=\"text-align: justify;\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\"><strong style=\"mso-bidi-font-weight: normal;\"><span lang=\"EN-US\" style=\"line-height: 115%;\">Step 3:</span></strong><span lang=\"EN-US\" style=\"line-height: 115%;\"> Submit the sample(s) to the chosen lab</span></span><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">&nbsp;</span></p>\r\n<p class=\"Normal1\" style=\"text-align: justify;\"><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">For more detailed information, please <a href=\"../../../../../service/bis-crs-registration#registration-process\"><strong style=\"mso-bidi-font-weight: normal;\">click here.</strong></a></span></p>',
                'product_section_status' => '1',
                'product_section_order' => '2',
                'product_id' => $product->product_id,
            ];
            $data3 = [
                'product_section_name' => 'Required Documents for BIS/CRS Registration',
                'product_section_slug' => 'required-documents-for-bis-crs-registration',
                'product_section_content' => '<p class=\"Normal1\" style=\"text-align: justify;\"><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">Here is the list of documents required for foreign manufacturers for BIS/CRS Registration in India:</span></p>\r\n<ul style=\"text-align: justify;\">\r\n<li><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\"><span lang=\"EN-US\" style=\"line-height: 115%;\">Schematic Diagram</span></span></li>\r\n<li><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\"><span lang=\"EN-US\" style=\"line-height: 115%;\">User Manual</span></span></li>\r\n<li><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt;\"><span lang=\"EN-US\" style=\"line-height: 115%;\">PCB Layout</span></span><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">&nbsp;</span></li>\r\n</ul>\r\n<p class=\"Normal1\" style=\"text-align: justify;\"><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif;\">For more detailed information, please <a href=\"../../../../../service/bis-crs-registration#required-documents\"><strong style=\"mso-bidi-font-weight: normal;\">click here.</strong></a></span></p>',
                'product_section_status' => '1',
                'product_section_order' => '3',
                'product_id' => $product->product_id,
            ];
            $data4 = [
                'product_section_name' => 'What We Do For You?',
                'product_section_slug' => 'what-we-do-for-you',
                'product_section_content' => '<p class=\"Normal1\" style=\"text-align: justify;\"><span lang=\"EN-US\" style=\"font-size: 12pt; line-height: 115%; font-family: arial, helvetica, sans-serif; color: rgb(0, 0, 0);\">Export Approval, powered by Brand Liaison, is a single platform solution for various product certifications and approvals in India. We are one of the leading compliance consultant that provide essential Indian certification services to manufacturers to export their products to India. Our services include:</span></p>\r\n<ul>\r\n<li style=\"color: rgb(0, 0, 0);\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt; color: rgb(0, 0, 0);\"><span lang=\"EN-US\" style=\"line-height: 115%;\">Comprehensive support for paperwork, testing, and guidance.</span></span></li>\r\n<li style=\"color: rgb(0, 0, 0);\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt; color: rgb(0, 0, 0);\"><span lang=\"EN-US\" style=\"line-height: 115%;\">Sample development meeting standards for complete conformity in testing labs.</span></span></li>\r\n<li style=\"color: rgb(0, 0, 0);\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt; color: rgb(0, 0, 0);\"><span lang=\"EN-US\" style=\"line-height: 115%;\">Detailed application preparation and timely query responses.</span></span></li>\r\n<li style=\"color: rgb(0, 0, 0);\"><span style=\"font-family: arial, helvetica, sans-serif; font-size: 12pt; color: rgb(0, 0, 0);\"><span lang=\"EN-US\" style=\"line-height: 115%;\">Free license maintenance for 2 years.</span></span></li>\r\n</ul>',
                'product_section_status' => '1',
                'product_section_order' => '4',
                'product_id' => $product->product_id,
            ];
            ProductSection::create($data1);
            ProductSection::create($data2);
            ProductSection::create($data3);
            ProductSection::create($data4);

        }

    }
}
